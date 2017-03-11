<!DOCTYPE html>
<html>
	<head>
		<meta name="_token" content="{{ csrf_token() }}"/>
		<title>登陆</title>
		<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('layui/css/layui.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/site.css') }}">
	</head>
	<body>
	<div class="container">
		@include('auth.errors')
	</div>
		<div class="login" id="login">
			<i class="layui-icon" style="font-size: 30px; color: #009688;">&#xe62e;</i>登录
			<form class="layui-form layui-form-pane" action="{{ url('auth/login') }}" method="post">
				{!! csrf_field() !!}
				<div class="layui-form-item">
	    		<label class="layui-form-label">账号</label>
		    		<div class="layui-input-block">
		      			<input type="text" name="name" lay-verify="username" placeholder="请输入" autocomplete="off" class="layui-input" value="{{ old('name') }}">
		    		</div>
	 			</div>
	 			<div class="layui-form-item">
	 			<label class="layui-form-label">密码</label>
		    		<div class="layui-input-block">
		      			<input type="password" name="password" lay-verify="password" placeholder="请输入" autocomplete="off" class="layui-input" value="{{ old('password') }}">
		    		</div>
	 			</div>
	 			<div class="layui-form-item">
	 			<label class="layui-form-label">邮箱</label>
		    		<div class="layui-input-block">
		      			<input type="text" name="email" lay-verify="email" placeholder="请输入" autocomplete="off" class="layui-input" value="{{ old('email') }}">
		    		</div>
	 			</div>
	 			<div class="layui-form-item">
	 				<label class="layui-form-label">记住密码</label>
				    <div class="layui-input-block">
					    <input type="checkbox" name="remember" title="记住密码" lay-skin="switch">
				    </div>
				</div>
	 			<div class="layui-form-item">
    				<div class="layui-input-block">
			      		<button class="layui-btn" lay-submit lay-filter="login">登录</button>
			            <a href="{{ url('/') }}" class="layui-btn layui-btn-small">返回首页</a>
						<a href="{{ url('register') }}" class="layui-btn layui-btn-small">申请账号</a>
						<a href="{{ url('password/email') }}" class="layui-btn layui-btn-danger">找回密码</a>
			    	</div>
			  	</div>
 			</form>
		</div>
		<script type="text/javascript" src="{{ asset('layui/layui.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/lay.js') }}"></script>
	</body>
</html>