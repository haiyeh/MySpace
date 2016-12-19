<!DOCTYPE html>
<html>
	<head>
		<title>@yield('title')</title>
		<link rel="stylesheet" type="text/css" href="{{ asset('layui/css/layui.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/site.css') }}">
	</head>
	<body>
		
			@yield('daohang')
		
		<div class="siteleft">
			@yield('siteleft')
		</div>

	@section('right')
		<div class="siteright">
			<div class="header">
				<img src="" alt="" />
			</div>
			<blockquote class="layui-elem-quote layui-quote-nm">引用区域的文字</blockquote>
			<blockquote class="layui-elem-quote">引用区域的文字</blockquote>
			<blockquote class="layui-elem-quote layui-quote-nm">引用区域的文字</blockquote>
			<blockquote class="layui-elem-quote">引用区域的文字</blockquote>
		</div>
	@show
		@section('footer')
			<div class="footer">
				<h4>本站使用技术:</h4>
				<a href=""><i class="layui-icon">&#xe609;</i>php</a> |
				<a href=""><i class="layui-icon">&#xe609;</i>layui</a> |
				<a href=""><i class="layui-icon">&#xe609;</i>laravel</a> |
				<a href=""><i class="layui-icon">&#xe609;</i>jquery</a>
				<a href=""><i class="layui-icon">&#xe604;</i>返回顶部</a>
			</div>
		@show
		<script type="text/javascript" src="{{ asset('layui/layui.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/lay.js') }}"></script>
	</body>
</html>