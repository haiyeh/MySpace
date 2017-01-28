<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public static function getAllUser()
    {
    	return User::orderby('id')->paginate(8);
    }

}
