<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
          use HasFactory;
          protected $table = "articles";
          protected $fillable = ['title', 'description'];
          public function category()
          {
                    return $this->belongsTo(Category::class, "categoryID");
          }
          public function user()
          {
                    return $this->belongsTo(User::class);
          }
          public function comments()
          {
                    return $this->hasMany(Comment::class, "articleID");
          }
          public function reports()
          {
                    return $this->hasMany(Report::class, "articleID");
          }
}
