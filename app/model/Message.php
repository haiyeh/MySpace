<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public static function storeMsg($user_id, $leave_at, $content)
    {
        $msg = new Message();
        $msg->user_id = $user_id;
        $msg->leave_at = $leave_at;
        $msg->content = $content;
        return $msg->save();
    }

    public static function getAllMsg()
    {
        $user_id = session('user_id');
        $message = Message::select('id','content','leave_at','leave_id','user_id')->where('user_id', $user_id)->paginate(10);
        return $message;
    }

}
