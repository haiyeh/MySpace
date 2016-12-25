<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public static function checkTypeExist($typename)
    {

    	/*查询相册类型是否已经存在，如果已经存在则使用type表的ID，不存在则新增一个type*/
    	$res = Type::where('typename', $typename)->first();
    	if ($res) {
    		return $res->id;
    	}else{
    		$type = new Type;
    		$type->typename = $typename;
    		$res = $type->save();
    		if ($res) {
    			return true;
    		}else{
    			return false;
    		}
    	}
    }
}
