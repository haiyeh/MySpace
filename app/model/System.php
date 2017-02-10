<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    public static function getFuncStatus()
    {
        return System::first();
    }

    public static function getAllFuncStatus()
    {
        $res = System::first();

        if (!empty($res)){
            return $res->id;
        }else{
            return false;
        }
    }

    public static function saveFuncStatus($diary, $say, $message, $album, $comment)
    {
        $sys = new System();
        $sys->diary = $diary;
        $sys->say = $say;
        $sys->message = $message;
        $sys->album = $album;
        $sys->comment = $comment;

        return $sys->save();
    }

    public static function updateFuncStstus($id, $diary, $say, $message, $album, $comment)
    {
        return System::where('id', $id)->update(['diary' => $diary, 'say' => $say, 'message' => $message, 'album' => $album, 'comment' => $comment]);
    }
}
