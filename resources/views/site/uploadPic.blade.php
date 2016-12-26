@extends('common.layout')

@section('siteleft')
	<form role="form">
		<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
		<input type="hidden" name="hidden" id="hidden" value="{{ url('pic/upload') }}">
		<div class="form-group">
			<label for="exampleInputFile">File input</label>
			<input type="file" id="file" name="file">
		</div>
		<hr>
		<select multiple class="form-control" name="album_id" id="album_id">
			@if(!is_object($albums))
				<option value="">{{ $albums }}</option>
			@else
				@foreach($albums as $item)
					<option value="{{ $item->id }}">{{ $item->album_name }}</option>
				@endforeach
			@endif
		</select>
		<hr>
		<div class="checkbox">
			<label class="checkbox-inline">
				<input type="checkbox" name="status" id="status" value="1"> 设为封面
			</label>
		</div>
		<button type="submit" class="btn btn-default" id="upload">Submit</button>
	</form>
@endsection
