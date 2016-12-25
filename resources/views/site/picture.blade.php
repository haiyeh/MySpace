@extends('common.layout')

@section('title', 'MySpace Site')
@section('siteleft')
	<a href="{{ url('uploadPic') }}" class="btn btn-primary"><i class="layui-icon">&#xe608;</i>上传</a>
	<div class="row">
	    <div class="col-xs-6 col-md-3">
		    <a href="#" class="thumbnail">
		        <img src="" alt="">
		    </a>
	    </div>
	</div>

@endsection