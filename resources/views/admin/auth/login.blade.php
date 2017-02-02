<!DOCTYPE html>
<html>
<head>
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('layui/css/layui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/site.css') }}">
</head>
<body>
<div class="container">
    @include('auth.errors')
</div>
<div class="login" id="login">
    <i class="layui-icon" style="font-size: 80px; color: #009688;">&#xe612;</i>管理员登录
    <form class="layui-form layui-form-pane" action="{{ url('admin/getLogin') }}" method="post">
        {!! csrf_field() !!}
        <div class="layui-form-item">
            <label class="layui-form-label">账号</label>
            <div class="layui-input-block">
                <input type="text" name="admin_name" lay-verify="username" placeholder="请输入" autocomplete="off" class="layui-input" value="{{ old('admin_name') }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">密码</label>
            <div class="layui-input-block">
                <input type="password" name="admin_pwd" lay-verify="password" placeholder="请输入" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="admin_login">登录</button>
                <a href="{{ url('/') }}" class="layui-btn layui-btn-small">返回首页</a>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript" src="{{ asset('layui/layui.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/lay.js') }}"></script>
</body>
</html>