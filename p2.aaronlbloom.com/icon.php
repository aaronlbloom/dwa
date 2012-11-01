<!DOCTYPE html>

<html>
<?php

# The DOC_ROOT and APP_PATH constant have to happen in the actual app

	# Document root, ex: /path/to/home/app.com/../ (uses ./ on CLI)
	define('DOC_ROOT', empty($_SERVER['DOCUMENT_ROOT']) ? './' : realpath($_SERVER['DOCUMENT_ROOT']).'/../');

	# App path, ex: /path/to/home/app.com/
	define('APP_PATH', realpath(dirname(__FILE__)).'/');

# Environment
	require_once DOC_ROOT.'environment.php';

# Where is core located?
	define('CORE_PATH',  $_SERVER['DOCUMENT_ROOT']."/../core/");

# Load app configs
	require APP_PATH."/config/config.php";
	require APP_PATH."/config/feature_flags.php";

# Bootstrap
	require CORE_PATH."bootstrap.php";

# Routing
    Router::$routes = array(
    	'/' => '/index',     # default controller when "/" is requested
    );

# Match requested uri to any routes and instantiate controller
    Router::init();

# Display environment details
	require CORE_PATH."environment-details.php";

?>

<head>
	<title>Post-er</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="StyleSheet" href="css/poster.css" type="text/css">
	<meta name="description" content="Generic Twitter like App for E75 Building Dynamic Web Apps, Project 1">

</head>

</head>


<body>

	<div class="roundedbox" id='header' >

		<div id="title">P</div>
	 
	</div>
 
 
</body>

</html>