@extends('common.layout')

@section('title', 'MySpace Site')

@section('siteleft')
	<a href="{{ url('createSay') }}" class="layui-btn"><i class="layui-icon">&#xe608;</i>发表说说</a>
	<button class="layui-btn" type="button">
  		已发布说说数: <span class="badge">{{ $count }}</span>
	</button>	
	<hr>
		@foreach($says as $item)
	  		<p class="lead">{!! $item->content !!}</p>
	  		<p>{{ date('Y-m-d H:i:s', $item->published_at) }}</p>
	  		<hr>
		@endforeach
		<div class="page">{!! $says->render() !!}</div>
@endsection