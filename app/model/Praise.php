<?php

namespace App\model;

use App\model\Diary;
use App\model\Album;
use Illuminate\Database\Eloquent\Model;

class Praise extends Model
{
    public static function doPraise($type, $bid)
    {
        if ($type == 1){
            $diaryPraise = new Diary();
        }else{
            $diaryPraise = new Album();
        }

        $check = Praise::getPraiseCount($type, $bid);

        $res = Diary::where('id', $bid)->update(['praises' => $check->praises+1]);
        return $res;
    }

    public static function getPraiseCount($type, $bid)
    {
        if ($type == 1){
            $res = Diary::select('praises')->where(['id' => $bid])->first();
        }else{
            $res = Album::select('count')->where(['id' => $bid])->first();
        }

        return $res;
    }

}
