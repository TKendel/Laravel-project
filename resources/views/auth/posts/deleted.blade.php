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
					Restore
				</th>
				<th>
					Destroy
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
						<a href="{{route('Content.restore',['id'=>$data->id])}}"><button style="margin-left: 5px;">Restore</button></a>
						@endif
					</td>
					<td>
						@if(auth::check())
						<a href="{{route('Content.kill',['id'=>$data->id])}}"><button style="margin-left: 5px;">Destroy</button></a>
						@endif
					</td>
				</tr>
				@endforeach
			@else
				<tr>
					<td>Trash is empty</td>
				</tr>
			@endif
		</tbody>
	</table>
@stop