<?php

namespace App\Http\Controllers\Admin;

use App\model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
   public function index()
   {
      $user = User::getAllUser();

       return view('admin.user',['title' => '用户列表', 'user' => $user]);
   }

}
