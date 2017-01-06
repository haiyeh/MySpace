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
        $comment->comment_at = time();
        $res = $comment->save();
        return $res;
    }

    public static function getComment($type, $bid)
    {
        return Comment::where(['type' => $type, 'bid' => $bid])->orderby('comment_at', 'desc')->paginate(10);
    }

    public static function getAllComment()
    {
        return Comment::select('id', 'content', 'comment_at')->orderby('comment_at')->paginate(6);
    }


}
