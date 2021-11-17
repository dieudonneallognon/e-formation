<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchFormationRequest;
use App\Models\Category;
use App\Models\Formation;

class FormationController extends Controller
{
    public function index()
    {
        $formations = Formation::with(['user'])->paginate(15);
        $categories = Category::all();

        return view('formations.index', compact(['formations', 'categories']));
    }

    public function show($formation)
    {
        $formation = Formation::find($formation);
        $categories = Category::all();

        return view('formations.show', compact(['formation', 'categories']));
    }

    public function search(SearchFormationRequest $request)
    {
        $data = $request->validated();

        $formations = Formation::where('designation', 'like', '%' . $data['search'] . '%')->get();
        $categories = Category::all();
        $categoriesSearch = Category::where('name', 'like', '%' . $data['search'] . '%')->get();
        $formationIds = $formations->pluck(['id'])->toArray();

        return view('formations.index', compact(['formations', 'categories', 'categoriesSearch', 'formationIds']));
    }
}
