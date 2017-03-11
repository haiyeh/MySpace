<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public static function storeCity($cityName)
    {
        $city = new City();
        $city->cityname = $cityName;

        return $city->save();
    }

    public static function getCity($city_id)
    {
        return City::select('cityname')->where('id', $city_id)->first();
    }

    public static function getAllCity()
    {
        return City::orderby('id')->get();
    }

    public static function getPageCity()
    {
        return City::orderby('id')->paginate(10);
    }

    public static function delCity($id)
    {
        return City::destroy($id);
    }

}
