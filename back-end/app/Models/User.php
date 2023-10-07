<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
          use HasApiTokens, HasFactory, Notifiable;
          protected $table = "users";

          protected $fillable = [
                    'username',
                    'password',

          ];
          protected $hidden = [
                    'password',
                    'remember_token',
          ];

          public function getJWTIdentifier()
          {
                    return $this->getKey();
          }
          public function getJWTCustomClaims()
          {
                    return [];
          }

          public function article()
          {
                    return $this->hasMany(Article::class);
          }
          public function comment()
          {
                    return $this->hasMany(Comment::class);
          }
          public function role()
          {
                    return $this->belongsTo(Role::class);
          }
}
