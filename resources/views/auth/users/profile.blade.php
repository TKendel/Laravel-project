@extends('layouts\app')

@section('content')
@if(count($errors)>0)
	@foreach($errors->all() as $error)
		{{$error}}
	@endforeach
@endif

<div>
	<form action="{{ route( 'Profile.update' )}}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<label for="Username">Username</label>
		<input id="Username" type="text" name="Username" value="{{$currentUser->name}}">
		<label for="email">Email</label>
		<input id="email" type="email" name="email" value="{{$currentUser->email}}">
		<label for="password">Password</label>
		<input id="password" type="password" name="password">
		<label for="avatar">Upload new avatar</label>
		<input id="avatar" type="file" name="avatar">
		<label for="link">Linked in profile</label>
		<input id="link" type="url" name="link" value="{{$currentUser->profile->link}}">
		<label for="about">About you</label>
		<textarea name="about" id="about">{{$currentUser->profile->about}}</textarea>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
@stop