<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class HandleData extends Controller
{
    public function getData()
    {
        $result = Article::orderBy('created_at', 'desc')
            ->get();
        $category = Category::all();
        return view('welcome', compact('result', 'category'));
    }

    public function latest()
    {
        $result = Article::orderBy("created_at", "desc")
            ->get();
        $category = Category::all();
        return view('welcome', compact('result', 'category'));
    }

    public function oldest()
    {
        $result = Article::orderBy("created_at", "asc")
            ->get();
        $category = Category::all();
        return view('welcome', compact('result', 'category'));
    }
}
