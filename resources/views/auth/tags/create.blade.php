@extends('layouts\app')

@section('content')
@if(count($errors)>0)
	@foreach($errors->all() as $error)
		{{$error}}
	@endforeach
@endif

<div>
	<form action="{{ route( 'tag.store' )}}" method="post">
		{{ csrf_field() }}
		<label for="tag">Name of your tag</label>
		<input id="tag" type="text" name="tag">
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
@stop