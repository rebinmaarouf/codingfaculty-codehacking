@extends('layouts.admin')
@section('content')
@if(Session::has('deleted_user'))
	<p class="bg-danger">
	{{session('deleted_user')}}
	</p>
@endif
    <h1>media</h1>

	
	
@stop