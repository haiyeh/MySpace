@extends('common.layout')

@section('siteleft')
	<div class="siteIndex_left">
		<div class="diary_header">
			<h2>&nbsp;{!! $diary->title !!}<small>&nbsp;&nbsp;&nbsp;发布于{{ date('Y-m-d H:i:s', $diary->published_at) }}</small></h2>
		</div>
		&nbsp;<button class="btn btn-warning" lay-submit lay-filter="zan">
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
			<p>{!! $diary->content !!}</p>
		</blockquote>
	</div>

	<div class="siteIndex_right">
		<div class="siteIndex_right_title">
			<h4>&nbsp;热门排行</h4>
		</div>
		<ul class="list-group">
			<li class="list-group-item">Cras justo odio</li>
			<li class="list-group-item">Dapibus ac facilisis in</li>
			<li class="list-group-item">Morbi leo risus</li>
			<li class="list-group-item">Porta ac consectetur ac</li>
			<li class="list-group-item">Vestibulum at eros</li>
		</ul>
	</div>
@endsection
