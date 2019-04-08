@extends('layouts\app')

@section('content')
@if(count($errors)>0)
	@foreach($errors->all() as $error)
		{{$error}}
	@endforeach
@endif

<div>
	<form action="{{ route( 'Content.store' )}}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<label for="title">The title of your post</label>
		<input type="text" name="title">
		<div>
		<label for="description">Information about your article</label>
		<textarea id="description" name="description"></textarea>
		</div>
		<input type="file" name="thumbnail">
		<label for="Category">Where do you belong</label>
		<select id="Category" name="category_id">
			@foreach($CategoryTypes as $types)
				<option value="{{ $types->id }}">{{ $types->type }}</option>
			@endforeach
		</select>
		<label for="tags">Pick your tags</label>
			@foreach($tags as $tag)
				<input id="tags" type="checkbox" name="tags[]" value="{{$tag->id}}">{{$tag->tag}}
			@endforeach
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
@stop

@section('styles')
	<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
@stop

@section('scripts')
	<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
	<script>
		$(document).ready(function() {
		  $('#description').summernote();
		});
	</script>


@stop