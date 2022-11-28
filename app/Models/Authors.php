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
        $author = DB::table($this->table)->where('id', $id)->get();
        return $author;
    }

    public function updateAvatar($id, $avatar)
    {
        DB::table($this->table)->where('id', $id)->update(['avatar' => $avatar]);
    }

    public function updatePassword($id, $password)
    {
        DB::table($this->table)->where('id', $id)->update(['password' => md5($password)]);
    }

    public function updateInformation($id, $information)
    {
        // dd($information);
        DB::table($this->table)->where('id', $id)->update([
            'phone' => $information['phone_number'],
            'full_name' => $information['full_name'],
            'address' => $information['address']
        ]);
    }
}