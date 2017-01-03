@extends('common.layout')

@section('siteleft')
<a href="{{ url('diary') }}" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>返回</a>
		<div class="page-header">
			<input type="hidden" id="url" value="{{ url('praise') }}">
			<input type="hidden" id="type" value="1">
			<input type="hidden" id="bid" value="{{ $diary->id }}">
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
			<h2>{!! $diary->title !!}<small>&nbsp;——&nbsp;发布于{{ date('Y-m-d H:i:s', $diary->published_at) }}</small></h2>
		</div>
		<blockquote class="layui-elem-quote layui-quote-nm">{!! $diary->content !!}......</blockquote>
@endsection
