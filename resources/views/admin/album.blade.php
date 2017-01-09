@extends('common.admin')

@section('admin_right')
    <div class="admin_right_diary_list">
        <table class="table table-bordered">
            <tr>
                <th>编号</th>
                <th>名称</th>
                <th>状态</th>
                <th>类型</th>
                <th>描述</th>
                <th>编辑</th>
            </tr>
            @foreach($album as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->album_name }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->type }}</td>
                    <td>{{ $item->desc }}</td>
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
        {!! $album->render() !!}
    </div>
@endsection