@extends('common.layout')

@section('siteleft')
	<div class="page-header">
		<h2>{!! $diary->title !!}<small>发布于{{ date('Y-m-d H:i:s', $diary->published_at) }}</small></h2>
		<button class="btn btn-primary" lay-submit lay-filter="zan">
			<span class="glyphicon glyphicon-thumbs-up"></span>
			<span class="badge" id="show">
				@if(is_object($praiseCount) && !empty($praiseCount))
					{{ $praiseCount->count }}
				@else
					{{ $praiseCount }}
				@endif
			</span>
		</button>
	</div>
	<input type="hidden" id="url" value="{{ url('praise') }}">
	<input type="hidden" id="type" value="1">
	<input type="hidden" id="bid" value="{{ $diary->id }}">
	<blockquote class="layui-elem-quote layui-quote-nm">
		{!! $diary->content !!}
	</blockquote>
@endsection
