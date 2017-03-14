<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Comment extends Model
{
    public static function doComment($type, $bid, $content)
    {
        $comment = new Comment();
        $comment->type = $type;
        $comment->bid = $bid;
        $comment->user_id = session('user_id');
        $comment->content = $content;
        $comment->comment_at = time();
        $res = $comment->save();
        return $res;
    }

    public static function getComment($type, $bid)
    {
        $comment = DB::table('usermsgs')
            ->join('comments', 'comments.user_id', '=', 'usermsgs.user_id')
            ->join('heads', 'heads.id', '=', 'usermsgs.head_id')
            ->select('comments.id', 'heads.headpath', 'usermsgs.username', 'comments.content', 'comments.comment_at')
            ->where(['type' => $type, 'bid' => $bid])
            ->orderby('comment_at', 'desc')
            ->paginate(8);

        return $comment;
//        return Comment::where(['type' => $type, 'bid' => $bid])->orderby('comment_at', 'desc')->paginate(10);
    }

    public static function getAllComment()
    {
        return Comment::select('id', 'content', 'comment_at')->orderby('comment_at')->paginate(6);
    }

    public static function delComment($id)
    {
        return Comment::destroy($id);
    }

    public static function commentDel($bid)
    {
        return Comment::where('bid', $bid)->delete();
    }

}
