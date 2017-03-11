<!DOCTYPE html>
<html>
<head>
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('layui/css/layui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/site.css') }}">
</head>
<body>
<div class="login" id="register">
    <i class="layui-icon" style="font-size: 30px; color: #009688;">&#xe62e;</i>注册
    <form class="layui-form layui-form-pane">
        <input type="hidden" id="reg_token" value="{{ csrf_token() }}">
        <div class="layui-form-item">
            <label class="layui-form-label">账号</label>
            <div class="layui-input-block">
                <input type="text" name="name" id="regName" lay-verify="username" placeholder="请输入" autocomplete="off" class="layui-input" value="{{ old('name') }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">密码</label>
            <div class="layui-input-block">
                <input type="password" id="regPwd" name="password" lay-verify="password" placeholder="请输入" autocomplete="off" class="layui-input" value="{{ old('password') }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">邮箱</label>
            <div class="layui-input-block">
                <input type="text" id="regEmail" name="email" lay-verify="email" placeholder="请输入" autocomplete="off" class="layui-input" value="{{ old('email') }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">确认密码</label>
            <div class="layui-input-block">
                <input type="password" id="regPwdC" name="password_confirmation" lay-verify="password" class="layui-input" placeholder="请输入" title="密码">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="register">注册</button>
                <a href="{{ url('/') }}" class="layui-btn layui-btn-small">返回首页</a>
                <a href="{{ url('auth/login') }}" class="layui-btn layui-btn-small">返回登录页</a>
            </div>
        </div>
    </form>
</div>
@include('auth.errors')
<script type="text/javascript" src="{{ asset('layui/layui.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/lay.js') }}"></script>
</body>
</html>