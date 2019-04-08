@extends('layouts\app')

@section('content')
@if(count($errors)>0)
	@foreach($errors->all() as $error)
		{{$error}}
	@endforeach
@endif

<div>
	<form action="{{ route( 'User.store' )}}" method="post">
		{{ csrf_field() }}
		<label for="Username">Username</label>
		<input id="Username" type="text" name="Username">
		<label for="email">Email</label>
		<input id="email" type="email" name="email">
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
@stop