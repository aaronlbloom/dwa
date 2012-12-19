<?php

class tasks_controller extends base_controller {
	
		public function __construct(){
					parent::__construct();
			
			if(!$this->user){
				Router::redirect('/users/login');
				#die("Members Only.  <a href='/users/login'>Please Login</a>");
			}
			
		}
	 
	public function view_specific($where=null, $title=null){
		#generic routine to show a list of tasks for a specific reason	
		$input = $_GET['input'];
		if(!$this->user){
			$this->template->content = View::instance("v_user_login");
			$this->template->message = "Login is invalid, please try again.";
			
 	   	}else{
 	   		$this->template->content 		= View::instance("v_tasks_specific");
			$this->template->message 	    = "<a href='/users'>Return to Main Page</a>";
			$this->template->logout 	    = "<a href='/users/logout'>Logout</a>";
  			 $this->template->content->input	= $title.$input;
 			 
 			
			#get the tasks specific to this topic:
			
			$q = "select u.user_name, u.last_name, u.first_name, u.email, p.post, p.created, p.modified 
						from users u, tasks p 
						where u.user_id = p.poster 
						and   p.post_id in (".$where." =  '".$input."')
					
						order by created desc";	
			
			$tasks = DB::instance(DB_NAME)->select_rows($q);			
			$this->template->content->tasks = $tasks; 			
			
			$this->template->content->content_detail = View::instance("v_tasks_detail");
	 	   	
		}
			echo $this->template;
	}

	public function users(){
			
			$this->template->content = View::instance("v_tasks_users");
			
			
			$q = "SELECT * FROM users";
			
			$users = DB::instance(DB_NAME)->select_rows($q);
			
			$this->template->content->users = $users;
			
			echo $this->template;
			
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
			$input = $_GET['input'];
		 
			$this->template->content = View::instance("v_tasks_modify");
			$this->template->content->t_detail_1=  View::instance("v_t_details");
						$this->template->content->readonly = $readonly;
			
	        $this->template->message 	    = "<a href='/users'>Return to Main Page</a>";
			$this->template->logout 	    = "<a href='/users/logout'>Logout</a>";
	        
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
			
			$q = "select * from task_detail_type";
			$task_detail_type_internal = DB::instance(DB_NAME)->select_rows($q);	
			
			$sections[0] = "";
					
					
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
			 
		    $q = "select * from custom_headers";
			$custom_headers = DB::instance(DB_NAME)->select_row($q);	
			$this->template->content->custom_headers = $custom_headers;
			
			
			$q = "select * from task_type";
			$task_types = DB::instance(DB_NAME)->select_rows($q);	
			$this->template->content->task_types = $task_types;
		
			
			
			$q = "select task_detail_type_id, task_detail_type_descr from task_detail_type where task_detail_type_id not in 
					(select  td.task_detail_type_id from task_header th, task_detail td, task_detail_type tdt
					   where td.task_header_id = th.task_header_id
					     and td.task_detail_type_id = tdt.task_detail_type_id
						 and th.task_header_id = '".$input."')";
			$task_detail_types = DB::instance(DB_NAME)->select_rows($q);
			 
 			$this->template->content->task_detail_types = $task_detail_types;
			
			
		   	$q = "select * from change_type";
			$change_types = DB::instance(DB_NAME)->select_rows($q);	
			$this->template->content->change_types = $change_types;
			
			$q = "select * from status";
			$status_types = DB::instance(DB_NAME)->select_rows($q);	
			$this->template->content->status_types = $status_types;
			
			
			
			
			
	}  
 
	public function p_add() {
			# Set up the view
			#print_r($_POST);
			
			
			$_POST['created'] =  Time::now();
 			$_POST['modified'] = Time::now();
			$_POST['user_id'] = $this->user->user_id;
			
			#Write Post to the Database
		    $post_id=   DB::instance(DB_NAME)->insert('task_header', $_POST);
		    
		    
		   Router::redirect('/users/');
			
						
		}
		
