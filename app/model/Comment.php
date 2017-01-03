<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public static function doComment($type, $bid, $content)
    {
        $comment = new Comment();
        $comment->type = $type;
        $comment->bid = $bid;
        $comment->content = $content;
        $res = $comment->save();
        return $res;
    }

    public static function getComment($type, $bid)
    {
        return Comment::where(['type' => $type, 'bid' => $bid])->paginate(10);
    }
}
