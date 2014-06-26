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

Route::get('/rolldice/{guess}', function($guess)
{

	// if(! is_numeric($guess))
	// {
	// 	return Redirect::to('/rolldice');
	// }
	// if ($guess == 'random')
 //    {
 //        return Redirect::to('/');
 //    }
 //    else
 //    {
	$random = rand(1,6);
	$data = array
	(
		'random' => $random, 
		'guess' => $guess
	);

 	return View::make('temp.roll-dice')->with($data);

 });

//resume and portfolio blog

Route::get('/sayhello/{name}', function($name)
{
    if ($name == "Jason")
    {
        return Redirect::to('/');
    }
    else
    {
        $data = array('name' => $name);
        return View::make('my-first-view')->with($data);
    }
});
