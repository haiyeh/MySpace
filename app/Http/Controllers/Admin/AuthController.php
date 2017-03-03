<?php

namespace App\Http\Controllers\Admin;

use App\model\Admin;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.auth.login', ['title' => '管理员登陆']);
    }
    public function login(Request $request)
    {
        $admin_name = $request->admin_name;
        $admin_pwd = $request->admin_pwd;

        $res = Admin::login($admin_name, md5($admin_pwd));

        if ($res){
            $request->session()->put('admin', $admin_name);
            return redirect('/');
        }else{
            echo "<script>alert('账号或密码有误，请重新输入');history.back(-1);</script>";
        }


    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}
