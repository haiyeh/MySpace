<?php

namespace App\Http\Controllers\Admin;

use App\model\System;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SystemController extends Controller
{
    public function index()
    {
        return view('admin.system', ['title' => '系统设置']);
    }

    public function save(Request $request)
    {
        $diary = self::getStatus($request->diary);
        $say = self::getStatus($request->say);
        $album = self::getStatus($request->album);
        $comment = self::getStatus($request->comment);
        $message = self::getStatus($request->message);
        $parise = self::getStatus($request->parise);

        $status = System::getAllFuncStatus();
        if ($status == false){
            $res = System::saveFuncStatus($diary, $say, $message, $album, $comment, $parise);
        }else{
            $res = System::updateFuncStstus($status, $diary, $say, $message, $album, $comment, $parise);
        }

        if ($res){
            return 1;
        }else{
            return 0;
        }

    }

    public static function getStatus($func)
    {
        if ($func == true){
            $func = 1;
        }else{
            $func = 0;
        }
        return $func;
    }
}
