<?php

namespace App\model;
use App\model\Album;
use Illuminate\Database\Eloquent\Model;

class Pic extends Model
{
    public static  function addImgPath($imgpath, $album_id, $upload_at)
    {
        $pic = new Pic();
        $pic->imgpath = $imgpath;
        $pic->album_id = $album_id;
        $pic->upload_at = $upload_at;
        $pic->status = 0;
        $res = $pic->save();
        if ($res){
            return true;
        }else{
            return false;
        }
    }
}
