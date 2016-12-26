<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;

use App\model\Album;
use App\model\Type;
use App\Http\Requests;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
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
        return view('site/picture', [
            'title' => 'picture',
        ]);
    }

    public function newAlbum()
    {
        return view('site/newAlbum', ['title' => '新建相册']);
    }

    public function storeAlbum(Request $request)
    {
        $name = $request->input('name');
        $desc = $request->input('desc');
        $status = $request->input('status');
        $type = Type::checkTypeExist($request->input('type'));
        if (!$type) {
            return 0;
        }
        if (empty($status)) {
            $status = 0;   //0表示不公开相册
        }
        $res = Album::storeAlbum($name,$type,$desc,$status);
        if ($res) {
            return 1;
        }else{
            return 0;
        }
    }

    public function uploadPic()
    {
        $albums = Album::getAlbums();
        if (empty($albums)){
            $albums = '暂无相册';
        }
        return view('site/uploadPic', ['title' => 'upload picture', 'albums' => $albums]);
    }

    public function upload(Request $request)
    {

    }
}
