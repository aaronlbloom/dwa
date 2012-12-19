<div id="wrapper" class="roundedbox"> 
 		<div id="side_wrapper">
			<div class="roundedbox" id='left'>
				<div class="post" id="posttitle">Main Options:</div>
				<br><br><br>
				<div class="submit"><a href="/tasks/add">Add a new Task</a></div>
				<br><br>
				(Future use / Not yet active:)<br><br>
				<div class="submit">Update Profile</div><br>
				<div class="submit">Maintain Support Tables</div><br>
				<br><br>
			</div>		 
		</div>
		<div class="roundedbox" id='right'>
			<div class="post" id="posttitle">My Tasks:</div>
			<? foreach($tasks as $task): ?>
				<div class="post">			
					<div class="postName"><a href="/tasks/view?input=<?=$task['task_header_id']?> "><?=$task['task_name']?> </div>
					<div class="postDate"><?=Time::display($task['created'])?></div>
					<br><br>
					<div class="postMessage"><?=$task['summary']?> </div>
				</div>
			<? endforeach; ?>
			<div>&nbsp;&nbsp;&nbsp;&nbsp;</div>
		</div>
		<div id='footer'></div>
</div>