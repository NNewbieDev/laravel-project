<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class HandleData extends Controller
{
    public function getData()
    {
        $result = Article::orderBy("created_at", "desc")->paginate(10);
        $category = Category::all();
        return view('welcome', compact('result', 'category'));
    }

    public function latest()
    {
        $result = Article::orderBy("created_at", "desc")->paginate(10);
        $category = Category::all();
        return view('welcome', compact('result', 'category'));
    }

    public function oldest()
    {
        $result = Article::orderBy("created_at", "asc")->paginate(10);
        $category = Category::all();
        return view('welcome', compact('result', 'category'));
    }
    public function search(Request $request)
    {
        $result = Article::where('title', 'LIKE', "%{$request->search}%")->paginate(10);
        $category = Category::all();
        return view('welcome', compact('result', 'category'));
    }
    public function nav($id)
    {
        $result = Article::where('CategoryID', $id)->paginate(10);
        $category = Category::all();
        return view('welcome', compact('result', 'category'));
    }
}
