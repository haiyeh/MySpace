<!DOCTYPE html>
<html>
	<head>
		<title>{{ $title }}</title>
		<link rel="stylesheet" type="text/css" href="{{ asset('layui/css/layui.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/site.css') }}">
	</head>
	<body>
		@section('top')
			<div class="jumbotron">
			  <div class="container">
			    <h1>Welcome</h1>
			  </div>
			</div>
		@show
		@section('daohang')

  		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		  <div class="container">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="{{ url('/') }}">77-hai</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li><a href="{{ url('diary') }}">日志</a></li>
		        <li><a href="{{ url('say') }}">说说</a></li>
		        <li class="dropdown">
		          <a href="" class="dropdown-toggle" data-toggle="dropdown">相册 <span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
					<li><a href="{{ url('picture') }}">查看图片</a></li>
					<li class="divider"></li>
		            <li><a href="{{ url('newAlbum') }}">新建相册</a></li>
		            <li class="divider"></li>
		            <li><a href="{{ url('uploadPic') }}">上传照片</a></li>
		          </ul>
		        </li>
		      </ul>
		      <form class="navbar-form navbar-left" role="search">
		        <div class="form-group">
		          <input type="text" class="form-control" placeholder="Search">
		        </div>
		        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
		      </form>
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="#">CSDN博客</a></li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown">admin <span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="{{ url('setting') }}">页面设置</a></li>
		            <li><a href="#">更换头像</a></li>
		            <li><a href="#"></a></li>
		            <li class="divider"></li>
		            <li><a href="{{ url('auth/logout') }}">退出登录</a></li>
		          </ul>
		        </li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
		@show
		<div class="container">
			@yield('siteleft')
		</div>

		@section('footer')
			<div class="footer">
				<h4>在此感谢:</h4>
				<a href="www.php.net">p<span class="glyphicon glyphicon-header"></span>p</a> |
				<a href="http://www.layui.com/"><i class="layui-icon">&#xe609;</i>layui</a> |
				<a href="http://www.bootcss.com/"><i class="layui-icon">&#xe62b;</i>ootstrap</a> |
				<a href="http://laravelacademy.org"><i class="layui-icon">&#xe644;</i>laravel学院</a> |
				<a href="http://github.com"><i class="layui-icon">&#xe613;</i>git</a> |
				<a href="http://glyphicons.com/">Glyphicons</a>
			</div>
		@show
		<script type="text/javascript" src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('layui/layui.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/lay.js') }}"></script>
		<script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
		<script type="text/javascript">
		    $("li").click(function() {
		    	$("li").removeClass('active');
  				$(this).addClass('active');
			});
		</script>
	</body>
</html>