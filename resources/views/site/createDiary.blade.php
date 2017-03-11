@extends('common.layout')

@section('siteleft')
@include('auth.errors')
	<form class="layui-form layui-form-pane">
    {!! csrf_field() !!}
    <input type="hidden" name="hidden" value="{{ url('diary/store') }}">
  	<div class="layui-form-item">
    <label class="layui-form-label">标题:</label>
    	<div class="layui-input-block">
			@if(!isset($diary))
      			<input type="text" name="title" required  lay-verify="title" placeholder="请输入标题" autocomplete="off" class="layui-input">
    		@else
				<input type="text" name="title" value="{{ $diary->title }}" required  lay-verify="title" autocomplete="off" class="layui-input">
			@endif
		</div>
  	</div>
  	<div class="layui-form-item layui-form-text">
    <label class="layui-form-label">日志内容:</label>
    	<div class="layui-input-block">
			@if(!isset($diary))
      			<textarea name="content" id="diary" lay-verify="diary" placeholder="请输入内容" class="layui-textarea"></textarea>
			@else
				<textarea name="content" id="diary" class="layui-textarea">{{ $diary->content }}</textarea>
			@endif
    	</div>
  	</div>
  	<div class="layui-form-item">
    <label class="layui-form-label">日期:</label>
    	<div class="layui-input-block">
			@if(!isset($diary))
				<input type="date" name="published_at" placeholder="发表日期" autocomplete="off" class="layui-input">
			@else
				<input type="date" name="published_at" value="{{ date("Y-m-d", $diary->published_at) }}" autocomplete="off" class="layui-input">
			@endif
    	</div>
  	</div>
  	<div class="layui-form-item">
    	<div class="layui-input-block">
      		<button class="btn btn-primary" lay-submit lay-filter="addDiary">保存</button>
      		<button type="reset" class="btn btn-primary">重置</button>
          <a href="#" onclick="history.back(-1)" class="btn btn-primary">返回</a>
    	</div>
  	</div>
	</form>
@endsection