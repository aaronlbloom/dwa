 

 
<div id="wrapper" class="roundedbox"> 

 
		 
		<div class="roundedbox" id='right'>
		
			<div class="post" id="posttitle">Posts <?=$input?></div>
		 
		  
			
			<? foreach($posts as $post): ?>
			<div class="post">
				
				<img class="postAvatar" src="/avatars/aaronlbloom.jpg" />
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