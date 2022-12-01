<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Authors extends Model
{
    use HasFactory;

    protected $table = "user";
    public function getAuthor($id)
    {
        return DB::table($this->table)->where('id', $id)->first();
    }

    public function getAllAuthor()
    {
        return DB::table($this->table)->get();
    }

    public function updateAvatar($id, $avatar)
    {
        DB::table($this->table)->where('id', $id)->update(['avatar' => $avatar]);
    }

    public function checkPassword($id, $old_password)
    {
        if (DB::table($this->table)
            ->where('id', $id)
            ->where('password', $old_password)
            ->exists()
        ) {
            return true;
        } else {
            return false;
        }
    }

    public function updatePassword($id, $password)
    {
        DB::table($this->table)->where('id', $id)->update(['password' => $password]);
    }

    public function updateInformation($id, $information)
    {
        DB::table($this->table)->where('id', $id)->update([
            'phone' => $information['phone_number'],
            'full_name' => $information['full_name'],
            'address' => $information['address']
        ]);
    }
}