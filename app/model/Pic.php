<?php

namespace App\model;
use App\model\Album;
use DB;
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

    /*
     * 获取相册的封面图片以及相册信息，如果未设置封面图片则选最新上传的一张作为封面图
     * */
    public static function getMainImg()
    {
        $id = Album::getAlbumId();
        $count = 0;     //用作数组下标计数
        $res = array();
        foreach ($id as $key => $value){
//            $res[$count] = Pic::where(['album_id' => $value->id, 'status' => 1])->first();//status 1  表示 封面图
            $res[$count] = DB::table('pics')
                ->join('albums', 'pics.album_id', '=', 'albums.id')
                ->select('albums.album_name', 'albums.desc', 'pics.imgpath', 'pics.album_id')
                ->where(['pics.album_id' => $value->id, 'pics.status' => 1])
                ->get();
            if (empty($res[$count])){
//                $res[$count] = Pic::where('album_id', $value->id)->orderby('upload_at', 'desc')->first();
                $res[$count][0] = DB::table('pics')
                    ->join('albums', 'pics.album_id', '=', 'albums.id')
                    ->select('albums.album_name', 'albums.desc', 'pics.imgpath', 'pics.album_id')
                    ->where(['album_id' => $value->id])
                    ->first();
            }
            $count++;
        }
//        var_dump($res);die;
        return $res;
    }

    public static function getImageCount()
    {
        return Pic::count();
    }

    public static function getAllImage()
    {
        return Pic::paginate(8);
    }

    public static function imageDel($id)
    {
        return Pic::destroy($id);
    }
}
