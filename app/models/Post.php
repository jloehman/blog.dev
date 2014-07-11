<?php

class Post extends BaseModel {
	//The db table this model relates too
	protected $table = 'posts';

	protected $imgDir = 'img-upload';

	//validation rules for our model properties
	static public $rules = [
	'title' => 'required|max:100',
	'body' => 'required|max:10000'
	];

	//example given by Chris
	public function getBodyAttribute($value)
	{
		// return strtoupper($value);
		return $value;
	}

	public function getTitleAttribute($value)
	{
		//without recalling the mutator
		// $this->attributes['title'] = "something";
		return $value;
	}

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function addUploadedImage($image){
		$systemPath = public_path() . '/' . $this->imgDir . '/';

		$imageName = $this->id . '-' . $image->getClientOriginalName();

		$image->move($systemPath, $imageName);

		$this->img_path = '/' . $this->imgDir . '/' . $imageName;
	}

	public function renderBody()
	{
		// $Parsedown = new Parsedown();
		$dirty_html = Parsedown::instance()->parse($this->body);
		$config = HTMLPurifier_Config::createDefault();
		$purifier = new HTMLPurifier($config);
		return $purifier->purify($dirty_html);

		// return $clean_html;
	}
}




