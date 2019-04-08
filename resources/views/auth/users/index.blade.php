@extends('layouts\app')

@section('content')
	<h1>Users</h1>
	<table class="table">
		<thead>
			<tr>
				<th>
					Avatar
				</th>
				<th>
					Name
				</th>
				<th>
					Premissions
				</th>
				<th>
					Delete
				</th>
			</tr>
		</thead>
		<tbody>
			@if($allUsers->count()>0)
				@foreach($allUsers as $user)
				<tr>
					<td>
						<img src="{{ asset($user->profile->avatar) }}" height="75" width="75">
					</td>
					<td>
						<p>{{$user->name}}</p>
					</td>
					<td>
						@if($user->admin)
							<a href="{{route('User.removeAdmin',['id'=>$user->id])}}"><button style="margin-left: 5px;">Remmove premisions
							</button></a>
						@else
							<a href="{{route('User.admin',['id'=>$user->id])}}"><button style="margin-left: 5px;">Make admin
							</button></a>
						@endif
					</td>
					<td>
						@if(Auth::id() !== $user->id)
						<a href="{{route('User.destroy',['id'=>$user->id])}}"><button style="margin-left: 5px;">Delete</button></a>
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