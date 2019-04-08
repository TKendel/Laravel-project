@extends('layouts\app')

@section('content')
	<h1>Nintendo</h1>
	<table class="table">
		<thead>
			<tr>
				<th>
					Category
				</th>
				<th>
					Edit
				</th>
				<th>
					Delete
				</th>
			</tr>
		</thead>
		<tbody>
			@if($categories->count()>0)
				@foreach($categories as $category)
				<tr>
					<td>
						<p>{{ $category->type }}</p>
					</td>
					<td>
						@if(auth::check())
						<a href="{{route('Category.edit',['id'=>$category->id])}}"><button style="margin-left: 5px;">Edit</button></a>
						@endif
					</td>
					<td>
						@if(auth::check())
						<a href="{{route('Category.destroy',['id'=>$category->id])}}"><button style="margin-left: 5px;">Delete</button></a>
						@endif
					</td>
				</tr>
				@endforeach
			@else
				<tr>
					<td>No categories as off now</td>
				</tr>
			@endif
		</tbody>
	</table>
@stop