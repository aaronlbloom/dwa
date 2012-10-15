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

		<div id="title">Post-er</div>
		<div id="tagline">Post-er is a simple no-frills <STRONG>FREE</STRONG> micro blogging alternative for <strong>REAL</strong> people who refuse to have their messages controlled by the mainstream social media machine! Yeah, you know who you are.</div>

	</div>
<div id="wrapper" class="roundedbox"> 

 
		<div class="roundedbox" id='left'>
			<bold>Name:</bold> Aaron L Bloom <br>
			<bold>Bio:</bold> Some Guy <br>
			<bold>Tweets:</bold> 15 <br>
			<bold>Mentions:</bold> 12 <br>
			
		</div>
		<div class="roundedbox" id='right'>
		
			<div class="post" id="posttitle">Posts:</div>
		 	
		 	<div class="post">
				<input type="textbox" id='inputPost'  placeholder="Type a new post here"></input>
				<input type="button" title="submit" name="submit" value="Submit"/>
			</div>
			
			<div class="post">
				<div class="postName">Aaron Bloom</div>
				<div class="postUser">@aaronlbloom</div>
				<div class="postDate">10/04/2012</div>
				<div class="postMessage">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.  .
				</div>
			</div>
			<div class="post">
				<div class="postName">Aaron Bloom</div>
				<div class="postUser">@aaronlbloom</div>
				<div class="postDate">10/04/2012</div>
				<div class="postMessage">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.  .
				</div>
			</div>
			<div class="post">
				<div class="postName">Aaron Bloom</div>
				<div class="postUser">@aaronlbloom</div>
				<div class="postDate">10/04/2012</div>
				<div class="postMessage">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.  .
				</div>
			</div>
			<div class="post">
				<div class="postName">Aaron Bloom</div>
				<div class="postUser">@aaronlbloom</div>
				<div class="postDate">10/04/2012</div>
				<div class="postMessage">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.  .
				</div>
			</div>
			<div>&nbsp;&nbsp;&nbsp;&nbsp;</div>
		</div>

		<div id='footer'></div>

</div>

</body>

</html>