@extends('common.layout')

@section('siteleft')
	<a href="#" lay-submit lay-filter="uploadPic" class="btn btn-primary"><span class="glyphicon glyphicon-cloud"></span>更新相册</a>
	&nbsp;
	<a href="#" lay-submit lay-filter="newAlbum" class="btn btn-primary"><span class="glyphicon glyphicon-cloud"></span>新建相册</a>

	<div class="row">
		@for($i=0;$i<count($files);$i++)
		<div class="col-xs-6 col-md-3">
			<a href="#" class="thumbnail">
				<img src="http://localhost/storage/app/{{$files[$i] }}" alt="">
			</a>
		</div>
		@endfor
	</div>

@endsection