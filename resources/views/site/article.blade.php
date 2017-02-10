@extends('common.layout')

@section('siteleft')
	<a href="#" onclick="history.back(-1)" class="layui-btn"><span class="glyphicon glyphicon-arrow-left"></span>返回</a>

		<div class="page-header">
			<input type="hidden" id="url" value="{{ url('praise') }}">
			<input type="hidden" id="type" value="1">
			<input type="hidden" id="bid" value="{{ $diary->id }}">
			<button class="btn btn-warning" lay-submit lay-filter="articleZan" id="articleZan">
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
			@if(!empty(session('username')))
			<a href="#" style="float: right" onclick="comment()">
				<span class="glyphicon glyphicon-comment"></span>
			</a>
			@endif
		</blockquote>

		<span style="float: left;margin-top: 30px;"><b style="font-size:19px;">评论区：</b></span>
		<hr>

	<div class="container" id="comment_div" style="display: none">
		<input type="hidden" id="comment_url" value="{{ url('comment') }}">
		<input type="hidden" id="_token" value="{{ csrf_token() }}">
		<label for="">评论内容：</label>
		<textarea name="content" id="comment" cols="30" rows="10" style="width: 95%;"></textarea>
		<p style="text-align: center">
			<button class="btn btn-danger" onclick="quxiao()">取消</button>
			<button class="layui-btn" lay-submit lay-filter="comment_submit">提交</button>
		</p>
	</div>

	<div class="container" id="comment_all">
			@foreach($article_comment as $key=>$value)
				@if(empty($value))
					<blockquote class="layui-elem-quote layui-quote-nm">
						暂无评论，快来抢沙发吧！！
					</blockquote>
				@else
				<div class="container" style="width:70%;border-bottom: 2px solid #2fa0ec;margin-top:15px; box-shadow: rgba(62, 62, 62, 0.87)">
					<img src="{{ session('userHeaderPath') }}" alt="" class="img-thumbnail img-responsive" style="width: 80px;height: 80px;float: left">
					<span style="margin-top: 5px;margin-left: 5px;float: left">{{ session('username') }}</span>
					<blockquote style="margin-top: 35px;margin-left: 100px;">
						{!! $value->content !!}
						<span style="float: right">
                        {{ date("Y-m-d", $value->comment_at) }}
                    </span>
					</blockquote>

				</div>
				@endif
			@endforeach
	</div>
	<div class="container">{!! $article_comment->render() !!}</div>
@endsection
