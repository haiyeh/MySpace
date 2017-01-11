@extends('common.layout')

@section('siteleft')
	<a href="#" onclick="history.back(-1)" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>返回</a>

		<div class="page-header">
			<input type="hidden" id="url" value="{{ url('praise') }}">
			<input type="hidden" id="type" value="1">
			<input type="hidden" id="bid" value="{{ $diary->id }}">
			<button class="btn btn-primary" lay-submit lay-filter="zan">
				<span class="glyphicon glyphicon-thumbs-up"></span>
				<span class="badge" id="show">
				@if(is_object($praiseCount) && !empty($praiseCount))
						{{ $praiseCount->praises }}
					@else
						{{ $praiseCount }}
					@endif
			</span>
			</button>
			<h2>{!! $diary->title !!}<small>&nbsp;——&nbsp;发布于{{ date('Y-m-d H:i:s', $diary->published_at) }}</small></h2>
		</div>

		<blockquote class="layui-elem-quote layui-quote-nm">
			{!! $diary->content !!}
			<a href="#" style="float: right" onclick="comment()">
				<span class="glyphicon glyphicon-comment"></span>
			</a>
		</blockquote>

	<div class="container" id="comment_div" style="display: none">
		<input type="hidden" id="comment_url" value="{{ url('comment') }}">
		<input type="hidden" id="_token" value="{{ csrf_token() }}">
		<label for="">评论内容：</label>
		<textarea name="content" id="comment" cols="30" rows="10" style="width: 95%;"></textarea>
		<p style="text-align: center">
			<button class="btn btn-danger" onclick="quxiao()">取消</button>
			<button class="btn btn-primary" lay-submit lay-filter="comment_submit">提交</button>
		</p>
	</div>

	<div class="container" id="comment_all">

			<hr>
			<span style="float: left">评论区：</span>
			<hr>
			@foreach($article_comment as $key=>$value)
				@if(empty($value->content))
					<blockquote class="layui-elem-quote layui-quote-nm">
						暂无评论，快来抢沙发吧！！
					</blockquote>
				@else
				<blockquote class="layui-elem-quote layui-quote-nm">
					{!! $value->content !!}
					<span style="float:right;">{{ date("Y-m-d", $value->comment_at) }}</span>
				</blockquote>
				@endif
			@endforeach
	</div>
	<div class="container">{!! $article_comment->render() !!}</div>
@endsection
