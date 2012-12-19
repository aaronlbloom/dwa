<?php

class tasks_controller extends base_controller {
	
		public function __construct(){
					parent::__construct();
			
			if(!$this->user){
				Router::redirect('/users/login');
				#die("Members Only.  <a href='/users/login'>Please Login</a>");
			}
			
		}
	 
	
     	
	public function add(){
			
			$this->template->content = View::instance("v_tasks_modify");
	        $this->template->message 	    = "<a href='/users'>Return to Main Page</a>";
			$this->template->logout 	    = "<a href='/users/logout'>Logout</a>";
	       	$this->template->content->action 	    = "p_add";
		    $this->template->content->readonly = ' ';
		    $this->template->content->caption = 'Add';
		    $q = "select * from custom_headers";
							
								
			$custom_headers = DB::instance(DB_NAME)->select_row($q);	
			$this->template->content->custom_headers = $custom_headers;
						
			
			$q = "select * from task_type";
			$task_types = DB::instance(DB_NAME)->select_rows($q);	
			$this->template->content->task_types = $task_types;
			
			$q = "select * from change_type";
			$change_types = DB::instance(DB_NAME)->select_rows($q);	
			$this->template->content->change_types = $change_types;
			
			$q = "select * from status";
			$status_types = DB::instance(DB_NAME)->select_rows($q);	
			$this->template->content->status_types = $status_types;
			
			$sections[0] = "";
			$this->template->content->sections = $sections;
			
			
			echo $this->template;
			
		}
	public function change(){
	        $this->get_task_common("");
		
	         
	       	$this->template->content->action   = "p_change";
			$this->template->content->caption  = 'Change';
			
 	  	    
			echo $this->template;
			
		}
		public function view(){
		    $this->get_task_common("readonly");
 		
	        $this->template->content->caption = 'View';
			
			echo $this->template;
			
		}
	public function get_task_common($readonly){
		   //this common view is shared between the 'view' only and 'change' functions. these are the common tasks of getting the task. 
			
			$input = $_GET['input'];
			$this->template->content 			 = View::instance("v_tasks_modify");
			$this->template->content->t_detail_1 =  View::instance("v_t_details");
						$this->template->content->readonly = $readonly;
			
	        $this->template->message 	    = "<a href='/users'>Return to Main Page</a>";
			$this->template->logout 	    = "<a href='/users/logout'>Logout</a>";
	        
			//This sql gets the header information for the task:
	       	$q = "select t.* , tt.task_type_descr, ct.change_type_descr, st.status_descr
						from users u, task_header t, task_type tt, change_type ct, status st
						where u.user_id        = t.user_id 
						and   t.task_type_id   = tt.task_type_id
						and   t.change_type_id = ct.change_type_id
						and   t.status_id      = st.status_id
						and  u.user_id = '".$this->user->user_id."'
							and  t.task_header_id = '".$input."'
						order by created desc";	
			$tasks = DB::instance(DB_NAME)->select_row($q);			
			$this->template->content->tasks = $tasks;
			
			//Gets a list of task detail types. This is NOT for use to push to the screen but for use to loop through the task detail table:
			$q = "select * from task_detail_type";
			$task_detail_type_internal = DB::instance(DB_NAME)->select_rows($q);	
			
			//set the sections array with nothing in case no details are found for this task:
			$sections[0] = "";
					
			//Get task details array for this task 
			foreach($task_detail_type_internal as $key => $type){
				$view_name = "t_detail_".@$type[task_detail_type_id];
				$this->template->content->$view_name =  View::instance("v_t_details");
		    	$this->template->content->$view_name->readonly = $readonly;
		    
			    $q = "select td.*, tdt.task_detail_type_descr
							from users u, task_header t, task_detail td, task_detail_type tdt
							where u.user_id        = t.user_id 
							and   t.task_header_id   = td.task_header_id
							and   tdt.task_detail_type_id = td.task_detail_type_id
						
							and  u.user_id = '".$this->user->user_id."'
								and  t.task_header_id = '".$input."'
							 	and  td.task_detail_type_id = '".@$type[task_detail_type_id]."'
								
							order by td.task_detail_type_id, td.line";	
				$t_details = DB::instance(DB_NAME)->select_rows($q);	
				 
				 
			
				$this->template->content->$view_name->t_details = $t_details;
				if (count($t_details) > 0 ){
					$sections[] = $this->template->content->$view_name;
				}
			}
			  
			$this->template->content->sections = $sections;
			 
			//Get the list of headers for the 10 'custom' header fields (ie. custom_01, custom_02...)
		    $q = "select * from custom_headers";
			$custom_headers = DB::instance(DB_NAME)->select_row($q);	
			$this->template->content->custom_headers = $custom_headers;
			
			//Get the list of task types for displaying on the screen
			$q = "select * from task_type";
			$task_types = DB::instance(DB_NAME)->select_rows($q);	
			$this->template->content->task_types = $task_types;
		
			
			//Get the list of task detail type's for the drop down at the bottom of the screen that will let you create new sections. 
			// This special version of the query will exclude types already being used by this task enforcing the rule that you can only have one section per type per task
			$q = "select task_detail_type_id, task_detail_type_descr from task_detail_type where task_detail_type_id not in 
					(select  td.task_detail_type_id from task_header th, task_detail td, task_detail_type tdt
					   where td.task_header_id = th.task_header_id
					     and td.task_detail_type_id = tdt.task_detail_type_id
						 and th.task_header_id = '".$input."')";
			$task_detail_types = DB::instance(DB_NAME)->select_rows($q);
			$this->template->content->task_detail_types = $task_detail_types;
			
			//Get the list of change types for displaying on the screen
		   	$q = "select * from change_type";
			$change_types = DB::instance(DB_NAME)->select_rows($q);	
			$this->template->content->change_types = $change_types;
			
			//Get the list of statuses for displaying on the screen. 
			$q = "select * from status";
			$status_types = DB::instance(DB_NAME)->select_rows($q);	
			$this->template->content->status_types = $status_types;
	
	}  
 
