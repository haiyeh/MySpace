<?php

namespace App\Http\Controllers\Admin;

use App\model\Message;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $message = Message::getAllMessage();
        return view('admin.message', ['message' => $message, 'title' => '留言列表']);
    }

}
