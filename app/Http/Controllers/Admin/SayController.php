<?php

namespace App\Http\Controllers\Admin;

use App\model\Say;
use Illuminate\Http\Request;

use App\Http\Requests;
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
        $say = Say::getAllSay();
        return view('admin.say', ['say' => $say, 'title' => '说说列表']);
    }

}
