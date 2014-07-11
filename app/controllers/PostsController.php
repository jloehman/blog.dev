<?php

class PostsController extends BaseController {

	public function __construct()
	{
	    // call base controller constructor
	    parent::__construct();

	    // run auth filter before all methods on this controller except index and show
	    $this->beforeFilter('auth', array('except' => array('index', 'show')));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{
		$posts = Post::with('user')->orderBy('created_at', 'desc')->paginate(4);

		if (Input::has('search')) 
		{

			$queryString = Input::get('search');
			$posts = Post::where('title', 'LIKE', '%' . $queryString . '%')->paginate(4);
		} 

		else {
			$posts = Post::paginate(4);
		}

		// $posts = Post::all(); * if i was to set post as a variable
		return View::make('posts.index')->with('posts', $posts);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	// Log::info('This is some useful information.');
	return View::make('posts.create-edit');

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$post = new Post();

		$post->user_id = Auth::user()->id;
		// $post->user()->associate(Auth::user());
		
		if (Input::hasFile('image') && Input::file('image')->isValid()){
		$post->addUploadedImage(Input::file('image'));

		$post->save();
		}

		return $this->savePost($post);
		
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Post::findOrFail($id);
		// $post->body = Parsedown::instance()->parse($post->body);
		// show a post for posts/show/id
		return View::make('posts.show')->with('post', $post);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$post = Post::findOrFail($id);
		return View::make('posts.create-edit')->with('post', $post);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
	$post = new Post();

	if ($id != null)
	{
		$post = Post::findOrFail($id);
	}
		$validator = Validator::make(Input::all(), Post::$rules);

		if ($validator->fails())
		{
			Session::flash('errorMessage', 'There were errors');

			return Redirect::back()->withInput()->withErrors($validator);
		}
		else
		{
		// $title = Input::get('title');
		// $message = Input::get('message');
		// $post = new Post();
		$post->title = Input::get('title');
		$post->body = Input::get('body');
		$post->save();

		Session::flash('successMessage', 'Post created successfully');

		return Redirect::action('PostsController@show', $post->id);
		}
	}
protected function savePost(Post $post){

	$validation = Validator::make(Input::all(), Post::$rules);

	if($validation->fails()){

		session::flash('errorMessage', 'Failed to save post.');

		return Redirect::back()->withInput()->withErrors($validation);
	}else{
		$post->title = Input::get('title');
		$post->body = Input::get('body');

		$post->save();

		if (Input::hasFile('image') && Input::file('image')->isValid()){
			$post->addUploadedImage(Input::file('image'));
			$post->save();
		}

		session::flash('successMessage', 'Post successfully saved!');

		return Redirect::action('PostsController@index');
	}
}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = Post::findOrFail($id);
		$post->delete();
		Session::flash('successMessage', 'Post deleted successfully');

		return Redirect::action('PostsController@index');
	}


}
