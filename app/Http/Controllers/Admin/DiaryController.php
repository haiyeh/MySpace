<?php

namespace App\Http\Controllers\Admin;

use App\model\Diary;
use Illuminate\Http\Request;

use App\Http\Requests;
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

}
