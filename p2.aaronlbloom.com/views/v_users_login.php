
	<div id="wrapper" class="roundedbox"> 
		<div class="roundedbox" id='right'>
		
			<div class="post" id="posttitle">Already a User, Login:</div>
		 	
		 	<div class="post">
				
				<form method='POST' action='/users/p_login'>
					<input type='text' required= “required” name='email' placeholder="Email Address">
					<br><br>
					<input type='password' required= “required” name='password' placeholder="Password">
					<br>
					<input type='submit'>
				</form>

			</div>

			<div class="post" id="posttitle">New to Post-er, Signup:</div>
 
			<div class="post">
				<form method='POST' action='/users/p_signup'>
					
				 	<input type='text' name='first_name' placeholder="First Name">
					<br><br>
				 	<input type='text' required= “required” name='last_name' placeholder="Last Name">
					<br><br>
					 <input type='text' required= “required” name='user_name' placeholder="User Name">
					<br><br>
					<input type='email' required= “required” name='email' placeholder="Email Address">
					<br><br>
				 	<input type='password' required= “required” name='password' placeholder="Password">
					<br>
					<input type='submit'>
	
				</form>			 
			</div>
			 
		</div>

		<div id='footer'></div>

</div>
 