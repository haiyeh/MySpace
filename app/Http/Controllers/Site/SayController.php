<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\model\Say;
use App\Http\Requests;
use App\Common;
use App\Http\Controllers\Controller;

class SayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $says = Say::getAllSay();
        $count = Say::getSayCount();
        return view('site/say', [
            'title' => 'My Say', 
            'says' => $says, 
            'count' => $count,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSay()
    {
        return view('site/createSay', [
            'title' => 'Create Say',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content = $request->content;
        if (empty($content)) {
            return 2;
        }
        $res = Say::addSay($content);
        if ($res) {
            return 1;
        }else{
            return 0; 
        }
    }

    
}
