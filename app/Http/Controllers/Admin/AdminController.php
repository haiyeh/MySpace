<?php

namespace App\Http\Controllers\Admin;

use App\model\Admin;
use App\model\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\model\Diary;
use App\model\Say;
use App\model\Pic;
use App\model\Message;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diaries = Diary::getAllDiary();
        $diaryCount = Diary::getDiaryCount();
        $say = Say::getAdminSay();
        $sayCount = Say::getSayCount();
        $message = Message::getAllMessage();
        $messageCount = Message::getMessageCount();
        $comment = Comment::getAllComment();
        $imageCount = Pic::getImageCount();

        $arr = array(
            'diary' => $diaries,
            'diaryCount' => $diaryCount,
            'say' => $say,
            'sayCount' => $sayCount,
            'message' => $message,
            'messageCount' => $messageCount,
            'comment' => $comment,
            'imageCount' => $imageCount,
            'title' => '内容管理页面'
        );
        return view('admin.index', $arr);
    }

    public function password()
    {
        return view('admin.password', ['title' => '管理员密码修改']);
    }

    public function pwdReset(Request $request)
    {
        $admin_name = $request->admin;
        $admin_pwd = md5($request->password);

        $res = Admin::pwdReset($admin_name, $admin_pwd);

        if ($res){
            return 1;
        }else{
            return 0;
        }

    }
}
