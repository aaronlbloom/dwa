<?php

class index_controller extends base_controller {

	public function __construct() {
		parent::__construct();
	} 
	
	/*-------------------------------------------------------------------------------------------------
	Access via http://yourapp.com/index/index/
	-------------------------------------------------------------------------------------------------*/
	public function index() {
		
		# Any method that loads a view will commonly start with this
		# First, set the content of the template with a view file
			#$this->template->content = View::instance('v_index_index');
			
		# Now set the <title> tag
			#$this->template->title = "Hello World";
	
		# If this view needs any JS or CSS files, add their paths to this array so they will get loaded in the head
			/*$client_files = Array(
						""
	                    );
	    
	    	$this->template->client_files = Utils::load_client_files($client_files);   
	      		
		# Render the view
			echo $this->template;
			*/
			$q     = "select count(*) from mentions";		
			$mentions = DB::instance(DB_NAME)->select_field($q);	
			 
			 	#store hashtag with reference to this post into the db
					 			$data = Array(
									"post_id" => "1",
									"user_id" => "1"
								 
								);
								# Do the insert
								DB::instance(DB_NAME)->insert('mentions', $data); 
		    
		if(!$this->user){
			$this->template->content = View::instance("v_users_login");
			$this->template->message = "DBNAME:".DB_NAME.", found mentions table count:".$mentions;
 	   	}else{
 	   					Router::redirect('/users/');

 	   	}
		
		echo $this->template;
	}
	
		public function status() {
		#check db access	
			echo "Check DB Access: ";
			$q     = "select count(*) from users";		
		
			$users = DB::instance(DB_NAME)->select_field($q);	
			echo "<br>";
			echo "connecting to users table... ";
			echo "usres found: ";
			echo $users;
			echo "<br>";
			
	}
	
	
	
		
} // end class
