@extends('layouts\app')

@section('content')
@if(count($errors)>0)
	@foreach($errors->all() as $error)
		{{$error}}
	@endforeach
@endif
	<div>
		<form action="{{ route('tag.update',['id'=>$requestedTag->id] )}}" method="post">
			{{csrf_field()}}
			<label for="tag">Edit your tag</label>
			<input id="tag" name="tag" type="text" value="{{ $requestedTag->tag }}">
			<button type="submit"> Confirm Edit</button>
		</form>
	</div>
@stop