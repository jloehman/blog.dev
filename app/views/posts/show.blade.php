@extends('layouts.master')

@section('title')

Show all posts

@stop

@section('content')

<p>{{{ $post->title }}}</p> 
<p>{{{ $post->body }}}</p>

@stop