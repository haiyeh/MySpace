@extends('common.layout')

@section('siteleft')
	<a href="#" lay-submit lay-filter="uploadPic" class="btn btn-primary"><span class="glyphicon glyphicon-cloud"></span>更新相册</a>
	&nbsp;
	<a href="#" lay-submit lay-filter="newAlbum" class="btn btn-primary"><span class="glyphicon glyphicon-cloud"></span>新建相册</a>

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