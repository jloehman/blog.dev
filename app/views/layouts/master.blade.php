<!doctype html>
<html lang="en" class="">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
@yield('topscript')
<head>
	<br>
	<br>
    <title>My Blähg</title>
</head>
<body>	
	<div class="container">
	@if (Auth::check())
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header navbar-inverse">
          <a class="navbar-brand">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</a>
		<div class="col-md-2 col-sm-3 text-default">
      <a class="story-img" href="http://instagram.com/jlorunner"><img src="http://photos-a.ak.instagram.com/hphotos-ak-xpa1/10523255_1451913678398408_1183783284_a.jpg" style="width:50px;height:50px" class="img-circle"></a>
            </div>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active">{{ link_to_action('PostsController@index', 'Home') }}</li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li>{{ link_to_action('PostsController@create', 'Create Post') }}</li>
                <li>{{ link_to_action('HomeController@logout', 'Log Out') }}</li>
              </ul>
            </li>
          </ul>
   			<form class="navbar-form navbar-right">
	        {{ Form::open(array('action' =>  'PostsController@index', 'class' => 'form-inline', 'method' => 'GET')) }}

	            {{ Form::text('search', null, array('placeholder' => 'Search Post', 'class' => 'form-control col-lg-4')) }}
	            {{ Form::submit('Search', array('class' => 'btn btn-primary')) }}

	        {{ Form::close() }}
	   </form>
      </div>
    </div>
</div>


</div>
	@else
	
		{{ link_to_action('HomeController@showLogin', 'Login') }}
	
	@endif

	<div class="container">
				
						<section class="main-content">

			@if (Session::has('successMessage'))
		    <div class="alert alert-success">{{{ Session::get('successMessage') }}}</div>
		@endif
		@if (Session::has('errorMessage'))
		    <div class="alert alert-danger">{{{ Session::get('errorMessage') }}}</div>
		@endif
	</section>

		@yield('content')

		



		<div class "about-me-content">
		</div>

			

<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
@yield('bottomscript')

</body>
</html>
 