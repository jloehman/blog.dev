@extends('layouts.master')

@section('content')

<h1>My Blähg</h1>

      <!--   <h1>Title</h1>
        <h1>Created</h1>
        <h1>Author</h1>
        <h1>Actions</h1> -->
     
    @foreach ($posts as $post)
    
    <h1>{{link_to_action('PostsController@show', $post->title, array($post->id))}}</h1>
        <h2> By: {{{ $post->user->email }}}</h2>

    <h4>{{{ $post->created_at }}}<h4>
    @if ($post->img_path)
    <img src="{{{ $post->img_path }}}" class="img-responsive" style="width: 100px; height: 100px" ><br>
    @endif
    <p>{{link_to_action('PostsController@edit','Edit', array($post->id), array('class' => 'btn btn-danger btn-sm'))}}</p>
    
    @endforeach

    <!-- <hr> -->
    <!-- {{link_to_action('PostsController@create', 'Create New Post')}} <br> -->
    @if(empty($_GET['search']))
    {{ $posts->links() }}
    @endif

    
@stop




