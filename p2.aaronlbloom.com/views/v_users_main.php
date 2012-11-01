<div id="wrapper" class="roundedbox"> 

 		<div id="side_wrapper">
			<div class="roundedbox" id='left'>
				<div class="post" id="posttitle">Profile:</div>
				<br>
				<br>
				<br>
				<br>
					 
				<a href="/users/profile">(Update Profile)</a>
				<br>
				<br>
					 
				
				<img class="bioAvatar" src="/avatars/generic_avatar.png" /><br>
				<bold>User:</bold>     <?php echo @$user_data[user_name]?>  <br>
				<bold>Name:</bold>     <?php echo @$user_data[first_name]?> <? echo @$user_data[last_name]; ?> <br>
				<bold>Bio:</bold>      <?php echo @$user_data[bio]; ?> <br>
				<bold>Tweets:</bold>   <?php echo @$user_tweets; ?> <br>
				<bold>Mentions:</bold> <?php echo @$user_mentions; ?> <br>
				
			</div>
			
			<div class="roundedbox" id="left">
					<div class="post" id="posttitle">Top Hashtags:</div>
						<? foreach($hashtags as $hash): ?>
							<div class="post">
														 
								<div class="postName"><a href="/posts/hash?input=<?=$hash['hashtag']?>">#<?=$hash['hashtag']?></a> </div>
 								<div class="postDate"><?=$hash['count(*)']?> </div>
 
				 				<br>
								 
							</div>
						<? endforeach; ?>
			</div>
		</div>
		<div class="roundedbox" id='right'>
		
			<div class="post" id="posttitle">Posts:</div>
			<div class="post">
			<form method='POST' action='/posts/p_add'>
				<strong>New Post:</strong><br>
				<textarea  id="searchPost" name='post' placeholder="Type a new post"></textarea>
 
				<input type='submit'>

			</form>
		 </div>

			
			<? foreach($posts as $post): ?>
			<div class="post">
				
				<img class="postAvatar" src="/avatars/generic_avatar.png" />
				<div class="postName">@<?=$post['user_name']?> </div>
				<div class="postDate"><?=Time::display($post['created'])?></div>
				<br><br>
				<div class="postMessage">
								 <?=$post['post']?> 

				</div>
			</div>
			<? endforeach; ?>

			<div>&nbsp;&nbsp;&nbsp;&nbsp;</div>
		</div>

		<div id='footer'></div>

</div>