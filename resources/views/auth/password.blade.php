<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>密码修改</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('layui/css/layui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/site.css') }}">
    <script type="text/javascript" src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
</head>
<body>
<div class="pwd">
    <form class="layui-form" action="">
        <input type="hidden" id="_token" value="{{ csrf_token() }}">
        <div class="layui-form-item">
            <label class="layui-form-label">原密码</label>
            <div class="layui-input-block">
                <input type="password" name="password_old" required  lay-verify="password" id="password_old" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">新密码</label>
            <div class="layui-input-block">
                <input type="password" name="password_new" required lay-verify="password" id="password_new" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux" id="error"></div>
        </div>
        <div style="width: 15%;margin: 0px auto;">
            <button class="layui-btn layui-btn-warm" lay-submit lay-filter="pwd_reset">确认修改</button>
        </div>
    </form>
</div>
<script type="text/javascript" src="{{ asset('layui/layui.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/lay.js') }}"></script>
<script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>