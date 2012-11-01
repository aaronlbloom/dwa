<!DOCTYPE html>
<html>
<head>
	<title>Post-er</title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	
	<!-- JS -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
				
	<!-- Controller Specific JS/CSS -->
	<link rel="StyleSheet" href="../css/poster.css" type="text/css">
	<?php echo @$client_files; ?>
	
</head>

<body>	
		<div class="roundedbox" id='header' >

		<div id="title">
				Post-er
		</div>
		<div class="tagline">
				Post-er is a simple no-frills <STRONG>FREE</STRONG> micro blogging alternative for <strong>REAL</strong> people who refuse to have their messages controlled by the mainstream social media machine! 
		</div>	
		<div id='footer'><a href='/index/help'>Help</a>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo @$message;?> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
			<div id="logout"><?php echo @$logout;?></div>
		</div>
	</div>
	 
	<?=$content;?> 

</body>
</html>