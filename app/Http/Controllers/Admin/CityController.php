<?php

namespace App\Http\Controllers\Admin;

use App\model\City;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CityController extends Controller
{

    public function index()
    {
        $city = City::getPageCity();

        return view('admin.city', ['title' => '城市列表', 'city' => $city]);
    }

    public function storeCity(Request $request)
    {
        $city = $request->cityname;
        $res = City::storeCity($city);

        if ($res){
            return 1;
        }else{
            return 0;
        }

    }

    public function cityDel(Request $request)
    {
        $id = $request->id;

        $res = City::delCity($id);

        if ($res){
            return 1;
        }else{
            return 0;
        }
    }

}
