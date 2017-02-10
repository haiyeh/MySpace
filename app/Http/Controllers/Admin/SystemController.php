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
        $diary = $request->diary;
        $say = $request->say;
        $album = $request->album;
        $comment = $request->comment;
        $message = $request->message;

        $status = System::getAllFuncStatus();

        if ($status == false){
            $res = System::saveFuncStatus($diary, $say, $message, $album, $comment);
        }else{
            $res = System::updateFuncStstus($status, $diary, $say, $message, $album, $comment);
        }

        $func = System::getFuncStatus();

        $arr = array(
            'diary' => $func->diary,
            'say' => $func->say,
            'message' => $func->message,
            'comment' => $func->comment,
            'album' => $func->album,
        );

        $request->session()->put([
            'diary' => $func->diary,
            'say' => $func->say,
            'message' => $func->message,
            'comment' => $func->comment,
            'album' => $func->album,
        ]);

        if ($res){
            $arr['res'] = 1;
        }else{
            $arr['res'] = 0;
        }

        return json_encode($arr);

    }

}
