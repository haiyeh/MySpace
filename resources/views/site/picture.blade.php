@extends('common.layout')

@section('siteleft')
    @if(!empty(session('admin')))
	    <a href="#" lay-submit lay-filter="uploadPic" class="layui-btn"><i class="layui-icon">&#xe608;</i>上传图片</a>

	    <a href="#" lay-submit lay-filter="newAlbum" class="layui-btn"><i class="layui-icon">&#xe634;</i>新建相册</a>
    @endif
	<div class="row">
        @if(empty($data))
            <h1 style="margin:30px auto">暂无相册，请等待主人的更新哦！</h1>
        @else
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
        @endif
	</div>

@endsection