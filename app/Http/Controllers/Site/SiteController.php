<?php

namespace App\Http\Controllers\Site;

use App\model\Diary;
use App\model\Pic;
use App\model\Praise;
use App\model\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class SiteController extends Controller
{
	public function index()
	{
		$diaries = Diary::getDiary();
//        var_dump($diaries);
        $praiseCount = Praise::getPraiseCount(1,$diaries->id);
        if (empty($praiseCount)){
            $praiseCount = 0;
        }
		return view('site/index', [
			'title' => 'MySpace Site', 
			'diary' => $diaries,
            'praiseCount' => $praiseCount
		]);
	}

	public function praise(Request $request)
    {
        $type = $request->type;
        $bid = $request->bid;
        $res = Praise::doPraise($type, $bid);
        $praiseCount = Praise::getPraiseCount($type, $bid);
        $count = $praiseCount->count;
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