@extends('common.admin')

@section('admin_right')
    <div class="admin_right_diary_list">
        <table class="table table-bordered">
            <tr>
                <th>编号</th>
                <th>名称</th>
                <th>状态</th>
                <th>编辑</th>
            </tr>
            <input type="hidden" id="album_look" value="{{ url('admin/getAlbumMsg') }}">
            <input type="hidden" id="album_edit" value="{{ url('admin/getAlbumEdit') }}">
            <input type="hidden" id="album_delete" value="{{ url('admin/getAlbumDelete') }}">
            @foreach($album as $item)
                <tr id="{{ $item->id }}">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->album_name }}</td>
                    <td>
                        @if($item->status == 1)
                            公开
                        @else
                            私密
                        @endif
                    </td>
                    <td>
                        <a href="#" class="btn btn-primary" lay-submit lay-filter="album_look">
                            <span class="glyphicon glyphicon-eye-open"></span>查看
                        </a>
                        <a href="#" class="btn btn-default" lay-submit lay-filter="album_edit">
                            <span class="glyphicon glyphicon-edit"></span>编辑
                        </a>
                        <a href="#" class="btn btn-danger" lay-submit lay-filter="album_delete">
                            <span class="glyphicon glyphicon-remove-circle"></span>删除
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="container">
        {!! $album->render() !!}
    </div>
@endsection