	 public function p_change() {
			# Set up the view
			//print_r($_POST);
 	 		
 	 	
			$_POST['modified'] = Time::now();
			$_POST['user_id'] = $this->user->user_id;
			
 			
			$q = "UPDATE task_header SET 
					
					task_name 			= '".$_POST['task_name']."', 
					summary 			= '".$_POST['summary']."',  
					task_type_id 		= '".$_POST['task_type_id']."', 
					change_type_id 		= '".$_POST['change_type_id']."', 
					status_id 			= '".$_POST['status_id']."', 
					description 		= '".$_POST['description']."', 
					custom_01 			= '".$_POST['custom_01']."', 
					custom_02 			= '".$_POST['custom_02']."', 
					custom_03			= '".$_POST['custom_03']."', 
					custom_04 			= '".$_POST['custom_04']."', 
					custom_05 			= '".$_POST['custom_05']."', 
					custom_06 			= '".$_POST['custom_06']."', 
					custom_07 			= '".$_POST['custom_07']."', 
					custom_08 			= '".$_POST['custom_08']."', 
					custom_09 			= '".$_POST['custom_09']."', 
					custom_10 			= '".$_POST['custom_10']."',
					modified            = '".$_POST['modified']."'				
					WHERE task_header_id = '".$_POST['task_header_id']."'
					";
		
			$response = DB::instance(DB_NAME)->query($q);	
			 
			$lines = $_POST['line'];
 	 	    $task_detail_descrs = $_POST['task_detail_descr'];
			$task_detail_type_ids = $_POST['task_detail_type_id'];
			
		 
 			foreach($lines as $key => $line){
 				
				$q = "UPDATE task_detail SET 
				task_detail_descr 			 = '".$task_detail_descrs[$key]."'
			  	where task_header_id 		 = '".$_POST['task_header_id']."'
			  	and   line          		 =   '".$lines[$key]."'
			  	and   task_detail_type_id    = '".$task_detail_type_ids[$key]."'
			  	";
		        $resonse = DB::instance(DB_NAME)->query($q);	
			  
			 }
			 
			 if (isset($_POST['new_detail_descr'])) {
			 	$new_detail_type = $_POST['new_detail_type'];
			 	$new_detail_descrs = $_POST['new_detail_descr'];
			 	
			 	foreach($new_detail_descrs as $key => $new_detail_descr){
					if($new_detail_descr!=""&$new_detail_descr!=null){
				 		$q = "select max(td.line) max_line from task_detail td, task_detail_type tdt 
				 			 where td.task_detail_type_id = tdt.task_detail_type_id
				 			 and   td.task_header_id =  '".$_POST['task_header_id']."'
				 			 and   tdt.task_detail_type_descr = '".$new_detail_type[$key]."'
				 			 
				 			 ";
						 
				 		//$q = "select count(1) from task_detail td";
				  	 
			        	$resp = DB::instance(DB_NAME)->select_row($q);	
						$next_line = $resp['max_line']	+ 1;		
					 
				 		$q = "select tdt.task_detail_type_id from task_detail_type tdt 
				 			 where  tdt.task_detail_type_descr ='".$new_detail_type[$key]."'
				 			 ";
						$resp = DB::instance(DB_NAME)->select_row($q);		 
				 		$type_id   = $resp['task_detail_type_id'];
					
								 	
			     		 print_r($next_line);
						 print_r($type_id);
						 print_r($new_detail_type[$key]);
						 print_r($new_detail_descr);
						 
						 $q = "INSERT into task_detail (task_header_id, task_detail_type_id, line, task_detail_descr, created, modified) values (
						 		".$_POST['task_header_id'].",".$type_id.",".$next_line.",'".$new_detail_descr."',".Time::now().",".Time::now().");";
												
			  			
		        			$resonse = DB::instance(DB_NAME)->query($q);	
			  
						 
					  
					  }
					
					
				}
		        //print_r($new_detail_type);
				}
		    Router::redirect('/tasks/view?input='.$_POST['task_header_id']);
			 			
		}

		public function p_delete() {
			$input = $_GET['task_id'];
			DB::instance(DB_NAME)->delete('task_detail', "WHERE task_detail_id = '".$input."'");
		    print_r($_GET['header_id']);
		    
			Router::redirect('/tasks/change?input='.$_GET['header_id']);
			
			
			
		}
		public function index(){
		  Router::redirect('/users/');
			
		}
	
}