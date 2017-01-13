@extends('common.layout')

@section('siteleft')
	<a href="#" lay-submit lay-filter="uploadPic" class="layui-btn"><i class="layui-icon">&#xe608;</i>上传图片</a>
	&nbsp;
	<a href="#" lay-submit lay-filter="newAlbum" class="layui-btn"><i class="layui-icon">&#xe634;</i>新建相册</a>

	<div class="row">
        @foreach($data as $key => $value)
             <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    <a href="{{ url('pic/readAlbum').'/'.$value['album_id'] }}" class="thumbnail">
                        <img src="{{ $value['imgpath'] }}">
                    </a>
                    <div class="caption">
                        <h3>{{ $value['album_name'] }}</h3>
                        <p>{{ $value['desc'] }}</p>
                    </div>
                </div>
             </div>
        @endforeach
	</div>

@endsection