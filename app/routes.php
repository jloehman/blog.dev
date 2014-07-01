<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// rolldice example

Route::get('/', 'HomeController@showWelcome');

Route::get('/rolldice/{guess}', function($guess)
{

	$random = rand(1,6);
	$data = array
	(
		'random' => $random, 
		'guess' => $guess
	);

 	return View::make('temp.roll-dice')->with($data);

 });

//resume and portfolio blog

//Route::get('/sayhello/{name}', 'HomeController@sayHello');

Route::resource('posts', 'PostsController');



// portfolio and resume blog

Route::get('/', function()
{
	return View::make('layouts.master');
});

route::resource('posts', 'PostsController');

Route::get('/resume/{}', function()
{
	return View::make('resume');
});


Route::get('/portfolio/{}', function()
{
	return View::make('portfolio');
});


Route::get('/orm-test', function()
{
	// $post = new Post();
	// $post->title = "New Blog Post";
	// $post->body = "Holy crap writing code using eloquent ORM is easy like Andrew's mom!";
	// $post->save();

	// $post = new Post();
	// $post->title = "Even more blog posts";
	// $post->body = "this is not soo bad";
	// $post->save();

	// $posts = Post::all();
		// foreach ($posts as $post){
		// 	echo $post->title . "<br>";
		// 	echo $post->body . "<br>";

		// }
		

	// $post = Post::find(1);

	// echo $post->title . "<br>";
	// echo $post->body . "<br>";

	// $post = Post::delete();

	// $post->title = "This is a NEW title";

	// return "Eloquent ORM is Eloquent";

	// print_r($post);
});
?>