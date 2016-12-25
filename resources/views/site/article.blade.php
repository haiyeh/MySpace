@extends('common.layout')

@section('title', 'Read Article')
@section('siteleft')
<a href="{{ url('diary') }}" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>返回</a>
		<div class="page-header">
			<h2>{!! $diary->title !!}<small>&nbsp;——&nbsp;发布于{{ date('Y-m-d H:i:s', $diary->published_at) }}</small></h2>
		</div>
		<blockquote class="layui-elem-quote layui-quote-nm">{!! $diary->content !!}......</blockquote>
@endsection
