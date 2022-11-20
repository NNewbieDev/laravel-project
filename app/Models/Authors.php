<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Authors extends Model
{
    use HasFactory;

    protected $table = "authors";
    public function getAuthor($id)
    {
        // $author = DB::select("SELECT * FROM authors WHERE authorID = " . $id);
        $author = DB::table($this->table)->where('authorID', $id)->get();
        return $author;
    }

    public function updateAvatar($id, $avatar)
    {
        DB::table($this->table)->where('authorID', $id)->update(['avatar' => $avatar]);
    }

    public function updatePassword($id, $password)
    {
        DB::table($this->table)->where('authorID', $id)->update(['password' => md5($password)]);
    }

    public function updateInformation($id, $information)
    {
        DB::table($this->table)->where('authorID', $id)->update([
            'phoneNumber' => $information['phone_number'],
            'fullName' => $information['full_name'],
            'address' => $information['address']
        ]);
    }
}