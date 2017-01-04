<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Usermsg extends Model
{
    public static function saveUserMsg($user_id, $username, $phonenumber, $address, $livestatus, $sex, $hobby, $desc, $headerpath)
    {
        $usermsg = new Usermsg();
        $usermsg->user_id = $user_id;
        $usermsg->username = $username;
        $usermsg->phonenumber = $phonenumber;
        $usermsg->address = $address;
        $usermsg->livestatus = $livestatus;
        $usermsg->sex = $sex;
        $usermsg->hobby = $hobby;
        $usermsg->desc = $desc;
        $usermsg->headerpath = $headerpath;
        return $usermsg->save();
    }
}
