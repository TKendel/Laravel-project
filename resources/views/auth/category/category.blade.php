@extends('layouts\app')

@section('content')

<!-- Za izradi categorija al samo trenutno -->
<form action="{{ route( 'Category.store' )}}" method="post">
	{{ csrf_field() }}
	<label for="title">Create a category</label>
	<input type="text" name="category">
	<button type="submit" class="btn btn-primary">Submit</button>
</form>
@stop