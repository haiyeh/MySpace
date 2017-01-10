@extends('common.admin')

@section('admin_right')
    <div class="admin_right_diary_list">
        <table class="table table-bordered">
            <tr>
                <th>编号</th>
                <th>说说</th>
                <th>发表时间</th>
                <th>编辑</th>
            </tr>
            <input type="hidden" id="url" value="{{ url('admin/sayDelete') }}">
            @foreach($say as $item)
                <tr id="{{ $item->id }}">
                    <td>{{ $item->id }}</td>
                    <td>{!! $item->content !!}</td>
                    <td>{{ date("Y-m-d", $item->published_at) }}</td>
                    <td>
                        <a href="{{ url('admin/getSayEdit') }}/{{ $item->id }}" class="btn btn-default">
                            <span class="glyphicon glyphicon-edit"></span>编辑
                        </a>
                        <a href="#" class="btn btn-danger" lay-submit lay-filter="say_delete">
                            <span class="glyphicon glyphicon-remove-circle"></span>删除
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="container">
        {!! $say->render() !!}
    </div>
@endsection