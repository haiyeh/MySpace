<!DOCTYPE html>
<html>
	<head>
		<title>{{ $title }}</title>
		<link rel="stylesheet" type="text/css" href="{{ asset('layui/css/layui.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/site.css') }}">
		<script type="text/javascript" src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>

	</head>
	<body>
		@section('daohang')
		{{--导航栏--}}
		<div style="height:300px;border-radius: 0px;background:url('Upload/2016-12-29/daohang.jpg');background-size: auto;">

		</div>
  		<nav class="navbar navbar-default" role="navigation">
		  	<div class="container">
		    	<div class="navbar-header">
		      	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
		      	</button>
		      	<a class="navbar-brand" href="{{ url('/') }}">77-hai</a>
		    	</div>
		    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      	<ul class="nav navbar-nav">
					<li><a href="{{ url('diary') }}">日志</a></li>
					<li><a href="{{ url('say') }}">说说</a></li>
					<li><a href="{{ url('message') }}">留言板</a></li>
					<li class="dropdown">
		          		<a href="" class="dropdown-toggle" data-toggle="dropdown">相册 <span class="caret"></span></a>
		          		<ul class="dropdown-menu" role="menu">
							<li><a href="{{ url('picture') }}">查看图片</a></li>
							<li class="divider"></li>
							<li><a href="#" lay-submit lay-filter="newAlbum">新建相册</a></li>
							<li class="divider"></li>
					  		<li><a href="#" lay-submit lay-filter="uploadPic">上传照片</a></li>
		          		</ul>
		        	</li>
		      	</ul>
		      	<ul class="nav navbar-nav navbar-right">
					<li><a href="#">CSDN博客</a></li>
					<li class="dropdown">
						  @if(!empty(session('username')))
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							{{ session('username') }}
							<span class="caret"></span>
						  @else
							  <li><a href="{{ url('auth/login') }}">登录</a></li>
						  @endif
					  </a>
					  <ul class="dropdown-menu" role="menu">
						<li><a href="{{ url('userMsg') }}">个人信息</a></li>
						<li class="divider"></li>
						<li><a href="#">更换头像</a></li>
						<li class="divider"></li>
						<li><a href="{{ url('admin') }}">内容管理</a></li>
						<li class="divider"></li>
						<li><a href="{{ url('auth/logout') }}">退出登录</a></li>
					  </ul>
		        	</li>
		      	</ul>
		    	</div>
		  	</div>
		</nav>
		@show

		<div class="container">
			@yield('siteleft')
		</div>

		@section('footer')
			<div class="footer">
				<a href="http://www.php.cn">php</a>
				<a href="http://www.golaravel.com">Laravel</a>
				<a href="http://www.bootcss.com/">Bootstrap</a>
				<a href="http://glyphicons.com">Glyphicons</a>
				<a href="http://www.layui.com/">Layui</a>
				<a href="http://www.github.com">Git</a>
			</div>
		@show
		<script type="text/javascript" src="{{ asset('layui/layui.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/lay.js') }}"></script>
		<script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
	</body>
</html>