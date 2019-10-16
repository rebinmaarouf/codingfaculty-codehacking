@extends('layouts.admin')

@section('content')


    <h1>edit user</h1>
	<div class="col-md-3">
	<img src="{{$user->photo? $user->photo->filee : '/images/users/nophoto.jpg'}}" class="img-responsive img-rounded">
	</div>
	
	<div class="col-md-9">
	{!! Form::model($user,[ 'method' => 'PATCH','action' => ['admin\AdminUsersController@update', $user->id],'files' => true]) !!}
	
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
		{!! Form::select('role_id',$roles,Null,['class' => 'form-control','placeholder' => 'Pick a role...']) !!}

		</div>
		
		<div class="form-group"> 
			{!! Form::label('status', 'Status'); !!}
			{!! Form::select('is_active',[1 => 'active', 0 => 'diactive'],Null, ['class' => 'form-control']) !!}
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
			{!! Form::submit('update user',['class' => 'btn btn-primary']) !!}
			
		</div>
	{!! Form::close() !!}
	{!! Form::model($user,['method'=>'DELETE','action' => ['admin\AdminUsersController@destroy', $user->id]]) !!}
	{!! Form::submit('delete user',['class' => 'btn btn-danger']) !!}
	{!! Form::close() !!}
	@include('includes/form_error')
	</div>
@stop