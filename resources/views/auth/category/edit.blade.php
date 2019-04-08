@extends('layouts\app')

@section('content')
@if(count($errors)>0)
	@foreach($errors->all() as $error)
		{{$error}}
	@endforeach
@endif
	<div>
		<form action="{{ route('Category.update',['id'=>$pickedCategory->id] )}}" method="post">
			{{csrf_field()}}
			<label for="category">Edit the name of the category</label>
			<input id="category" name="category" type="text" value="{{ $pickedCategory->type }}">
			<button type="submit"> Confirm Edit</button>
		</form>
	</div>
@stop