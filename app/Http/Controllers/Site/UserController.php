<?php

namespace App\Http\Controllers\Site;

use App\model\City;
use App\model\Head;
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
            $userHead_id =  $userMsg->head_id;
            $headpath = Head::getHead($userHead_id);
            $request->session()->put([
                'userHead_id' => $headpath->headpath,
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
        $head_id = $userMsg->head_id;
        $headpath = Head::getHead($head_id);
//        var_dump($headpath);
        return view('site.userInfo', ['userMsg' => $userMsg, 'cityname' => $cityname, 'headpath' => $headpath]);
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
//        $headerpath = 'http://localhost/Upload/2016-12-29/default.jpg';
        $head_id = 1;
        $res = Usermsg::saveUserMsg($user_id, $username, $phonenumber, $address, $livestatus, $sex, $hobby, $desc, $head_id);
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

    public function head()
    {
        $head = Head::getAllHead();
        return view('site.headimg', ['head' => $head]);
    }

    public function head_reset(Request $request)
    {
        $head_id = $request->head;
//        var_dump($head_id);die;
        $res = Usermsg::head_reset(session('user_id'), $head_id);

        if ($res){
            return "头像修改成功，请点击右上角的关闭按钮后刷新即可显示";
        }else{
            return "头像修改失败，点击<a onclick='history.back(-1)'>返回</a>";
        }
    }
}
