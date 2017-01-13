<!DOCTYPE html>
<html>
<head>
	<title>{{ $title }}</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('layui/css/layui.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/site.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/upload/css/fileinput.min.css') }}">
</head>
<body>
<div class="jumbotron">
	<div class="container">
		<h1>NEW ALBUM</h1>
	</div>
</div>
<div class="container">
@include('auth.errors')
	<form class="layui-form layui-form-pane">
    {!! csrf_field() !!}
    <input type="hidden" name="hidden" value="{{ url('pic/storeAlbum') }}">
    <div class="layui-form-item">
    <label class="layui-form-label">名称:</label>
    	<div class="layui-input-block">
      		<input type="text" name="name" required  lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
    	</div>
  	</div>
  	<div class="layui-form-item">
    <label class="layui-form-label">类型:</label>
    	<div class="layui-input-block">
      		<input type="text" name="type" required  lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
    	</div>
  	</div>
  	<div class="layui-form-item layui-form-text">
    <label class="layui-form-label">描述:</label>
    	<div class="layui-input-block">
      		<textarea name="desc" id="desc" placeholder="请输入内容" class="layui-textarea">{{ old('desc') }}</textarea>
    	</div>
  	</div>
  	<div class="layui-form-item">
    <label class="layui-form-label">公开：</label>
    	<div class="layui-input-block">
	        <input type="checkbox" name="status" title="公开" value="1">
    	</div>
  	</div>
  	<div class="layui-form-item">
    	<div class="layui-input-block">
      		<button class="layui-btn" lay-submit lay-filter="addAlbum">保存</button>
      		<button type="reset" class="layui-btn">重置</button>
    	</div>
  	</div>
	</form>
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