<?php

namespace App\Http\Controllers\Admin;

use App\model\Diary;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\model\Praise;
use App\model\Comment;
use App\Http\Controllers\Controller;

class DiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diary = Diary::getAllDiary();
        return view('admin.diary', ['diary' => $diary, 'title' => '日志列表']);
    }

    public function getDiaryMsg(Request $request)
    {
        $id = $request->id;
        $diary = Diary::getOneDiary($id);
        $praiseCount = Praise::getPraiseCount(1,$id);

        if (empty($praiseCount)){
            $praiseCount = 0;
        }

        $article_comment = Comment::getComment(1, $id);

        return view('site/article', [
            'diary' => $diary,
            'title' => $diary->title,
            'praiseCount' => $praiseCount,
            'article_comment' => $article_comment
        ]);
    }

    public function getDiaryEdit(Request $request)
    {
        $id = $request->id;
        $diary = Diary::getOneDiary($id);

        return view('site/createDiary', [
            'title' => $diary->title,
            'diary' => $diary
        ]);
    }

    public function getDiaryDelete(Request $request)
    {
        $id = $request->id;
        $res = Diary::delDiary($id);

        if ($res){
            return 1;
        }else{
            return 0;
        }
    }

}
