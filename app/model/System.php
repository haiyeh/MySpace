<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    public static function getAllFuncStatus()
    {
        $res = System::first();

        if (empty($res)){
            return $res->id;
        }else{
            return false;
        }
    }

    public static function saveFuncStatus($diary, $say, $message, $album, $comment, $parise)
    {
        $sys = new System();
        $sys->diary = $diary;
        $sys->say = $say;
        $sys->message = $message;
        $sys->album = $album;
        $sys->comment = $comment;
        $sys->parise = $parise;

        return $sys->save();
    }

    public static function updateFuncStstus($id, $diary, $say, $message, $album, $comment, $parise)
    {
        return System::where('id', $id)->update(['diary' => $diary, 'say' => $say, 'message' => $message, 'album' => $album, 'comment' => $comment, 'parise' => $parise]);
    }
}
