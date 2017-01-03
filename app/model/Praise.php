<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Praise extends Model
{
    public static function doPraise($type, $bid)
    {
        $praise = new Praise();
        $check = Praise::checkPraiseExists($type, $bid);
        if ($check){
            $count = Praise::getPraiseCount($type, $bid);
//            var_dump($count);die;
            $res = Praise::where(['type' => $type, 'bid' => $bid])->update(['count' => $count->count+1]);
            return $res;
        }
        $praise->type = $type;
        $praise->bid = $bid;
        $praise->count++;
        $res = $praise->save();
        return $res;
    }

    public static function getPraiseCount($type, $bid)
    {
        $res = Praise::select('count')->where(['type' => $type, 'bid' => $bid])->first();
        return $res;
    }

    public static function checkPraiseExists($type, $bid)
    {
        $res = Praise::where(['type' => $type, 'bid' => $bid])->first();
        if ($res){
            return true;
        }else{
            return false;
        }
    }
}
