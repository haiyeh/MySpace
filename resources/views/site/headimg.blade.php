<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>更换头像</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('layui/css/layui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/site.css') }}">
</head>
<body>

    <form action="{{ url('head_reset') }}" method="post">
        {{ csrf_field() }}
        <div class="head">
            @foreach($head as $item)
                <input type="radio" name="head" value="{{ $item->id }}"><img src="{{ $item->headpath }}" style="width: 66px;height: 66px;">
            @endforeach
        </div>
        <div style="width: 20%;margin: 0px auto;">
            <input type="submit" name="submit" value="确认" class="layui-btn">
        </div>
    </form>

</body>
</html>