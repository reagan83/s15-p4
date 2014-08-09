<!-- /app/views/login.blade.php -->

@extends('layouts.base')

@section('body')

<h1>Log in</h1>

	{{ Form::open(array('url' => '/login', 'role' => 'form', 'class' => 'darkform')) }}

	    Email<br>
	    {{ Form::text('email') }}<br><br>

	    Password:<br>
	    {{ Form::password('password') }}<br><br>

	    {{ Form::submit('Submit', ['class' => 'btn btn-large btn-primary openbutton']) }}

	{{ Form::close() }}

@stop
