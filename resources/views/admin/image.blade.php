@extends('common.admin')

@section('admin_right')
    <div class="btn-group">
        <button type="button" class="btn btn-danger">相册</button>
        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu" role="menu">
            @foreach($album as $value)
                <li><a href="#">{{ $value->album_name }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="admin_right_diary_list">
        <table class="table table-bordered">
            <tr>
                <th>编号</th>
                <th>图片</th>
                <th>状态</th>
                <th>上传时间</th>
                <th>编辑</th>
            </tr>
            @foreach($image as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->imgpath }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ date("Y-m-d", $item->upload_at) }}</td>
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
        {!! $image->render() !!}
    </div>
@endsection