@extends('common.layout')

@section('siteleft')
	<div class="siteIndex_left">
		@if(!empty($diary))
			<div class="diary_header">
				<h2><a href="{{ url('read') }}/{{ $diary->id }}">{{ $diary->title }}</a><small>发布于{{ date('Y-m-d', $diary->published_at) }}</small></h2>
			</div>
			&nbsp;<button class="btn btn-warning" lay-submit lay-filter="zan" id="zan">
					<span class="glyphicon glyphicon-thumbs-up"></span>
					<span class="badge" id="show">
					@if(is_object($praiseCount) && !empty($praiseCount))
							{{ $praiseCount->praises }}
						@else
							{{ $praiseCount }}
						@endif
				</span>
				</button>
			<input type="hidden" id="url" value="{{ url('praise') }}">
			<input type="hidden" id="type" value="1">
			<input type="hidden" id="bid" value="{{ $diary->id }}">
			<blockquote>
				<p>{!! substr($diary->content, 0, 1110) !!}....</p>
			</blockquote>
		@else
			<h1 style="margin: 30px auto;">暂无发布文章</h1>
		@endif
	</div>

	<div class="siteIndex_right">
		<div class="siteIndex_right_title">
			<h4>&nbsp;热门排行</h4>
		</div>
		<ul class="list-group">
			@foreach($hotDiary as $v)
			<li class="list-group-item">
				<a href="{{ url('read') }}/{{ $v->id }}">{{ $v->title }}</a>
				<span class="badge" id="show" style="float: right;">{{ $v->click }}</span>
			</li>
			@endforeach
		</ul>
	</div>

	<div class="siteIndex_right" style="margin-top: 50px;">
		<div class="siteIndex_right_title">
			<h4>&nbsp;资源下载</h4>
			@if(!empty(session('username')) || !empty(session('admin')))
				<ul class="list-group">
					@foreach($sources as $item)
						<li class="list-group-item">
							<a href="{{ $item->source_link }}">{{ $item->source_name }}</a>
							<span class="badge" id="show" style="float: right;">{{ $item->click }}</span>
						</li>
					@endforeach
				</ul>
			@else
				<ul class="list-group">
					@foreach($sources as $item)
						<li class="list-group-item">
							<p>{{ $item->source_name }}</p>
							<span class="badge" id="show" style="float: right;">{{ $item->click }}</span>
						</li>
					@endforeach
				</ul>
			@endif
		</div>
	</div>

@endsection
