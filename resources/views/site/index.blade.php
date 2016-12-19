@extends('common.layout')

@section('title', 'MySpace Site')
@section('daohang')
	<ul class="layui-nav" lay-filter="|">
	    <li class="layui-nav-item layui-this"><a href="{{ url('/') }}"><i class="layui-icon">&#xe60c;</i> 首页</a></li>
	    <li class="layui-nav-item"><a href="{{ url('diary') }}"><i class="layui-icon">&#xe63c;</i> 日志</a></li>
	    <li class="layui-nav-item"><a href="{{ url('say') }}"><i class="layui-icon">&#xe63a;</i> 说说</a></li>
	    <li class="layui-nav-item"><a href="{{ url('picture') }}"><i class="layui-icon">&#xe634;</i> 相册</a></li>
	    <li class="layui-nav-item"><a href="#"><i class="layui-icon">&#xe613;</i> 博客</a></li>
	    <li class="layui-nav-item"><a href="{{ url('setting') }}"><i class="layui-icon">&#xe614;</i> 设置</a></li>
	</ul>
@endsection
@section('siteleft')
	<div class="siteindexleft">
		<h3>日志</h3>
		<div class="diary">
			<fieldset class="layui-elem-field">
  				<legend>This is title</legend>
  				<div class="layui-field-box">
    				内容区域
  				</div>
			</fieldset>
		</div>
	</div>
	<div class="siteindexright">
		<h3>说说</h3>
		<div class="say">
			<blockquote class="layui-elem-quote">引用区域的文字</blockquote>
		</div>
	</div>
@endsection