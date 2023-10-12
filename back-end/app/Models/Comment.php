<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
          use HasFactory;
          protected $table = "comments";

          protected $fillable = ['id', 'userID', 'content'];
          public function user()
          {
                    return $this->belongsTo(User::class, "userID");
          }
          public function article()
          {
                    return $this->belongsTo(Article::class, "articleID");
          }
}
