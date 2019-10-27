@extends('layouts.admin')
@section('content')
<h1>posts</h1>
<table class="table">
		<thead>
			<tr>
				<th> id </th>
				<th>Owner</th>
				<th>title</th>
				<th>category</th>
				<th>photo_id</th>				
				<th>body</th>
				<th>create</th>
				<th>update</th>
			</tr>
		</thead>
		@if($posts)
			@foreach($posts as $post)
				<tr>
				
					<td>{{$post->id}}</td>
					
					<td>{{$post->user_id? $post->user->name : ''}}</td>
					<td><a href="/admin/posts/{{$post->id}}/edit"> {{$post->title}} </a></td>
					<td>{{$post->category? $post->category->name : 'uncategorized'}}</td>
					<td><img src="{{$post->photo_id? $post->photo->filee : '/images/users/nophoto.jpg'}}" alt="" height="50px"></td>
					<td>{{$post->body}}</td>
					<td>{{$post->created_at->diffForHumans()}}</td>
					<td>{{$post->updated_at->diffForHumans()}}</td>
				
				</tr>
			@endforeach
		@endif






@stop