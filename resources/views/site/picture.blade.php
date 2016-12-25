@extends('common.layout')

@section('siteleft')
	<a href="{{ url('uploadPic') }}" class="btn btn-primary"><span class="glyphicon glyphicon-cloud"></span>更新相册</a>
	&nbsp;
	<a href="{{ url('newAlbum') }}" class="btn btn-primary"><span class="glyphicon glyphicon-cloud"></span>新建相册</a>
	<!-- <div class="row">
	    <div class="col-xs-6 col-md-3">
		    <a href="#" class="thumbnail">
		        <img src="" alt="">
		    </a>
	    </div>
	</div> -->
	<div id="layer-photos-demo" class="layer-photos-demo">
	    <img layer-pid="图片id，可以不写" layer-src="http://oi2an7eqi.bkt.clouddn.com/01.jpg" src="http://oi2an7eqi.bkt.clouddn.com/01.jpg" alt="图片名">
	</div>

@endsection