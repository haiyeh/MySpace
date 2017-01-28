@extends('common.admin')

@section('admin_right')
    <div class="admin_right_diary_list">
        <input type="hidden" id="delCity_url" value="{{ url('admin/userDel') }}">
    </div>
    <div class="admin_right_diary_list">
        <table class="table table-bordered">
            <tr>
                <th>编号</th>
                <th>用户名</th>
                <th>编辑</th>
            </tr>
            @foreach($user as $item)
                <tr id="{{ $item->id }}">
                    <td>{{ $item->id }}</td>
                    <td>{!! $item->name !!}</td>
                    <td>
                        <a href="#" class="btn btn-danger" lay-submit lay-filter="city_delete">
                            <span class="glyphicon glyphicon-remove-circle"></span>删除
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="container">
        {!! $user->render() !!}
    </div>
@endsection