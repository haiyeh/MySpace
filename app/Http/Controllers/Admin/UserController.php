<?php

namespace App\Http\Controllers\Admin;

use App\model\Head;
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

   public function headImg()
   {
       $head = Head::getAllHead();
       return view('admin.head', ['title' => '头像管理', 'head' => $head]);
   }

   public function addHead()
   {
       return view('admin.uploadHead');
   }

   public function head_upload(Request $request)
   {

   }

   public function headDel(Request $request)
   {

   }

}
