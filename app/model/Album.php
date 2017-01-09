<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests;

class Album extends Model
{
    public static function storeAlbum($name, $type, $desc, $status)
    {
    	$album = new Album;
    	$album->album_name = $name;
    	$album->type = $type;
    	$album->desc = $desc;
    	$album->status = $status;
    	
    	$res = $album->save();
    	return $res;
    }

    public static function updateAlbum($id, $name, $type, $desc, $status)
    {
        return  Album::where('id', $id)
            ->update(['album_name' => $name,
                'type' => $type,
                'desc' => $desc,
                'status' => $status
            ]);
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

    public static function getAllAlbum()
    {
        return Album::paginate(6);
    }

    public static function getAlbumId()
    {
        $id = Album::select('id')->get();
        if (empty($id)){
            return false;
        }else{
            return $id;
        }
    }

    public static function getAlbumName($id)
    {
        $album_name = Album::select('album_name')->where('id', $id)->first();
        if (empty($album_name->album_name)){
            return false;
        }else{
            return $album_name->album_name;
        }
    }

    public static function getAlbumMsg($id)
    {
        return Album::where('id', $id)->first();
    }

    public static function delAlbum($id)
    {
        return Album::where('id', $id)->delete();
    }

}
