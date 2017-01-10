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
            <input type="hidden" id="url" value="{{ url('admin/imageDel') }}">
            @foreach($image as $item)
                <tr id="{{ $item->id }}">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->imgpath }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ date("Y-m-d", $item->upload_at) }}</td>
                    <td>
                        <a href="#" class="btn btn-primary" lay-submit lay-filter="image_look">
                            <span class="glyphicon glyphicon-eye-open"></span>查看
                        </a>
                        <a href="#" class="btn btn-danger" lay-submit lay-filter="image_delete">
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