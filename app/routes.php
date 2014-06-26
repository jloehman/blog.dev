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

// Route::get('/rolldice', function getInteger()
// {
// 	$random = rand(1,6);
// 	return rand(1,6);
// });


Route::get('/rolldice/{guess}', function($guess)
{

	if(! is_numeric($guess))
	{
		return Redirect::to('/rolldice');
	}
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


