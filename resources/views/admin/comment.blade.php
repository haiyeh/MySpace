@extends('common.admin')

@section('admin_right')
    <div class="admin_right_diary_list">
        <table class="table table-bordered">
            <tr>
                <th>编号</th>
                <th>评论</th>
                <th>评论时间</th>
                <th>编辑</th>
            </tr>
            @foreach($comment as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{!! $item->content !!}</td>
                    <td>{{ date("Y-m-d", $item->comment_at) }}</td>
                    <td>
                        <a href="" class="btn btn-primary">
                            <span class="glyphicon glyphicon-eye-open"></span>查看
                        </a>
                        <a href="" class="btn btn-default">
                            <span class="glyphicon glyphicon-edit"></span>编辑
                        </a>
                        <a href="" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove-circle"></span>删除
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="container">
        {!! $comment->render() !!}
    </div>
@endsection