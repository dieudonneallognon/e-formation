<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryFormationController extends Controller
{
    public function __invoke($category)
    {
        $formations = Category::find($category)->formations;

        $categories = Category::all();

        return view('formations.index', compact(['categories', 'formations']));
    }
}
