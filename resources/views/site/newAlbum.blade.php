@extends('common.layout')

@section('siteleft')
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
      		<button class="btn btn-primary" lay-submit lay-filter="addAlbum">保存</button>
      		<button type="reset" class="btn btn-primary">重置</button>
          <a href="{{ url('picture') }}" class="btn btn-primary">返回</a>
    	</div>
  	</div>
	</form>
@endsection