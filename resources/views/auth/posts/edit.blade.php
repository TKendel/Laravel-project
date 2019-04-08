@extends('layouts\app')

@section('content')
@if(count($errors)>0)
	@foreach($errors->all() as $error)
		{{$error}}
	@endforeach
@endif
	<div>
		<form action="{{ route('Content.update',['id'=>$RequestedPost->id] )}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<label for="TitleEdit">Edit your title</label>
			<input id="TitleEdit" name="title" type="text" value="{{ $RequestedPost->title }}">
			<label for="DescEdit">Edit your Description</label>
			<textarea id="DescEdit" name="description">{{ $RequestedPost->description }}</textarea>
			<label for="Category">Select a cetegory</label>
			<select id="Category" name="category">
			@foreach($CategoryTypes as $types)
				<option value="{{ $types->id }}"
					@if($RequestedPost->category_id == $types->id)
						selected
					@endif
				>{{ $types->type }}</option>
			@endforeach
			</select>
			<label>Select your tag</label>
			@foreach($tags as $tag)
				<input type="checkbox" name="tags[]" value="{{$tag->id}}"
					@foreach($RequestedPost->tags as $t)
						@if($tag->id == $t->id)
							checked
						@endif
					@endforeach
				>{{$tag->tag}}
			@endforeach
			<input type="file" name="thumbnail">
			<button type="submit"> Confirm Edit</button>
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
		  $('#DescEdit').summernote();
		});
	</script>


@stop