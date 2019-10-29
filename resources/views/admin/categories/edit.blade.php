@extends('layouts.admin')
@section('content')
@if(Session::has('deleted_user'))
	<p class="bg-danger">
	{{session('deleted_user')}}
	</p>
@endif
    <h1>categories</h1>
	
	<table class="table">
		<thead>
			<tr>
				<th> id </th>
				<th>Name</th>
				<td>edit</td>
				<td>delete</td>
				</tr>
		</thead>
		<tbody>
		@if($category)
		{!! Form::model($category,[ 'method' => 'PATCH','action' =>['admin\AdminCategoryController@update', $category->id],'files' => true]) !!}
		
				<tr>
				<td>
				{{$category->id}}
				</td>
				<td>
				{!! Form::text('name',null, ['class' => 'form-control']) !!}			
				</td>
				<td>
				{!! Form::submit('edit category',['class' => 'btn btn-primary']) !!}
				{!! Form::close() !!}
				</td>
				<td>
				{!! Form::model($category,['method'=>'DELETE','action' => ['admin\AdminCategoryController@destroy', $category->id]]) !!}
				{!! Form::submit('delete category',['class' => 'btn btn-danger']) !!}
				{!! Form::close() !!}
				</td>
				</tr>
		@endif	
			
		</tbody>
		
	</table>		

	
	@include('includes/form_error')
	
	
@stop