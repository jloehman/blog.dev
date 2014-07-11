@extends('layouts.master')

@section('content')

<h1>{{{ $post->title }}}</h1> 
<h3>{{{ $post->user->email }}}</h3>
<h5>{{{ $post->created_at->format('l, F jS Y @ h:i:s A') }}}</h5>
<p>{{{ $post->title }}}</p>
<p> By {{{ $post->user->first_name }}} {{{ $post->user->last_name }}}</p>

@if ($post->img_path)
	<img src="{{{ $post->img_path }}}" class="img-responsive" alt="Uploaded blog image"/>
@endif
<p>{{ $post->renderBody(20) }}</p>
<br>

{{ Form::open(array('action' => array('PostsController@destroy', $post->id), 'method' => 'DELETE')) }}
 {{ Form::submit('Delete', array('class' => 'btn btn-default btn-danger')) }}
{{ Form::close() }}

@stop