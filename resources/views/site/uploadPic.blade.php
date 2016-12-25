@extends('common.layout')

@section('title', 'MySpace Site')
@section('siteleft')
	<div class="layui-form-item">
    <label class="layui-form-label">选择文件:</label>
    	<div class="layui-input-block">
      		<input type="file" name="file-demo" class="layui-upload-file">
    	</div>
  	</div>
@endsection