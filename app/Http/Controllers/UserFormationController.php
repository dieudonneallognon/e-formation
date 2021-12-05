<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchFormationRequest;
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

        $formation = Formation::create([
            'designation' => $data['designation'],
            'description' => $data['description'],
            'price' => $data['price'],
            'image' => Str::replaceArray(
                '?', [strtotime('now'), $image->extension()],
                Formation::IMAGE_PATTERN
            ),
            'type' => 'test',
            'user_id' => auth()->user()->id
        ]);

        $formation->categories()->sync($data['categories']);

        $image->storeAs('public', $formation->image);

        $chapters = [];
        foreach ($data['chapters'] as $index => $chapter) {
            $chapters[] =  [
                'title' => $chapter,
                'number' => $index + 1,
                'formation_id' => $formation->id,
            ];
        }

        Chapter::insert($chapters);
        return redirect()->route('user.formations.index')->with(['success' => true]);
    }

    public function edit(int $formation)
    {
        $formation = Formation::find($formation);
        $categories = Category::all();

        return view('formations.edit', compact(['formation', 'categories']));
    }

    public function update(UpdateFormationRequest $request, int $formationId)
    {
        $data = $request->validated();
        $image = $request->file('image');

        $formation = Formation::find($formationId);
        $formation->designation = $data['designation'];
        $formation->description = $data['description'];
        $formation->price = $data['price'];
        $formation->type = 'test';
        $formation->save();

        if ($image) {
            $formation->image = Str::replaceArray(
                '?', [strtotime('now'), $image->extension()],
                Formation::IMAGE_PATTERN
            );

            if (Storage::exists($formation->image)) {
                Storage::delete([$formation->image]);
            }

            $image->storeAs(
                'public',
                $formation->image
            );
        }

        $formation->categories()->sync($data['categories']);
        $formation->chapters()->delete();

        $chapters = collect($data['chapters'])->map(function ($chapter, $index) {
            return new Chapter([
                'number' => ($index +1),
                'title' => $chapter
            ]);
        });

        $formation->chapters()->saveMany($chapters);

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

        $formations = Formation::whereBelongsTo(auth()->user())
            ->where(function($query) use($data) {
                return $query->whereRelation('categories', 'name', 'like', "%{$data['search']}%")
                    ->orWhere('designation', 'like', "%{$data['search']}%");
            })->get();

        $categories = Category::all();

        return view('formations.index', compact(['formations', 'categories']));
    }
}
