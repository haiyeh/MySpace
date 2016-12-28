<!DOCTYPE html>
<html>
<head>
    <title>{{ $album_name }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('layui/css/layui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/site.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/upload/css/fileinput.min.css') }}">
</head>
<body>
<div class="jumbotron">
    <div class="container">
        <h1>{{ $album_name }}</h1>
    </div>
</div>
<div class="container">
    <button class="btn btn-primary" onclick="history.back(-1)"><span class="glyphicon glyphicon-circle-arrow-left"></span>返回</button>
</div>
<div class="container">
    <div class="row">
        @foreach($data as $item)
        <div class="col-xs-6 col-md-3">
            <a href="#" class="thumbnail">
                <img src="{{ $item->imgpath }}" alt="">
            </a>
        </div>
        @endforeach
    </div>
</div>

<script type="text/javascript" src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('layui/layui.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/lay.js') }}"></script>
<script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('bootstrap/upload/js/fileinput.min.js') }}"></script>
<script src="{{ asset('bootstrap/upload/js/locales/zh.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/uploadify.js') }}"></script>
</body>
</html>