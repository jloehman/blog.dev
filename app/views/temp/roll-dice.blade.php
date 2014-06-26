@extends('layouts.master')

@section('topscript')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

@stop

@section('content')

    The random roll was: {{{ $random }}}<br>
    Your guess was: {{{ $guess }}}<br>

    @if ($random == $guess)
    	<p style="color:green;">Your guess was correct!</p>

    @else
    	<p style="color:red;">Sorry, please try again!</p>

    @endif


@stop
