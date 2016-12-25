<?php

namespace App\model;

use App\model\Say;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Say extends Model
{
    public static function getAllSay()
    {
    	$say = Say::orderby('published_at', 'desc')->paginate(5);
    	return $say;
    }

    public static function getSayCount()
    {
    	$count = Say::count();
    	return $count;
    }

    public static function addSay($content)
    {
    	$say = new Say;
    	$say->content = $content;
    	$say->published_at = time();
    	$res = $say->save();
    	if ($res) {
    		return true;
    	}else{
    		return false;
    	}
    }
}
