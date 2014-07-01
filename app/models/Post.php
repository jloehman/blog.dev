<?php

class Post extends Eloquent {
	//The db table this model relates too
	protected $table = 'posts';

	//validation rules for our model properties
	static public $rules = [
	'title' => 'required|max:100' 
	];
}
