<?php

namespace App\model;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{

    public static function getDiary()
    {
        $diary = Diary::where('published_at', '<=', time())->orderby('published_at', 'desc')->first();
        return $diary;
    }

    public static function getOneDiary($id)
    {
        $diary = Diary::where('id', $id)->first();
        return $diary;
    } 

    public static function getAllDiary()
    {
    	$diary = Diary::where('published_at', '<=', time())->paginate(6);
    	return $diary;
    }

    public static function getDiaryCount()
    {
    	$count = Diary::where('published_at', '<=', time())->count();
    	return $count;
    }

    public static function getHotDiary(){
        return Diary::orderby('click', 'desc')->limit(5)->get();
    }

    public static function addDiary($title, $content, $published_at = null)
    {
    	$diary = new Diary;
    	$diary->title = $title;
    	$diary->content = $content;
    	if (!empty($published_at)) {
    		$diary->published_at = strtotime($published_at);
    	}else{
    		$diary->published_at = time();
    	}
    	
    	$res = $diary->save();
    	if ($res) {
    		return true;
    	}else{
    		return false;
    	}
    }

    public static function updateDiaryClick($id)
    {
        $click = Diary::getDiaryClick($id);
        return Diary::where('id', $id)->update(['click' => $click->click+1]);
    }

    public static function getDiaryClick($id)
    {
        return Diary::select('click')->where('id', $id)->first();
    }

    public static function delDiary($id)
    {
        return Diary::destroy($id);
    }

}
