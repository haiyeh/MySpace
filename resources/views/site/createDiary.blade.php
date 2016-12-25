@extends('common.layout')

@section('siteleft')
@include('auth.errors')
	<form class="layui-form layui-form-pane">
    {!! csrf_field() !!}
    <input type="hidden" name="hidden" value="{{ url('diary/store') }}">
  	<div class="layui-form-item">
    <label class="layui-form-label">标题:</label>
    	<div class="layui-input-block">
      		<input type="text" name="title" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
    	</div>
  	</div>
  	<div class="layui-form-item layui-form-text">
    <label class="layui-form-label">日志内容:</label>
    	<div class="layui-input-block">
      		<textarea name="content" id="diary" placeholder="请输入内容" class="layui-textarea"></textarea>
    	</div>
  	</div>
  	<div class="layui-form-item">
    <label class="layui-form-label">日期:</label>
    	<div class="layui-input-block">
      		<input type="date" name="published_at" placeholder="发表日期" autocomplete="off" class="layui-input">
    	</div>
  	</div>
  	<div class="layui-form-item">
    	<div class="layui-input-block">
      		<button class="btn btn-primary" lay-submit lay-filter="addDiary">立即提交</button>
      		<button type="reset" class="btn btn-primary">重置</button>
          <a href="{{ url('diary') }}" class="btn btn-primary">返回</a>
    	</div>
  	</div>
	</form>
@endsection