@extends('layouts\app')

@section('content')
@if(count($errors)>0)
	@foreach($errors->all() as $error)
		{{$error}}
	@endforeach
@endif
	<div>
		<form action="{{ route('Settings.update')}}" method="post">
			{{csrf_field()}}
			<label for="siteName">Edit your site name</label>
			<input id="siteName" name="siteName" type="text" value="{{ $settings->name }}">
			<label for="conNumber">Edit your contact number</label>
			<input id="conNumber" name="contactNumber" type="text" value="{{ $settings->contact_number }}">
			<label for="conAddress">Edit your address</label>
			<input id="conAddress" name="contactAddress" type="text" value="{{ $settings->contact_address }}">
			<label for="email">Edit your email</label>
			<input id="email" name="email" type="email" value="{{ $settings->email }}">
			<button type="submit"> Confirm Edit</button>
		</form>
	</div>
@stop