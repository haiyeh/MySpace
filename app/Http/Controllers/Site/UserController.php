<?php

namespace App\Http\Controllers\Site;

use App\model\City;
use App\model\Usermsg;
use Encore\Admin\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\model\User as NewUser;
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
        $city = City::getAllCity();
        $user = $request->user();
        $userMsg = Usermsg::getUserMsg($user->id);
//        var_dump($userMsg);die;
        $request->session()->put([
            'username' => $user->name,
            'user_id' => $user->id
        ]);
        if (empty($userMsg)){
            return view('site.userMsgSetting', ['title' => $title, 'userMsg' => $userMsg, 'city' => $city]);
        }else{
            $request->session()->put([
                'userHeaderPath' => $userMsg->headerpath,
                'userAddress' => $userMsg->address,
                'userSex' => $userMsg->sex
            ]);

            return redirect('/');
        }

//        print_r($_SESSION['username']);

    }

    public function userInfo()
    {
        $userMsg = Usermsg::getUserMsg(session('user_id'));
        $city_id = substr($userMsg->address, 0, 1);
        $cityname = City::getCity($city_id);
        return view('site.userInfo', ['userMsg' => $userMsg, 'cityname' => $cityname]);
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

    public function register(Request $request)
    {
        $username = $request->name;
        $password = $request->password;
        $email = $request->email;
        $password_confirmation = $request->password_confirmation;

        if ($password != $password_confirmation){
            return -1;
        }

        $res = NewUser::saveUser($username, $password, $email);

        if ($res){
            return 1;
        }else{
            return 0;
        }

    }
}
