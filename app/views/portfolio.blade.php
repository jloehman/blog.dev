@extends('layouts master')
@section('topscript')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
<script src="somecript.js"></script>

@stop

@section('content')
	<script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.scrollTo.js"></script>
        <script src="js/jquery.nav.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/jquery.easypiechart.min.js"></script>
        <script src="js/jquery.vegas.min.js"></script>
        <script src="js/jquery.isotope.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/jquery.validate.js"></script>
        <script src="js/waypoints.min.js"></script>
        <script src="js/main.js"></script>
 @stop


@section('bottomscript')
<script>
console.log('we did it');
</script>

@stop