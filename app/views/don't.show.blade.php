@extends('layouts.master')

@section('title')

{{{ $post->title }}}

@stop

@section('content')

<h3>{{{ $post->created_at->format('l, F jS Y @ h:i:s A') }}}</h3>
<p>{{{ $post->title }}}</p>
<p> By {{{ $post->user->first_name }}} {{{ $post->user->last_name }}}

@if ($post->img_path)
	<img src="{{{ $post->img_path }}}" class="img-responsive" alt="Uploaded blog image"/>
@endif

<p>{{{ $post->body }}}<br>
</p>

{{ Form::open(array('action' => array('PostsController@destroy', $post->id), 'method' => 'DELETE', 'id')) }}
{{ Form::submit('Delete') }}
{{ Form::close() }}

@stop