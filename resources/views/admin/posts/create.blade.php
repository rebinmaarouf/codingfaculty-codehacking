@extends('layouts.admin')

@section('content')


    <h1>Create post</h1>
	{!! Form::open([ 'method' => 'POST','url' => 'admin/posts', 'files' => true]) !!}
		<div class="form-group"> 
			{!! Form::label('title', 'post title'); !!}
			{!! Form::text('title',null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group"> 
			{!! Form::label('category_id', 'category'); !!}
			{!! Form::select('category_id',$cateegories,0,['class' => 'form-control','placeholder' => 'Pick a category...']) !!}		
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
			{!! Form::submit('create post',['class' => 'btn btn-primary']) !!}
			
		</div>
	{!! Form::close() !!}

	@include('includes/form_error')
@stop