<!DOCTYPE html>
<html>
<head>
	<title>TaskReq</title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	
	<!-- JS -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
				
	<!-- Controller Specific JS/CSS -->
	
	<link rel="StyleSheet" href="../css/p4.css" type="text/css">
	<script type="text/javascript" src="/js/p4.js"></script>
	<?php echo @$client_files; ?>
	
</head>

<body>	
		<div class="roundedbox" id='header' >
		
		<div id="title">
				TaskReq
		</div>
		<div class="tagline">
				A simple custom built task requirements solution
		</div>	
		<div id='footer'><a href='/index/help'>Help</a>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo @$message;?> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
			<div id="logout"><?php echo @$logout;?></div>
		</div>
	</div>
	 
	<?=$content;?> 

</body>
</html>