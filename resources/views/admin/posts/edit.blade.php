@extends('layouts.admin')

@section('content')


    <h1>Edit post</h1>

	
	
		{!! Form::model($post,[ 'method' => 'PATCH','action' =>['admin\AdminPostsController@update', $post->id],'files' => true]) !!}
	
		<div class="form-group"> 
			{!! Form::label('title', 'post title'); !!}
			{!! Form::text('title',null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group"> 
			{!! Form::label('category_id', 'category'); !!}
			{!! Form::select('category_id',$cateegories,null,['class' => 'form-control','placeholder' => 'Pick a category...']) !!}		
		</div>
		<div>
		<img src="{{$post->photo->filee}}" alt="">
		</div>
		<div class="form-group"> 
			{!! Form::label('photo_id', 'photo'); !!}
			{!! Form::file('photo_id',null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group"> 
			{!! Form::label('body', 'content'); !!}
			{!! Form::textarea('body',null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group"> 	
			{!! Form::submit('edit post',['class' => 'btn btn-primary']) !!}
			
		</div>
	{!! Form::close() !!}
	{!! Form::model($post,['method'=>'DELETE','action' => ['admin\AdminPostsController@destroy', $post->id]]) !!}
	{!! Form::submit('delete post',['class' => 'btn btn-danger']) !!}
	{!! Form::close() !!}
	@include('includes/form_error')
@stop