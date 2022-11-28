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
        return $news;
    }

    public function addNews($data)
    {
        DB::insert("INSERT INTO news (title, content, user_id, post_at) VALUES (?,?,?,?)", [$data['new_title'], $data['new_content'], $data['new_author'], $data['post_at']]);
    }
}