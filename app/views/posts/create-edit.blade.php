@extends('layouts.master')
@section('topscript')
	<link rel="stylesheet" type="text/css" href="/css/parsedown.css" />
@stop

@section('content')

@if(isset($post))
	<h1>Edit Post</h1>
	{{ Form::model($post, array('action' => array('PostsController@update', $post->id), 'method' => 'PUT', 'files' => true)) }}
@else
	<h1>Create new post</h1>
	{{ Form::open(array('action' =>'PostsController@store', 'files' => true)) }}

@endif

<!-- <div class="wmd-panel">
 -->	<div class="form-group">
		{{ Form::label('title', 'Title') }}
		{{ Form::text('title') }}
		{{ $errors->first('title', '<span class="help-block">:message</span><br>') }}
	</div>
	<div class="form-group">
		{{ Form::label('image', 'Image') }}
		<br>
		{{ Form::file('image') }}
		{{ $errors->first('image', '<span class="help-block">:message</span><br>') }}
	</div>
	<div class="form-group">
		{{ Form::label('body', 'Body') }}
			<div class="wmd-panel">
            <div id="wmd-button-bar"></div>
            <textarea class="wmd-input" id="wmd-input"></textarea>	
         {{ $errors->first('body', '<span class="help-block">:message</span><br>') }}
         	</div>
	</div>
	<div class="form-group">
		{{ form::submit('Post me', array('class' => 'btn btn-default btn-danger')) }}
		{{ Form::close() }}
	</div>
<!-- </div>
 -->	<div id="wmd-preview" class="wmd-panel wmd-preview"></div>

@stop

@section('bottomscript')

	<script type="text/javascript" src="/js/Markdown.Converter.js"></script>
    <script type="text/javascript" src="/js/Markdown.Sanitizer.js"></script>
    <script type="text/javascript" src="/js/Markdown.Editor.js"></script>

    <script type="text/javascript">
        (function () {
            var converter1 = Markdown.getSanitizingConverter();
            var editor1 = new Markdown.Editor(converter1); 
            editor1.run();
        })();
    </script>

@stop
