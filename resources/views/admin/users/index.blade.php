@extends('layouts.admin')
@section('content')
@if(Session::has('deleted_user'))
	<p class="bg-danger">
	{{session('deleted_user')}}
	</p>
@endif

    <h1>users</h1>
	<table class="table">
		<thead>
			<tr>
				<th> id </th>
				<th>photo</th>
				<th>Name</th>
				<th>Email</th>
				<th>Role</th>
				<th>Status</th>
				<th>create</th>
				<th>update</th>
			</tr>
		</thead>
		@if($users)
			@foreach($users as $user)
				<tr>				
					<td>{{$user->id}}</td>					
					<td><img src="{{$user->photo? $user->photo->filee : '/images/users/nophoto.jpg'}}" alt=""></td>
					<td><a href="/admin/users/{{$user->id}}/edit"> {{$user->name}} </a></td>
					<td>{{$user->email}}</td>
					<td>{{$user->role->name}}</td>
					<td>{{$user->is_active ==1 ? 'Active':'not active'}}
					<td>{{$user->created_at->diffForHumans()}}</td>
					<td>{{$user->updated_at->diffForHumans()}}</td>
				
				</tr>
			@endforeach
		@endif
	</table>		


@stop