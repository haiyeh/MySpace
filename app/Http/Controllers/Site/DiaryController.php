<?php

namespace App\Http\Controllers\Site;

use App\model\Comment;
use Illuminate\Http\Request;
use App\model\Diary;
use App\Http\Requests;
use App\model\Praise;
use App\Http\Controllers\Controller;

class DiaryController extends Controller
{
	public function index()
	{
		$diarys = Diary::getAllDiary();
		$count = Diary::getDiaryCount();
		return view('site/diary', [
            'title' => 'My Diary',
            'diarys' => $diarys, 
            'count' => $count,
        ]);
	}

	public function createDiary()
	{
        return view('site/createDiary', [
            'title' => 'Create Diary',
        ]);
	}

	public function store(Request $request)
    {
    	$title = $request->title;
        $content = $request->content;

        if (empty($request->published_at)) {
        	$res = Diary::addDiary($title, $content);
        }else{
        	$published_at = $request->published_at;
        	$res = Diary::addDiary($title, $content, $published_at);
        }
        
        if ($res) {
            return 1;
        }else{
            return 0;
        }
    }

    public function read(Request $request)
    {
        $id = $request->id;
        $diary = Diary::getOneDiary($id);
        $praiseCount = Praise::getPraiseCount(1,$id);
        if (empty($praiseCount)){
            $praiseCount = 0;
        }

        $article_comment = Comment::getComment(1, $id);
//        var_dump($article_comment);die;
        return view('site/article', [
            'diary' => $diary,
            'title' => $diary->title,
            'praiseCount' => $praiseCount,
            'article_comment' => $article_comment
        ]);
    }

}