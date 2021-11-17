<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFormationRequest;
use App\Http\Requests\UpdateFormationRequest;
use App\Models\Category;
use App\Models\Chapter;
use App\Models\Formation;
use App\Models\FormationCategoryLink;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserFormationController extends Controller
{
    public function index()
    {
        $formations = Formation::where('user_id', Auth::id())->get();
        $categories = Category::all();

        return view('formations.index', compact(['formations', 'categories']));
    }

    public function create()
    {
        $categories = Category::all();

        return view('formations.create', compact(['categories']));
    }

    public function store(StoreFormationRequest $request)
    {
        $data = $request->validated();
        $image = $request->file('image');

        $formation = new Formation();
        $formation->designation = $data['designation'];
        $formation->description = $data['description'];
        $formation->price = $data['price'];
        $formation->image = Str::replaceArray('?', [strtotime('now'), $image->extension()], Formation::IMAGE_PATTERN);
        $formation->type = 'test';
        $formation->user_id = auth()->user()->id;
        $formation->save();

        $image->storeAs(
            'public',
            Str::replaceArray('?', [strtotime('now'), $image->extension()], Formation::IMAGE_PATTERN)
        );

        collect($data['chapters'])->each(function ($chapter, $pos) use ($formation) {
            Chapter::create([
                'title' => $chapter,
                'number' => $pos + 1,
                'formation_id' => $formation->id,
            ]);
        });

        collect($data['categories'])->each(function ($category, $pos) use ($formation) {
            FormationCategoryLink::create([
                'category_id' => $category,
                'formation_id' => $formation->id,
            ]);
        });

        return redirect()->route('user.formations.index')->with(['success' => true]);
    }

    public function edit($formation)
    {
        $formation = Formation::find($formation);
        $categories = Category::all();

        $formationCategory = FormationCategoryLink::where(['formation_id', $formation]);

        return view('formations.edit', compact(['formation', 'categories', 'formationCategory']));
    }

    public function update(UpdateFormationRequest $request, $formation)
    {
        $data = $request->validated();
        $image = $request->file('image');

        $formationUpdate = Formation::find($formation);
        $formationUpdate->designation = $data['designation'];
        $formationUpdate->description = $data['description'];
        $formationUpdate->price = $data['price'];
        $formationUpdate->type = 'test';
        $formationUpdate->save();

        if ($image) {
            $formationUpdate->image = Str::replaceArray('?', [strtotime('now'), $image->extension()], Formation::IMAGE_PATTERN);
        }

        if ($image) {
            if (Storage::exists($formationUpdate->image)) {
                Storage::delete([$formationUpdate->image]);
            }

            $image->storeAs(
                'public',
                Str::replaceArray('?', [strtotime('now'), $image->extension()], Formation::IMAGE_PATTERN)
            );
        }

        collect($data['chapters'])->each(function ($chapter, $pos) use ($formationUpdate) {
            Chapter::create([
                'title' => $chapter,
                'number' => $pos + 1,
                'formation_id' => $formationUpdate->id,
            ]);
        });

        FormationCategoryLink::where('formation_id', $formationUpdate->id)->delete();

        collect($data['categories'])->each(function ($category, $pos) use ($formationUpdate) {
            FormationCategoryLink::create([
                'category_id' => $category,
                'formation_id' => $formationUpdate->id,
            ]);
        });

        return redirect()->route('user.formations.index')->with(['success' => true]);
    }

    public function destroy(int $id)
    {
        $formation = Formation::find($id);

        $formation->delete();

        return redirect()->route('user.formations.index');
    }

    public function search(SearchFormationRequest $request)
    {
        $data = $request->validated();

        $formations = Formation::where('designation', 'like', '%' . $data['search'] . '%')
        ->where('user_id', auth()->user()->id)->get();

        $categories = Category::all();
        $categoriesSearch = Category::where('name', 'like', '%' . $data['search'] . '%')->get();
        $formationIds = $formations->pluck(['id'])->toArray();

        return view('formations.index', compact(['formations', 'categories', 'categoriesSearch', 'formationIds']));
    }
}
