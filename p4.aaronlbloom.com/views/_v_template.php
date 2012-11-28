<!DOCTYPE html>
<html>
<head>
	<title><?=@$title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	
	<!-- JS -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
	
   <!--<script src="http://malsup.github.com/jquery.form.js"></script> -->

	<!-- <link rel="stylesheet" href="css/jquery-ui-1.9.1.custom.css"> -->
	
 

 	<!-- Controller Specific JS/CSS -->
	<?php echo @$client_files; ?>
	
</head>

<body>	

	<?=$content;?> 

</body>
</html>