<?php

namespace App\Http\Controllers\Site;

use App\model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class PwdController extends Controller
{
    public function password()
    {
        return view('auth.password');
    }

    public function pwdReset(Request $request)
    {
        $password_old = $request->pwd_old;
        $password_new = bcrypt($request->pwd_new);
        $username = session('username');

        if (empty(session('username'))){
            return -2; //用户未登陆
        }

        if ($password_new == $password_old){
            return -1; //新旧密码相同
        }

        $pwd_old = User::getPwd($password_old, $username);
//        var_dump($pwd_old);die;
        if (Hash::check($password_old, $pwd_old->password)){
            $res = User::pwdReset($password_new, $username);
            if ($res){
                return 1;  //密码修改成功
            }else{
                return 0;  //密码修改失败
            }
        }else{
            return -3; //旧密码输入错误
        }


    }

}
