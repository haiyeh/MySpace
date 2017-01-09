<?php

namespace App\Http\Controllers\Admin;

use App\model\Album;
use App\model\Pic;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $image = Pic::getAllImage();
        $album = Album::getAlbums();
        return view('admin.image', ['image' => $image, 'album' => $album , 'title' => '图片管理']);
    }

    public function album()
    {
        $album = Album::getAllAlbum();
        return view('admin.album', ['album' => $album, 'title' => '相册列表']);
    }

    public function getAlbumMsg(Request $request)
    {
        $id = $request->id;
        $albumMsg = Album::getAlbumMsg($id);
        if (empty($albumMsg)){
            return 0;
        }

        if ($albumMsg->status == 1){
            $arr = array(
                'album_id' => $albumMsg->id,
                'album_name' => $albumMsg->album_name,
                'album_desc' => $albumMsg->desc,
                'album_type' => $albumMsg->type,
                'album_status' => '公开'
            );
        }else{
            $arr = array(
                'album_desc' => $albumMsg->desc,
            );
        }


        return json_encode($arr);
    }

    public function getAlbumDelete(Request $request)
    {
        $id = $request->id;
        $res = Album::delAlbum($id);

        if ($res){
            return 1;
        }else{
            return 0;
        }
    }

    public function getAlbumEdit(Request $request)
    {
        $id = $request->id;
        $albumMsg = Album::getAlbumMsg($id);

        if (empty($albumMsg)){
            return 0;
        }

        $arr = array(
            'album_id' => $albumMsg->id,
            'album_name' => $albumMsg->album_name,
            'album_desc' => $albumMsg->desc,
            'album_type' => $albumMsg->type,
            'album_status' => $albumMsg->status,
            'album_token' => csrf_token(),
            'album_url' => url('admin/editAlbumStore'),
        );

        return json_encode($arr);
    }

    public function editAlbumStore(Request $request)
    {
        $id = $request->id;
        $name = $request->album_name;
        $type = $request->type;
        $desc = $request->desc;
        $status = $request->status;

        $res = Album::updateAlbum($id, $name, $type, $desc, $status);

        if ($res) {
            return 1;
        }else{
            return 0;
        }
    }
}
