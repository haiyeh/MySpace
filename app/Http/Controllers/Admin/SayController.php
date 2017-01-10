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

    public function getSayEdit(Request $request)
    {
        $id = $request->id;
        $say = Say::getOneSay($id);

        return view('site.createSay', ['title' => '说说编辑', 'say' => $say]);
    }

    public function sayDelete(Request $request)
    {
        $id = $request->id;
        $res = Say::sayDelete($id);

        if ($res){
            return 1;
        }else{
            return 0;
        }
    }

}
