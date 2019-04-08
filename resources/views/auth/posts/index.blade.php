@extends('layouts\app')

@section('content')
	<h1>Nintendo</h1>
	<table class="table">
		<thead>
			<tr>
				<th>
					Posts
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
			@if($allContent->count()>0)
				@foreach($allContent as $data)
				<tr>
					<td>
						<h3>{{ $data->title }}</h3>
						<p>{{ $data->description }}</p>
						<img src="{{ $data->thumbnail}}" height="75" width="75">
					</td>
					<td>
						@if(auth::check())
						<a href="{{route('Content.edit',['id'=>$data->id])}}"><button style="margin-left: 5px;">Edit</button></a>
						@endif
					</td>
					<td>
						@if(auth::check())
						<a href="{{route('Content.destroy',['id'=>$data->id])}}"><button style="margin-left: 5px;">Delete</button></a>
						@endif
					</td>
				</tr>
				@endforeach
			@else
				<tr>
					<td>No posts as off now</td>
				</tr>
			@endif
		</tbody>
	</table>
@stop