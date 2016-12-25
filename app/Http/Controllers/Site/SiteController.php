<?php

namespace App\Http\Controllers\Site;

use App\model\Diary;
use App\model\Pic;
use Auth;
use App\Common;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class SiteController extends Controller
{
	public function index()
	{
		$diaries = Diary::getDiary();
		return view('site/index', [
			'title' => 'MySpace Site', 
			'diary' => $diaries,
		]);
	}
	
}