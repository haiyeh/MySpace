@extends('common.admin')


@section('admin_right')
    <div class="password">
        <input type="hidden" id="pwd_url" value="{{ url('admin/pwdReset') }}">
        <form class="layui-form layui-form-pane">
            <input type="hidden" id="_token" value="{{ csrf_token() }}">
            <div class="layui-form-item">
                <label class="layui-form-label">账号</label>
                <div class="layui-input-block">
                    <input type="text" id="admin"  class="layui-input" value="{{ session('admin') }}">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">新密码</label>
                <div class="layui-input-block">
                    <input type="text" id="adminPwd"  class="layui-input">
                </div>
            </div>
            <button class="layui-btn" lay-submit lay-filter="password">修改</button>
            <button type="reset" class="layui-btn">重置</button>
        </form>
    </div>
@endsection