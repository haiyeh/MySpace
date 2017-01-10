@extends('common.admin')

@section('admin_right')
    <div class="admin_right_diary_list">
        <table class="table table-bordered">
            <tr>
                <th>编号</th>
                <th>标题</th>
                <th>发表时间</th>
                <th>编辑</th>
            </tr>
            <input type="hidden" id="diary_delete" value="{{ url('admin/getDiaryDelete') }}">
            @foreach($diary as $item)
                <tr id="{{ $item->id }}">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ date("Y-m-d", $item->published_at) }}</td>
                    <td>
                        <a href="{{ url('admin/getDiaryMsg') }}/{{ $item->id }}" class="btn btn-primary">
                            <span class="glyphicon glyphicon-eye-open"></span>查看
                        </a>
                        <a href="{{ url('admin/getDiaryEdit') }}/{{ $item->id }}" class="btn btn-default">
                            <span class="glyphicon glyphicon-edit"></span>编辑
                        </a>
                        <a href="#" class="btn btn-danger" lay-submit lay-filter="diary_delete">
                            <span class="glyphicon glyphicon-remove-circle"></span>删除
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="container">
        {!! $diary->render() !!}
    </div>
@endsection