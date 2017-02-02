<?php

namespace App\Http\Controllers\Site;

use App\model\Usermsg;
use Encore\Admin\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function applyAccount()
    {
        return view('auth.register');
    }


    public function userMsg(Request $request)
    {
        $title = '用户信息设置';
        $user = $request->user();
        $userMsg = Usermsg::getUserMsg($user->id);
//        var_dump($userMsg);die;
        if (empty($userMsg)){
            $request->session()->put([
                'user_id' => $user->id,
                'username' => $user->name,
            ]);
            $userMsg = null;
        }else{
            $request->session()->put([
                'user_id' => $user->id,
                'username' => $user->name,
                'userHeaderPath' => $userMsg->headerpath,
                'userAddress' => $userMsg->address,
                'userSex' => $userMsg->sex
            ]);
        }

//        print_r($_SESSION['username']);
        return view('site.userMsgSetting', ['title' => $title, 'userMsg' => $userMsg]);
    }

    public function saveUser(Request $request)
    {
        $username = $request->username;
        $user_id = session('user_id');
        $phonenumber = $request->phonenumber;
        $city = $request->city;
        $street = $request->street;
        $sex = $request->sex;
        $hobby = $request->hobby;
        $desc = $request->desc;
        $livestatus = $request->alone;
        $address = $city.'-'.$street;
        $headerpath = 'http://localhost/Upload/2016-12-29/default.jpg';
        $res = Usermsg::saveUserMsg($user_id, $username, $phonenumber, $address, $livestatus, $sex, $hobby, $desc, $headerpath);
        if ($res){
            return 1;
        }else{
            return 0;
        }
    }
}
