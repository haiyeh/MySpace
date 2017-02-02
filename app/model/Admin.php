<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public static function login($admin_name, $admin_pwd)
    {
        return Admin::where(['admin_name' => $admin_name, 'admin_pwd' => $admin_pwd])->first();
    }
}
