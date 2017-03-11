<?php

namespace App\Http\Controllers\Site;

use App\model\Diary;
use App\model\Pic;
use App\model\Praise;
use App\model\Comment;
use App\Http\Controllers\Controller;
use App\model\Source;
use App\model\System;
use Illuminate\Http\Request;


class SiteController extends Controller
{
	public function index(Request $request)
	{
		$diaries = Diary::getDiary();
//        var_dump($diaries);
        $praiseCount = Praise::getPraiseCount(1,$diaries->id);

        $sources = Source::getPubSources();

        $hotDiary = Diary::getHotDiary();

        $func = System::getFuncStatus();
        $request->session()->put([
            'diary' => $func->diary,
            'say' => $func->say,
            'message' => $func->message,
            'comment' => $func->comment,
            'album' => $func->album,
        ]);

        if (empty($praiseCount)){
            $praiseCount = 0;
        }

        if (empty($diaries)){
            $diaries = '暂无内容';
        }

        if (empty($sources)){
            $sources = null;
        }

		return view('site/index', [
			'title' => 'MySpace Site', 
			'diary' => $diaries,
            'hotDiary' => $hotDiary,
            'praiseCount' => $praiseCount,
            'sources' => $sources
		]);
	}

	public function praise(Request $request)
    {
        if (empty(session('username'))){
            $arr = array(
                'code' => -1,
            );
            return json_encode($arr);
        }
        $type = $request->type;
        $bid = $request->bid;
        $res = Praise::doPraise($type, $bid);
        $praiseCount = Praise::getPraiseCount($type, $bid);
        $count = $praiseCount->praises;

        if ($res){
            $arr = array(
                'code' => 1,
                'count' => $count,
            );
        }else{
            $arr = array(
                'code' => 0,
                'count' => $count,
            );
        }
        return json_encode($arr);
    }

    public function comment(Request $request)
    {
        $type = $request->type;
        $bid = $request->bid;
        $content = $request->content;
        $res = Comment::doComment($type, $bid, $content);

        if ($res){
            $arr = array(
                'code' => 1,
                'content' => $content,
            );
        }else{
            $arr = array(
                'code' => 0
            );
        }
        return json_encode($arr);
    }

}