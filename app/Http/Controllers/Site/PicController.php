<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Common;
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
        return view('site/picture', [
            'title' => 'picture',
        ]);
    }

    public function uploadPic()
    {
        return view('site/uploadPic', ['title' => 'upload picture']);
    }
}
