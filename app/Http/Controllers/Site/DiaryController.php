<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

class DiaryController extends Controller
{
	public function index()
	{
		return view('site/diary', ['title' => 'My Diary']);
	}
}