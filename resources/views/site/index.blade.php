@extends('common.layout')

@section('title', 'MySpace Site')
@section('siteleft')
	<div class="page-header">
		<h2>{!! $diary->title !!}<small>发布于{{ date('Y-m-d H:i:s', $diary->published_at) }}</small></h2>
	</div>
	<blockquote class="layui-elem-quote layui-quote-nm">{!! $diary->content !!}</blockquote>
@endsection 