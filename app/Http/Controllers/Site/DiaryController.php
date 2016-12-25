<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\model\Diary;
use App\Common;
use App\Http\Requests;
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
        return view('site/article', [
            'diary' => $diary,
            'title' => 'ARTICLE',
        ]);
    }

}