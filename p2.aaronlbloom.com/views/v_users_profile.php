<div id="wrapper" class="roundedbox"> 

	  <div class="roundedbox" id='left'>
		
				<div class="tagline">(Click a name to follow or unfollow)</div>
				  
			 	<form method='POST' action='/posts/p_follow'>
					<div class="post" id="posttitle">Following:</div>
					 					
					<br><br><br><br>
					
					<? foreach($users_followed as $user): ?>
					 
						<a href='/posts/unfollow/<?=$user['user_id']?>' title="Click to Un-Follow">@<?=$user['user_name']?></a>	
						 (<?=$user['first_name']?> <?=$user['last_name']?>)

						<br><br>
					
					<? endforeach; ?>
					
					<div class="post" id="posttitle"></div>
					<div class="post" id="posttitle">Not Following:</div>
					<br><br><br><br>
					
					<? foreach($users_not_followed as $user): ?>
					
						<a href='/posts/follow/<?=$user['user_id']?>'title="Click to Follow">@<?=$user['user_name']?></a>
						( <?=$user['first_name']?> <?=$user['last_name']?> )
						<br><br>
					
					<? endforeach; ?>
					 
				</form>
				
				<div class="post" id="posttitle"></div>
					
			</div>
			
		   <div class="roundedbox" id='right'>
		   	 <div class="post" id="posttitle">Update Profile Information:</div>
				<form method='POST' action='/users/p_profile'>
					<div class="profile">
			 	    	<div class="profileLabel"> User Name: </div>
			 			<div  	class="profileInput" ><?php echo @$user_name; ?> </div>
			 	    </div>
			 	    <div class="profile">
			 	    	<div class="profileLabel"> First Name: </div>
			 			<input type='text' 	class="profileInput"  name='first_name' 	value="<?php echo @$first_name; ?>" placeholder="first name">
			 	    </div>
			 	    <div class="profile">
			 			<div class="profileLabel"> Last Name: </div>
			 			<input type='text' 	class="profileInput"  	name='last_name'	required= “required”  value="<?php echo @$last_name; ?> " placeholder="last name"> 
					</div>
					 
					<div class="profile">
						<div class="profileLabel">  Email: </div>
						<input type='email'	 class="profileInput"  	name='email' 		required= “required”  value="<?php echo @$email; ?>" 		placeholder="email">  
					</div>
					<div class="profile">
						<div class="profileLabel"> Country: </div>
						<input type='text' 	class="profileInput"   	name='country' 		value="<?php echo @$country; ?>" 	placeholder="country">
					</div>
			 		 
			 		<div class="profile">
			 			<div class="profileLabel">Website: </div>
			 			<input type='text' 	class="profileInput"   	name='website' 		value="<?php echo @$website; ?>" 	placeholder="website">
			 		</div>
			 		<div class="profile">
			 			<div class="profileLabel" >Bio:  </div>
			 			<input type='text' class="profileInput"   	name='bio' 			value="<?php echo @$bio; ?>" 		placeholder="bio">
					</div>
					<div class="profile">
						<div class="profileLabel" >   </div>
	 					<input type='submit'>
					 </div>
				</form>			 
			</div>
		
	</div>

	<div id='footer'></div>

</div>
 