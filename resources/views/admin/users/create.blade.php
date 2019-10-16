@extends('layouts.admin')

@section('content')


    <h1>Create user</h1>
	{!! Form::open([ 'method' => 'POST','url' => 'admin/users', 'files' => true]) !!}
		<div class="form-group"> 
			{!! Form::label('name', 'User name'); !!}
			{!! Form::text('name',null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group"> 
			{!! Form::label('email', 'Email'); !!}
			{!! Form::email('email',null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group"> 
		{!! Form::label('role', 'role'); !!}
		{!! Form::select('role_id',$roles,0,['class' => 'form-control','placeholder' => 'Pick a role...']) !!}

		</div>
		
		<div class="form-group"> 
			{!! Form::label('status', 'Status'); !!}
			{!! Form::select('is_active',[1 => 'active', 0 => 'diactive'],0, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group"> 
			{!! Form::label('password', 'Passsword'); !!}
			{!! Form::password('password', ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group"> 
			{!! Form::label('file', 'file'); !!}
			{!! Form::file('photo_id',null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group"> 	
			{!! Form::submit('create user',['class' => 'btn btn-primary']) !!}
			
		</div>
	{!! Form::close() !!}

	@include('includes/form_error')
@stop