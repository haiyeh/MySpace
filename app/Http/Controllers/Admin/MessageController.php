<?php

namespace App\Http\Controllers\Admin;

use App\model\Message;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{

    public function index()
    {
        $message = Message::getAllMessage();
        return view('admin.message', ['message' => $message, 'title' => '留言列表']);
    }

    public function messageDel(Request $request)
    {
        $id = $request->id;
        $res = Message::messageDel($id);

        if ($res){
            return 1;
        }else{
            return 0;
        }
    }

}
