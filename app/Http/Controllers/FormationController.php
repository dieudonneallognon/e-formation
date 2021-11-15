<?php

namespace App\Http\Controllers;

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
}
