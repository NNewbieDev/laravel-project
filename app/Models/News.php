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
            ->join("page", 'page.Id', $this->table . '.PageId')
            ->select($this->table . '.*', "page.PageName")
            ->get();
    }

    public function addNews($data)
    {
        DB::table($this->table)->insert([
            'Title' => $data['news_title'],
            'Content' => $data['news_content'],
            'PageId' => $data['page_id'],
            'UserId' => $data['news_author'],
            'PostAt' => $data['post_at']
        ]);
    }
}