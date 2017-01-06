<?php

namespace App\Http\Controllers\Admin;

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
        $say = Say::getAllSay();
        $sayCount = Say::getSayCount();
//        var_dump($sayCount);die;
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

}
