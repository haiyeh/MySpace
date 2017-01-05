<?php

namespace App\Http\Controllers\Site;

use App\model\Message;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{

    public function index()
    {
        $msg = Message::getAllMsg();
//        print_r($msg);die;
        return view('site/msgIndex', ['title' => 'message board', 'msg' => $msg]);
    }

    public function storeMessage(Request $request)
    {
        $user_id = session('user_id');
        if (!isset($user_id)){
            return -1;  //表示用户未登录
        }
        $leave_at = time();
        $content = $request->content;
        $res = Message::storeMsg($user_id, $leave_at, $content);
        if ($res){
            return 1;   //表示留言成功
        }else{
            return 0;   //表示留言失败
        }
    }

}
