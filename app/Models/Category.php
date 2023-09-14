<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
          use HasFactory;
          protected $table = "categories";

          protected $fillable = ['id', 'name', 'link'];
          public function article()
          {
                    return $this->belongsTo(Article::class);
          }
}
