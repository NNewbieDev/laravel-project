<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Employees extends Model
{
    use HasFactory;

    public function getAllUser()
    {
        $users = DB::select('SELECT * FROM users ORDER BY Create_at DESC');
        return $users;
    }
    public function getUser($id)
    {
        $user = DB::select('SELECT * FROM users WHERE UserID=?', [$id]);
        return $user;
    }
    public function addUser($data)
    {
        DB::insert('insert into users(UserName,Email,Create_at) values (?,?,?)', [$data['username'], $data['email'], $data['create_at']]);
    }

    public function updateUser($data)
    {
        DB::update('update users set UserName = ? , Email = ?, Create_at = ? WHERE UserID = ?', [$data['username'], $data['email'], $data['create_at'], $data['userid']]);
    }

    public function destroyUser($id)
    {
        DB::update('DELETE FROM users WHERE UserID = ?', [$id]);
    }
}