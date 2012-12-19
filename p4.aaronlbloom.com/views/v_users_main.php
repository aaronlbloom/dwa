<div id="wrapper" class="roundedbox"> 

 		<div id="side_wrapper">
			<div class="roundedbox" id='left'>
				<div class="post" id="posttitle">Quick Links:</div>
				<br>
				<br>
				<br>
				<a href="\tasks\add">Add a new Task</a>
				<br>
				<br>
					 
				 
				<br>
				<br>
					 
				
				  
				
			</div>
			
			<div class="roundedbox" id="left">
					<div class="post" id="posttitle">Something:</div>
						 
			</div>
		</div>
		<div class="roundedbox" id='right'>
		
			<div class="post" id="posttitle">Tasks:</div>
			<div class="post">
			 
		 </div>

			
			<? foreach($tasks as $task): ?>
			<div class="post">
				
			 
				<div class="postName"><a href="\tasks\view?input=<?=$task['task_header_id']?> "><?=$task['task_name']?> </div>
				<div class="postDate"><?=Time::display($task['created'])?></div>
				<br><br>
				<div class="postMessage">
								 <?=$task['summary']?> 

				</div>
			</div>
			<? endforeach; ?>

			<div>&nbsp;&nbsp;&nbsp;&nbsp;</div>
		</div>

		<div id='footer'></div>

</div>