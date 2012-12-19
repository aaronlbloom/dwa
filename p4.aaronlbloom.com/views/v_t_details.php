 <!--This 'details' view is a sub view of tasks_modify view. The tasks modify view shows only the 'header' section while this sub view shows pre-existing detail sections. -->
		<div class="roundedbox" >
			<div class="output_header" >
				 	<? foreach($t_details as $t_detail): ?>
						<?php echo @$t_detail[task_detail_type_descr]?>: <br><br>
						<?php break; ?>
					<? endforeach; ?>
			 </div>
			<div class='content'>
					<? foreach($t_details as $t_detail): ?>
						<input  type="hidden"   name='task_detail_type_id[]'	value="<?php echo @$t_detail[task_detail_type_id]?>"></input>
						<input  type="hidden"   name='line[]'					value="<?php echo @$t_detail[line]?>">				 </input>

				 		<div class='output_header'> <?php echo @$t_detail[line]?>	</div><div class='output'> <textarea type='text'   name='task_detail_descr[]'	value="<?php echo @$t_detail[task_detail_descr]?>" 		<?php echo @$readonly?>><?php echo @$t_detail[task_detail_descr]?></textarea>
					 		<?php if($readonly!="readonly"){?>
								<a href="/tasks/p_delete?task_id=<?php echo @$t_detail[task_detail_id]?>&header_id=<?php echo @$t_detail[task_header_id]?>"><img class="delete"  id="<?php echo @$t_detail[task_detail_id]?>" src='/img/delete.jpg' height="18" width="18"></a>
							<?}?>
						</div>
						<br><br>
					<? endforeach; ?>
					
					<?php if($readonly!="readonly"){?>
						<div class="<?php echo @$t_detail[task_detail_type_descr]?>" id="<?php echo @$t_detail[task_detail_type_descr]?>"></div>
						<input class="addLine" type="button" name="123" id="<?php echo @$t_detail[task_detail_type_descr]?>" value="Add a Line">
					<?}?>
					<div class="footer"'>&nbsp;&nbsp;&nbsp;&nbsp;</div>	 
			</div>	
			<div id='footer'></div>
		</div>
 