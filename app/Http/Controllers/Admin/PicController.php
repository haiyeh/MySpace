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


}
