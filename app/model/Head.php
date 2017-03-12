<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Head extends Model
{
    public static function getAllHead()
    {
        return Head::get();
    }

    public static function saveHeadImg($headPath)
    {
        $head = new Head();
        $head->headpath = $headPath;
        return $head->save();
    }
}
