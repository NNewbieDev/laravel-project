<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;
    protected $table = "news";

    public function getAllNews()
    {
        return DB::table($this->table)
            ->join("page", 'page.id', $this->table . '.page_id')
            ->select($this->table . '.*', "page.page_name")
            ->get();
    }

    public function addNews($data)
    {
        DB::table($this->table)->insert([
            'title' => $data['news_title'],
            'content' => $data['news_content'],
            'page_id' => $data['page_id'],
            'user_id' => $data['news_author'],
            'post_at' => $data['post_at']
        ]);
    }
}