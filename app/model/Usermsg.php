<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Usermsg extends Model
{
    public static function saveUserMsg($user_id, $username, $phonenumber, $address, $livestatus, $sex, $hobby, $desc, $head_id)
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
        $usermsg->head_id = $head_id;
        return $usermsg->save();
    }

    public static function getUserMsg($user_id)
    {
        return Usermsg::where('user_id', $user_id)->first();
    }

    public static function head_reset($user_id, $head_id)
    {
        return Usermsg::where('user_id', $user_id)->update(['head_id' =>  $head_id]);
    }
}
