@extends('common.admin')

@section('admin_right')
    <div class="admin_right_diary_list">
        <input type="hidden" id="addSource_url" value="{{ url('admin/addSource') }}">
        <a lay-submit lay-filter="addSource" class="btn btn-warning"><span class="glyphicon glyphicon-link"></span>添加资源链</a>
    </div>
    <div class="admin_right_diary_list">
        <table class="table table-bordered">
            <tr>
                <th>编号</th>
                <th>资源名称</th>
                <th>资源链接</th>
                <th>编辑</th>
            </tr>
            <input type="hidden" id="url" value="{{ url('admin/sourceDelete') }}">
            @foreach($sources as $item)
                <tr id="{{ $item->id }}">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->source_name }}</td>
                    <td>{{ $item->source_link }}</td>
                    <td>
                        <a href="{{ url('admin/getSourceEdit') }}/{{ $item->id }}" class="btn btn-default">
                            <span class="glyphicon glyphicon-edit"></span>编辑
                        </a>
                        <a href="#" class="btn btn-danger" lay-submit lay-filter="source_delete">
                            <span class="glyphicon glyphicon-remove-circle"></span>删除
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="container">
        {!! $sources->render() !!}
    </div>
@endsection