<div id="wrapper" class="roundedbox"> 
	<form method='POST' action='/tasks/<?php echo @$action;?>'>
		<div class="roundedbox" >
			<div class="post" id="posttitle">
				<!--Create a dynamic label and button at the type depending on whether the page is in change or view only mode -->
				 <?php echo @$caption?> a Task:<br><br>
				 <?php if($caption=="View"){?>
				 	<div id="button_left" class="submit"> <a href="/tasks/change?input=<?php echo @$tasks[task_header_id]?>">Change this Task</a></div>
				 <?php }?>
				 <?php if($caption=="Change"){?>
				 	<div id="button_left" class="submit"><a href="/tasks/view?input=<?php echo @$tasks[task_header_id]?>">View this Task</a>	</div>
				 <?php }?>
				 
				 <div id="button_right"> <?php if($caption!="View"){?><input type='submit' class="submit" value="Save your Changes"> <?php }?> </div>
			</div>
		
			<div class='content'>					
						
						<div class='output_header'>Task ID:		    </div><div class='output'> <input type='text' name='task_header_id' 	 	value="<?php echo @$tasks[task_header_id]?> " 	readonly></div>
						<br><br>
					 	<div class='output_header'>Task Name:		</div><div class='output'> <input type='text' required= “required” name='task_name' 		placeholder="Task Name" 	value="<?php echo @$tasks[task_name]?> " 		<?php echo @$readonly?>></div>
						<br><br>
						<div class='output_header'>Summary :		</div><div class='output'> <input type='text' required= “required” name='summary' 		    placeholder="Summary" 	value="<?php echo @$tasks[summary]?> " 		<?php echo @$readonly?>></div>
						<br><br>
						
						<?php if($caption=="View"){?>
					 			<div class='output_header'>Task Type:		</div><div class='output'> <input type='text' required= “required” name='task_type_id' 		placeholder="Task Type" 	value="<?php echo @$tasks[task_type_descr]?> " 	<?php echo @$readonly?>></div>
								<br><br> 
						 <?php }else{?>
								<div class='output_header'>Task Type:		</div><div class='output'>
																										<select name='task_type_id'>
																											<? foreach($task_types as $task_type): ?>
																												  <option 
																													  <?php if($caption=="Change"){
																													 	 if($task_type['task_type_id']==$tasks['task_type_id']){echo "selected";}	
																													  }?> 
																													  value="<?=$task_type['task_type_id']?>"><?=$task_type['task_type_descr']?></option>
																					 						<? endforeach; ?>
																										</select>
								</div>
								<br><br>
						<?php }?>
						
						
						<?php if($caption=="View"){?>
					 			<div class='output_header'>Change Type:		</div><div class='output'> <input  type='text' required= “required” name='change_type_id' 		placeholder="Change Type" 	value="<?php echo @$tasks[change_type_descr]?> " 	<?php echo @$readonly?>></div>
								<br><br> 
						<?php }else{?>
								<div class='output_header'>Change Type:		</div><div class='output'>
																									<select name='change_type_id'>
																										<? foreach($change_types as $change_type): ?>
																											  <option 
																												  <?php if($caption=="Change"){
																												 	 if($change_type['change_type_id']==$tasks['change_type_id']){echo "selected";}	
																												  }?> 
																												  value="<?=$change_type['change_type_id']?>"><?=$change_type['change_type_descr']?></option>
																				 						<? endforeach; ?>
																									</select>
							</div>
						 	<br><br>
						 <?php }?>
						
						<?php if($caption=="View"){?>
					 			<div class='output_header'>Status:		</div><div class='output'> <input type='text' required= “required” name='status_id' 		placeholder="Status" 	value="<?php echo @$tasks[status_descr]?> " 	<?php echo @$readonly?>></div>
								<br><br> 
						<?php }else{?>
								<div class='output_header'>Status:		</div><div class='output'>
																									<select name='status_id'>
																										<? foreach($status_types as $status_type): ?>
																											  <option 
																												  <?php if($caption=="Change"){
																												 	 if($status_type['status_id']==$tasks['status_id']){echo "selected";}	
																												  }?> 
																												  value="<?=$status_type['status_id']?>"><?=$status_type['status_descr']?></option>
																				 						<? endforeach; ?>
																									</select>
							</div>
						 	<br><br>
						 <?php }?>
						 
						 
	 
						<div class='output_header'>Description:		</div><div class='output'> <textarea class="descr" id='descr'   rows='6' required='required' name='description' 		placeholder='Description' 		<?php echo @$readonly?>><?php echo @$tasks[description]?></textarea></div>
					    <br><br>
					 	<div class='output_header'><?php echo @$custom_headers[custom_01]?>:   </div><div class='output'> <input type='text'  name='custom_01' 	placeholder="<?php echo @$custom_headers[custom_01]?>" 		value="<?php echo @$tasks[custom_01]?> " 			<?php echo @$readonly?>></div>
						<br><br>	
						<div class='output_header'><?php echo @$custom_headers[custom_02]?>:   </div><div class='output'> <input type='text'  name='custom_02'  placeholder="<?php echo @$custom_headers[custom_02]?>" 	value="<?php echo @$tasks[custom_02]?> " 		<?php echo @$readonly?>></div>
						<br><br>
						<div class='output_header'><?php echo @$custom_headers[custom_03]?>:   </div><div class='output'> <input type='text'  name='custom_03'  placeholder="<?php echo @$custom_headers[custom_03]?>" 		value="<?php echo @$tasks[custom_03]?> " 			<?php echo @$readonly?>></div>
						<br><br>
						<div class='output_header'><?php echo @$custom_headers[custom_04]?>:   </div><div class='output'> <input type='text'  name='custom_04'  placeholder="<?php echo @$custom_headers[custom_04]?>" 		value="<?php echo @$tasks[custom_04]?> " 			<?php echo @$readonly?>></div>
						<br><br>
						<div class='output_header'><?php echo @$custom_headers[custom_05]?>:   </div><div class='output'> <input type='text'  name='custom_05'  placeholder="<?php echo @$custom_headers[custom_05]?>" 		value="<?php echo @$tasks[custom_05]?> " 			<?php echo @$readonly?>></div>
						<br><br>
						<div class='output_header'><?php echo @$custom_headers[custom_06]?>:   </div><div class='output'> <input type='text'  name='custom_06' 	placeholder="<?php echo @$custom_headers[custom_06]?>" 		value="<?php echo @$tasks[custom_06]?> " 			<?php echo @$readonly?>></div>
						<br><br>
						<div class='output_header'><?php echo @$custom_headers[custom_07]?>:   </div><div class='output'> <input type='text'  name='custom_07' 	placeholder="<?php echo @$custom_headers[custom_07]?>" 		value="<?php echo @$tasks[custom_07]?> " 			<?php echo @$readonly?>></div>
						<br><br>
						<div class='output_header'><?php echo @$custom_headers[custom_08]?>:   </div><div class='output'> <input type='text'  name='custom_08' 	placeholder="<?php echo @$custom_headers[custom_08]?>" 		value="<?php echo @$tasks[custom_08]?> " 			<?php echo @$readonly?>></div>
						<br><br>
						<div class='output_header'><?php echo @$custom_headers[custom_09]?>:   </div><div class='output'> <input type='text'  name='custom_09' 	placeholder="<?php echo @$custom_headers[custom_09]?>" 		value="<?php echo @$tasks[custom_09]?> " 			<?php echo @$readonly?>></div>
						<br><br>
						<div class='output_header'><?php echo @$custom_headers[custom_10]?>:   </div><div class='output'> <input type='text'  name='custom_10' 	placeholder="<?php echo @$custom_headers[custom_10]?>" 		value="<?php echo @$tasks[custom_10]?> " 			<?php echo @$readonly?>></div>
						<br><br>
					
				
					<div class="footer"'>&nbsp;&nbsp;&nbsp;&nbsp;</div>	 
					<?php if($caption=="Add"){?>
		 				Further detail sections can be added to this task in change mode only once this initial header setup has been submitted. 
		 			<?php }?> 
				
					</div>	
			
					<div id='footer'></div>
	
	
		</div>
		<div>  
			<br>
			<!--This loops through and displays a passed array of possible 'section' views set from the tasks controller-->
			<? foreach($sections as $section): ?>
				<?=$section?>
			<? endforeach; ?>
			 
		</div>
		<!-- Below is a div where you can add new sections. The drop down box shows possible sectoins to add, added through javascript on choice, and inserted into this 'newsection' area just below-->
		<div id="newSection"></div>
		<div>
			 <?php if($caption=="Change"){?>
			 	<div class="roundedbox" >
					<div class='header'>Add a new detail section by selecting a section type:</div><br>
					<select name='addSection' id="addSection">
							<option value=0>Choose an option</option>
							<? foreach($task_detail_types as $task_detail_type): ?>
						    	<option  id="<?=$task_detail_type['task_detail_type_descr']?>" value="<?=$task_detail_type['task_detail_type_descr']?>"><?=$task_detail_type['task_detail_type_descr']?></option>
							<? endforeach; ?>
		 			</select>
		 			<div id='footer'></div>
	 			</div>
	 		<?}?> 
		</div>
		
	</form>		