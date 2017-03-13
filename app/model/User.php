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

    public static function getPwd($pwd_old, $username)
    {
        return User::select('password')->where(['name' => $username])->first();
    }

    public static function pwdReset($pwd_new, $username)
    {
        return User::where('name', $username)->update(['password' => $pwd_new]);
    }


}
