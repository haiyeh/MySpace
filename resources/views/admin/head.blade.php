@extends('common.admin')

@section('admin_right')
    <div class="admin_right_diary_list">
        <a lay-submit lay-filter="addHead" class="btn btn-warning"><span class="glyphicon glyphicon-link"></span>添加头像</a>
    </div>
    <div class="admin_right_diary_list">
        <table class="table table-bordered">
            <tr>
                <th>编号</th>
                <th>图片</th>
                <th>编辑</th>
            </tr>
            <input type="hidden" id="url" value="{{ url('admin/headDel') }}">
            @foreach($head as $item)
                <tr id="{{ $item->id }}">
                    <td>{{ $item->id }}</td>
                    <td><img src="http://localhost/{{ $item->headpath }}" style="width: 100px;height:100px;"></td>
                    <td>
                        <a href="#" class="btn btn-danger" lay-submit lay-filter="head_delete">
                            <span class="glyphicon glyphicon-remove-circle"></span>删除
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="container">
        {!! $head->render() !!}
    </div>
@endsection