@extends('common.layout')

@section('title', 'MySpace Site')

@section('siteleft')
	@if(!empty(session('admin')))
		<a href="{{ url('createSay') }}" class="layui-btn"><i class="layui-icon">&#xe608;</i>发表说说</a>
	@endif
	<button class="layui-btn" type="button">
  		已发布说说数: <span class="badge">{{ $count }}</span>
	</button>	
	<hr>
	@if(empty($says))
		<h1 style="margin: 30px auto">暂无说说</h1>
	@else
		@foreach($says as $item)
	  		<p class="lead">{!! $item->content !!}</p>
	  		<p>{{ date('Y-m-d H:i:s', $item->published_at) }}</p>
	  		<hr>
		@endforeach
		<div class="page">{!! $says->render() !!}</div>
	@endif
@endsection