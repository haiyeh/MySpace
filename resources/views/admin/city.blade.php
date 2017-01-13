@extends('common.admin')

@section('admin_right')
    <div class="admin_right_diary_list">
        <input type="hidden" id="delCity_url" value="{{ url('admin/cityDel') }}">
        <a lay-submit lay-filter="addCity" class="btn btn-warning"><span class="glyphicon glyphicon-plus-sign"></span>新增城市</a>
    </div>
    <div class="admin_right_diary_list">
        <table class="table table-bordered">
            <tr>
                <th>编号</th>
                <th>城市名</th>
                <th>编辑</th>
            </tr>
            @foreach($city as $item)
                <tr id="{{ $item->id }}">
                    <td>{{ $item->id }}</td>
                    <td>{!! $item->cityname !!}</td>
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
        {!! $city->render() !!}
    </div>
@endsection