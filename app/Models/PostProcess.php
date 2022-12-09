<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PostProcess extends Model
{
    use HasFactory;
    protected $table = 'process_post';
    protected $fillable = ['title', 'description'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function getAllPost()
    {
        return DB::table($this->table)
            ->join('categories', 'categories.CategoryID', "=", $this->table . ".category_id")
            ->join('users', 'users.id', "=", $this->table . ".author_id")
            ->select($this->table . ".*", "categories.CategoryName", "users.username")
            ->get();
    }

    public function addPost($data)
    {
        return DB::table($this->table)->insert([
            'title' => $data['news_title'],
            'content' => $data['news_content'],
            'image' => $data['path_image'],
            'category_id' => $data['category_id'],
            'author_id' => $data['author_id'],
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