<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public static function getAllUser()
    {
    	return User::orderby('id')->paginate(8);
    }

    public static function saveUser($name, $password, $email)
    {
        $user = new User();
        $user->name = $name;
        $user->password = bcrypt($password);
        $user->email = $email;

        return $user->save();
    }

}
