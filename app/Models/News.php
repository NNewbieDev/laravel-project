<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    public function getAllNews()
    {
        // $news = DB::select("SELECT * FROM news");
        $news = DB::table("news")
            ->get();
        // dd($news);
        return $news;
    }

    public function addNews($data)
    {
        DB::insert("INSERT INTO news (NewTitle, NewContent, CatagoryID, Author, PostAt) VALUES (?,?,?,?,?)", [$data['new_title'], $data['new_content'], $data['category'], $data['new_author'], $data['post_at']]);
    }
}