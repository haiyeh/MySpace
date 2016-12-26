<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests;

class Album extends Model
{
    public static function storeAlbum($name,$type,$desc,$status)
    {
    	$album = new Album;
    	$album->album_name = $name;
    	$album->type = $type;
    	$album->desc = $desc;
    	$album->status = $status;
    	
    	$res = $album->save();
    	return $res;
    }

    public static function getAlbums()
    {
        $albums = Album::all();
        if ($albums){
            return $albums;
        }else{
            return false;
        }
    }
}
