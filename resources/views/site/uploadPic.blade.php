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
			<h1>Upload Picture</h1>
		</div>
	</div>

	<div class="container">
		<form class="form-horizontal required-validate" action="{{ url('pic/uploadify') }}" enctype="multipart/form-data" method="post">
		{!! csrf_field() !!}
            <label for="" class="col-md-1 control-label">上传到：</label>
            <select multiple class="form-control" name="album_id">
                @foreach($albums as $item)
                    <option value="{{ $item->id }}">{{ $item->album_name }}</option>
                @endforeach
            </select>

            <a href="#" lay-submit lay-filter="newAlbum" class="btn btn-primary"><span class="glyphicon glyphicon-cloud"></span>新建相册</a>
			<div class="form-group">
				<label for="" class="col-md-1 control-label">图片上传</label>
				<div class="col-md-10 tl th">
					<input id="input-id" type="file" name="file[]" class="file" multiple data-preview-file-type="text" >
					<p class="help-block">支持jpg、jpeg、png格式，大小不超过2.0M</p>
				</div>
			</div>
			<div class="form-group text-center ">
				<div class="col-md-10 col-md-offset-1">
					<button type="submit" class="btn btn-primary btn-lg">保存</button>
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
