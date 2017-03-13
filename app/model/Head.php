<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Head extends Model
{

    public static function getHead($head_id)
    {
        return Head::where('id', $head_id)->first();
    }

    public static function getAllHead()
    {
        return Head::get();
    }

    public static function getPageHead()
    {
        return Head::paginate(5);
    }

    public static function saveHeadImg($headPath)
    {
        $head = new Head();
        $head->headpath = $headPath;
        return $head->save();
    }

    public static function headDel($id)
    {
        return Head::destroy($id);
    }
}
