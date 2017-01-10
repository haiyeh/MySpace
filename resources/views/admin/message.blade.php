@extends('common.admin')

@section('admin_right')
    <div class="admin_right_diary_list">
        <table class="table table-bordered">
            <tr>
                <th>编号</th>
                <th>留言</th>
                <th>时间</th>
                <th>编辑</th>
            </tr>
            <input type="hidden" id="url" value="{{ url('admin/messageDel') }}">
            @foreach($message as $item)
                <tr id="{{ $item->id }}">
                    <td>{{ $item->id }}</td>
                    <td>{!! $item->content !!}</td>
                    <td>{{ date("Y-m-d", $item->leave_at) }}</td>
                    <td>
                        <a href="#" class="btn btn-danger" lay-submit lay-filter="message_delete">
                            <span class="glyphicon glyphicon-remove-circle"></span>删除
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="container">
        {!! $message->render() !!}
    </div>
@endsection