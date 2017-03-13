<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>个人信息</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('layui/css/layui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/site.css') }}">
</head>
<body>
<div style="width: 30%;margin: 0px auto;">
    <a href="#" lay-submit lay-filter="head"><img src="http://localhost/{{ $headpath->headpath }}" class="img-circle"></a>
</div>
<table class="layui-table" lay-even lay-skin="nob">
    <colgroup>
        <col width="150">
        <col width="200">
        <col>
    </colgroup>
    <thead>
    <tr>
        <th>姓名：</th>
        <td>{{ $userMsg->username }}</td>
    </tr>
    </thead>
    <thead>
    <tr>
        <th>性别：</th>
        @if($userMsg->sex == 1)
            <td>男</td>
        @else
            <td>女</td>
        @endif
    </tr>
    </thead>
    <thead>
    <tr>
        <th></th>
        @if($userMsg->livestatus == 1)
            <td>单身</td>
        @else
            <td>不单身</td>
        @endif
    </tr>
    </thead>
    <thead>
    <tr>
        <th>联系方式：</th>
        <td>{{ $userMsg->phonenumber }}</td>
    </tr>
    </thead>
    <thead>
    <tr>
        <th>住址：</th>
        <td>{{ $cityname->cityname }}-{{ substr($userMsg->address, 2) }}</td>
    </tr>
    </thead>
    <thead>
    <tr>
        <th>爱好：</th>
        <td>{{ $userMsg->hobby }}</td>
    </tr>
    </thead>
    <thead>
    <tr>
        <th>自我描述：</th>
        <td>{{ $userMsg->desc }}</td>
    </tr>
    </thead>
</table>
<a href="#" class="layui-btn" style="width:48%;" onclick="window.open('http://localhost/userMsg')">修改个人信息</a>
<a href="{{ url('userInfo') }}" class="layui-btn layui-btn-warm" style="width:49.5%;">刷新</a>
<script type="text/javascript" src="{{ asset('layui/layui.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/lay.js') }}"></script>
<script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>