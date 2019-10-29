@extends('layouts.admin')
@section('content')
@if(Session::has('deleted_user'))
	<p class="bg-danger">
	{{session('deleted_user')}}
	</p>
@endif
    <h1>categories</h1>
	list:
	<table class="table">
		<thead>
			<tr>
				<th> id </th>
				<th>Name</th>
				<td>created date</td>
				</tr>
		</thead>
		<tbody>
		@if($categories)
			@foreach($categories as $Category)
				<tr>
				<td>
				<a href="{{route('categories.edit',$Category->id)}}">
				{{$Category->id}}
				</a>
				</td>
				<td>
				<a href="/admin/categories/{{$Category->id}}/edit">
				{{$Category->name}}
				</a>
				</td>
				<td>
				{{$Category->created_at? $Category->created_at->diffForHumans(): ''}}
				</td>
				</tr>
			@endforeach	
		@endif	
			
		</tbody>
		
	</table>		
	<h2>
		create
	</h2>
	{!! Form::open([ 'method' => 'POST','action' =>'admin\AdminCategoryController@store']) !!}
	
	<div class="form-group"> 
	{!! Form::label('name', 'caregory name'); !!}
	{!! Form::text('name',null, ['class' => 'form-control']) !!}
	</div>
		
	
	<div class="form-group"> 	
	{!! Form::submit('create category',['class' => 'btn btn-primary']) !!}
		
	</div>
	{!! Form::close() !!}
	
	@include('includes/form_error')
	
	
@stop