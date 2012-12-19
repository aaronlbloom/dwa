<div id="wrapper" class="roundedbox"> 

 		 
		<div class="roundedbox" >
		
			<div class="post" id="posttitle">Add a Task:</div>
			 
			<div class="post">
				<form method='POST' action='/tasks/<?php echo @$action;?>'>
					
				    <input type='text' name='task_name' readonly placeholder="Task Name" value="<?php echo @$tasks[task_name]?> " >
					<br><br>
				 	<input type='text' required= “required” readonly name='task_type_id' placeholder="Task Type" value="<?php echo @$tasks[task_type_id]?> ">
					<br><br>
					<input type='text' required= “required” name='change_type_id' placeholder="Change Type"  value="<?php echo @$tasks[change_type_id]?> ">
					<br><br>
					<input type='text' required= “required” name='description' placeholder="Description" value="<?php echo @$tasks[description]?> ">
					<br><br>
				 	<input type='text' required= “required” name='ticket' placeholder="ticket" value="<?php echo @$tasks[ticket]?> ">
					<br><br>
					<input type='text' required= “required” name='report_nbr' placeholder="report_nbr" value="<?php echo @$tasks[report_nbr]?> ">
					<br><br>
					<input type='text' required= “required” name='system' placeholder="system" value="<?php echo @$tasks[system]?> ">
					<br><br>
					<input type='text' required= “required” name='analyst' placeholder="analyst" value="<?php echo @$tasks[analyst]?> ">
					<br><br>
					<input type='text' required= “required” name='users' placeholder="users" value="<?php echo @$tasks[users]?> ">
					<br><br>
					<input type='text' required= “required” name='status_id' placeholder="status_id" value="<?php echo @$tasks[status_id]?> ">
					<br><br>
					<input type='submit'>
	
				</form>			 
			</div>	
			 
			<div>&nbsp;&nbsp;&nbsp;&nbsp;</div>
		

		<div id='footer'></div>
		</div>

</div>