<!-- /app/views/login.blade.php -->

@extends('layouts.base')

@section('body')

<h1>Log in</h1>

@if (Session::has('flash_message'))
	<p>{{ Session::get('flash_message') }}</p>
@else

	{{ Form::open(array('url' => '/login')) }}

	    Email<br>
	    {{ Form::text('email') }}<br><br>

	    Password:<br>
	    {{ Form::password('password') }}<br><br>

	    {{ Form::submit('Submit') }}

	{{ Form::close() }}

@endif

@stop