	public function p_add() {
			# Function to add a new task to the database .
			#print_r($_POST);
			
			
			$_POST['created'] =  Time::now();
 			$_POST['modified'] = Time::now();
			$_POST['user_id']  = $this->user->user_id;
			
			#Write Post to the Database
		    $post_id=   DB::instance(DB_NAME)->insert('task_header', $_POST);
		    
		    
  		   Router::redirect('/users/');
			
						
		}
		
	 public function p_change() {
			# Function to change the values of a task modified on the screen
			//print_r($_POST);
 	 		
 	  
			$_POST['modified'] = Time::now();
			$_POST['user_id'] = $this->user->user_id;
			
 			//I used a custom query instead of the delivered 'Update' method to more easily seperate the different post values. The delivered update method
 			// can easily push the entire POST varaible to a db update. My page has a header section and an unknown number of update and/or inserts to detail sections
 			// it seemed easiest to break these up into distinct updates
 			// One issue i encountered was that only the delivered update method scrubs the input string data so I had to add the addslashes method around my strings manually
 			
			$q = "UPDATE task_header SET 
					
					task_name 			= '".addslashes($_POST['task_name'])."', 
					summary 			= '".addslashes($_POST['summary'])."',  
					task_type_id 		= '".$_POST['task_type_id']."', 
					change_type_id 		= '".$_POST['change_type_id']."', 
					status_id 			= '".$_POST['status_id']."', 
					description 		= '".addslashes($_POST['description'])."', 
					custom_01 			= '".addslashes($_POST['custom_01'])."', 
					custom_02 			= '".addslashes($_POST['custom_02'])."', 
					custom_03			= '".addslashes($_POST['custom_03'])."', 
					custom_04 			= '".addslashes($_POST['custom_04'])."', 
					custom_05 			= '".addslashes($_POST['custom_05'])."', 
					custom_06 			= '".addslashes($_POST['custom_06'])."', 
					custom_07 			= '".addslashes($_POST['custom_07'])."', 
					custom_08 			= '".addslashes($_POST['custom_08'])."', 
					custom_09 			= '".addslashes($_POST['custom_09'])."', 
					custom_10 			= '".addslashes($_POST['custom_10'])."',
					modified            = '".$_POST['modified']."'				
					WHERE task_header_id = '".$_POST['task_header_id']."'
					";
		
			$response = DB::instance(DB_NAME)->query($q);	
			 
			$lines = $_POST['line'];
 			  
  		    $task_detail_descrs=$_POST['task_detail_descr'];
			$task_detail_type_ids = $_POST['task_detail_type_id'];
			
		    //Update modified existing details:
 			foreach($lines as $key => $line){
 				
				$q = "UPDATE task_detail SET 
				task_detail_descr 			 = '".addslashes($task_detail_descrs[$key])."'
			  	where task_header_id 		 = '".$_POST['task_header_id']."'
			  	and   line          		 =   '".$lines[$key]."'
			  	and   task_detail_type_id    = '".$task_detail_type_ids[$key]."'
			  	";
		        $resonse = DB::instance(DB_NAME)->query($q);	
			  
			 }
			 //If new section detail data was added , inesrt it. 
			 if (isset($_POST['new_detail_descr'])) {
			 	$new_detail_type = $_POST['new_detail_type'];
			 	$new_detail_descrs = $_POST['new_detail_descr'];
			 	
			 	foreach($new_detail_descrs as $key => $new_detail_descr){
					if($new_detail_descr!=""&$new_detail_descr!=null){
				 		//Get the next line number on the detail table for this task in preperation for the insert:	
				 		$q = "select max(td.line) max_line from task_detail td, task_detail_type tdt 
				 			 where td.task_detail_type_id = tdt.task_detail_type_id
				 			 and   td.task_header_id =  '".$_POST['task_header_id']."'
				 			 and   tdt.task_detail_type_descr = '".addslashes($new_detail_type[$key])."'
				 			 
				 			 ";
						 
										 	 
			        	$resp = DB::instance(DB_NAME)->select_row($q);	
						$next_line = $resp['max_line']	+ 1;		
					 	
						
				 		$q = "select tdt.task_detail_type_id from task_detail_type tdt 
				 			 where  tdt.task_detail_type_descr ='".$new_detail_type[$key]."'
				 			 ";
						$resp = DB::instance(DB_NAME)->select_row($q);		 
				 		$type_id   = $resp['task_detail_type_id'];
					
								 	
			     		// print_r($next_line);
						// print_r($type_id);
						// print_r($new_detail_type[$key]);
						// print_r($new_detail_descr);
	         			
	         			//Insert new detail record to the detal table
						 $q = "INSERT into task_detail (task_header_id, task_detail_type_id, line, task_detail_descr, created, modified) values (
						 		".$_POST['task_header_id'].",".$type_id.",".$next_line.",'".addslashes($new_detail_descr)."',".Time::now().",".Time::now().");";
												
		        		 $resonse = DB::instance(DB_NAME)->query($q);						  
					  }	
				}
		       
				}
		    Router::redirect('/tasks/view?input='.$_POST['task_header_id']);
			 			
		}

		public function p_delete() {
			//Function to delete a section detail record. 
			$input = $_GET['task_id'];
			DB::instance(DB_NAME)->delete('task_detail', "WHERE task_detail_id = '".$input."'");
		    print_r($_GET['header_id']);
		    
			Router::redirect('/tasks/change?input='.$_GET['header_id']);
			
			
			
		}
		public function index(){
		  Router::redirect('/users/');
			
		}
	
}