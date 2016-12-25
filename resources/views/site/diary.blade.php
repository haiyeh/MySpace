@extends('common.layout')

@section('title', 'MySpace Site')
@section('siteleft')
	<a href="{{ url('createDiary') }}" class="btn btn-primary" id="write"><i class="layui-icon">&#xe608;</i>写日志</a>
	<button class="btn btn-primary" type="button">
  		已发布日志数: <span class="badge">{{ $count }}</span>
	</button>
	@foreach($diarys as $item)
		<br />
		<p class="lead"><a href="{{ url('read') }}/{{ $item->id }}">{!! $item->title !!}</a><small>发布于{{ date('Y-m-d H:i:s', $item->published_at) }}</small></p>
		<blockquote class="layui-elem-quote layui-quote-nm"><p>{{ strip_tags(mb_substr($item->content, 0, 200)) }}......</p></blockquote>
	@endforeach
	{!! $diarys->render() !!}
@endsection