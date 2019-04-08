@extends('layouts\app')

@section('content')
	<h1>Nintendo</h1>
	<table class="table">
		<thead>
			<tr>
				<th>
					Tag Name
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
						<p>{{ $data->tag }}</p>	
					</td>
					<td>
						@if(auth::check())
						<a href="{{route('tag.edit',['id'=>$data->id])}}"><button style="margin-left: 5px;">Edit</button></a>
						@endif
					</td>
					<td>
						@if(auth::check())
						<a href="{{route('tag.destroy',['id'=>$data->id])}}"><button style="margin-left: 5px;">Delete</button></a>
						@endif
					</td>
				</tr>
				@endforeach
			@else
				<tr>
					<td>No tags as off now</td>
				</tr>
			@endif
		</tbody>
	</table>
@stop