<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class HandleData extends Controller
{
    public function getData()
    {
        $result = Article::orderBy('created_at', 'desc')
            ->get();
        return view('welcome', compact('result'));
    }

    public function latest()
    {
        $result = Article::orderBy("created_at", "desc")
            ->get();
        return view('welcome', compact('result'));
    }

    public function oldest()
    {
        $result = Article::orderBy("created_at", "asc")
            ->get();
        return view('welcome', compact('result'));
    }
}
