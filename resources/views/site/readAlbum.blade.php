<!DOCTYPE html>
<html>
<head>
    <title>{{ $album_name }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('layui/css/layui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/site.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/upload/css/fileinput.min.css') }}">
    <script type="text/javascript" src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
</head>
<body>
<div class="jumbotron">
    <div class="container">
        <h1>{{ $album_name }}</h1>
    </div>
</div>
<div class="container">
    <a class="btn btn-primary" href="{{ url('picture') }}"><span class="glyphicon glyphicon-circle-arrow-left"></span>返回</a>
</div>
<div class="container">
    <div class="row">
        @foreach($data as $item)
        <div class="col-xs-6 col-md-3">
            <a href="#" class="thumbnail"><img src="{{ $item->imgpath }}" alt=""></a>
        </div>
        @endforeach
    </div>
</div>
<div class="container">
    {!! $data->render() !!}
</div>

<script type="text/javascript" src="{{ asset('layui/layui.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/lay.js') }}"></script>
<script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('bootstrap/upload/js/fileinput.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('bootstrap/upload/js/locales/zh.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/uploadify.js') }}"></script>
<script type="text/javascript">
    layui.use('layer', function () {
        var layer = layui.layer;
        layer.photos({
            photos: '#{{ $item->imgpath }}'
            ,anim: 5 //0-6的选择，指定弹出图片动画类型，默认随机（请注意，3.0之前的版本用shift参数）
        });
    })
</script>
</body>
</html>