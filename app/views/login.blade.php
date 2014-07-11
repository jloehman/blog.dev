@extends('layouts.master')

@section('content')

{{ Form::open(array('action' => 'HomeController@doLogin', 'class' => 'form-signin', 'method' => 'POST')) }}
	<h2 class=“form-signin-heading”><span class=“glyphicon glyphicon-lock”></span>Log in</h2>
	<input name="email" type="text" class="form-control" placeholder="Email" autofocus>
	<input name="password" type="password" class="form-control" placeholder="Password">
{{ Form::submit('Sign in', array('class' => 'btn btn-default btn-success')) }}

<!-- 	<button class="btn btn-lg btn primary btn block" type="submit">Sign In</button>
 -->
 {{ Form::close() }}


@stop



