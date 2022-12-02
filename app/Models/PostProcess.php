<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PostProcess extends Model
{
    use HasFactory;
    protected $table = 'process_post';
    public function getAllPost()
    {
        return DB::table($this->table)
            ->join('page', 'page.id', "=", $this->table . ".category_id")
            ->join('user', 'user.id', "=", $this->table . ".user_id")
            ->select($this->table . ".*", "page.page_name", "user.user_name")
            ->get();
    }

    public function addPost($data)
    {
        DB::table($this->table)->insert([
            'title' => $data['news_title'],
            'content' => $data['news_content'],
            'category_id' => $data['page_id'],
            'user_id' => $data['news_author'],
            'created_at' => $data['post_at']
        ]);
    }

    public function getPost($id)
    {
        return DB::table($this->table)->find($id);
    }

    public function deletePost($id)
    {
        DB::table($this->table)->where("id", $id)->delete();
    }
}