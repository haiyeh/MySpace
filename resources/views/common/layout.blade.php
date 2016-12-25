<!DOCTYPE html>
<html>
	<head>
		<title>@yield('title')</title>
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
		<!-- <ul class="layui-nav" lay-filter="|">
	      	<li class="layui-nav-item layui-this"><a href="{{ url('/') }}"><i class="layui-icon">&#xe60c;</i> 首页</a></li>
	      	<li class="layui-nav-item"><a href="{{ url('diary') }}"><i class="layui-icon">&#xe63c;</i> 日志</a></li>
	     	<li class="layui-nav-item"><a href="{{ url('say') }}"><i class="layui-icon">&#xe63a;</i> 说说</a></li>
	     	<li class="layui-nav-item"><a href="{{ url('picture') }}"><i class="layui-icon">&#xe634;</i> 相册</a></li>
	      	<li class="layui-nav-item"><a href="#"><i class="layui-icon">&#xe613;</i> 博客</a></li>
	      	<li class="layui-nav-item"><a href="{{ url('setting') }}"><i class="layui-icon">&#xe614;</i> 设置</a></li>
	      	<li class="layui-nav-item">   
	        <a href="javascript:;">admin</a>
	      	<dl class="layui-nav-child">  二级菜单 
	            <dd><a href="">查看信息</a></dd>
	            <dd><a href="">更换头像</a></dd>
	            <dd><a href="{{ url('auth/logout') }}">退出登录</a></dd>
	      	</dl>
	      	</li>
	      	<li class="layui-nav-item">
	        	<div class="header">
	                <img src="http://oi2an7eqi.bkt.clouddn.com/01.jpg" alt="" class="img-thumbnail">
	            </div>
	        </li>
  		</ul> -->
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
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown">相册 <span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="{{ url('picture') }}"">查看相册</a></li>
		            <li class="divider"></li>
		            <li><a href="#">上传照片</a></li>
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
		            <li><a href="{{ url('setting') }}"">页面设置</a></li>
		            <li><a href="#">更换头像</a></li>
		            <li><a href="#"></a></li>
		            <li class="divider"></li>
		            <li><a href="{{ url('auth/logout') }}"">退出登录</a></li>
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