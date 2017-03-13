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
       $head = Head::getPageHead();
       return view('admin.head', ['title' => '头像管理', 'head' => $head]);
   }

   public function addHead()
   {
       return view('admin.uploadHead');
   }

   public function head_upload(Request $request)
   {
       if ($request->hasFile('file')){
           $foldName = "head_img";

           $file = $request->file('file');

           foreach ($file as $key => $value){
//                var_dump($value);die;
               $extension = $value->getClientOriginalExtension();
               $fileName = $value->getClientOriginalName();      //获得缓存的tmp文件名
               $filePath = $value->getRealPath();                //获得文件缓存的本地路径

//                var_dump($fileName);die;
               $store = $value->move($foldName, $fileName);

               $headPath = $foldName.'/'.$fileName;

               $res = Head::saveHeadImg($headPath);
               if ($res == false){
                   return "保存失败";
               }
               if ($store == false){
                   return "上传失败";
               }
           }
           return "<h3>上传成功</h3><hr>";
       }
   }

   public function headDel(Request $request)
   {
       $id = $request->id;
       $res = Head::headDel($id);
       if ($res){
           return 1;
       }else{
           return 0;
       }
   }

}
