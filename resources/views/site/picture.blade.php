@extends('common.layout')

@section('title', 'MySpace Site')
@section('daohang')
	<ul class="layui-nav" lay-filter="|">
	    <li class="layui-nav-item"><a href="{{ url('/') }}"><i class="layui-icon">&#xe60c;</i> 首页</a></li>
	    <li class="layui-nav-item"><a href="{{ url('diary') }}"><i class="layui-icon">&#xe63c;</i> 日志</a></li>
	    <li class="layui-nav-item"><a href="{{ url('say') }}"><i class="layui-icon">&#xe63a;</i> 说说</a></li>
	    <li class="layui-nav-item layui-this"><a href="{{ url('picture') }}"><i class="layui-icon">&#xe634;</i> 相册</a></li>
	    <li class="layui-nav-item"><a href="#"><i class="layui-icon">&#xe613;</i> 博客</a></li>
	    <li class="layui-nav-item"><a href="{{ url('setting') }}"><i class="layui-icon">&#xe614;</i> 设置</a></li>
	</ul>
@endsection
@section('siteleft')
	<fieldset class="layui-elem-field">
  	<legend>This is title</legend>
  		<div class="layui-field-box">
    		内容区域
  		</div>
	</fieldset>
@endsection