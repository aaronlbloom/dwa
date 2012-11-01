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
			/*
			$_POST['email'] 			  = "test@test.test";
			$_POST['password'] 			  = "test";
			$_POST['password'] 			  = sha1(PASSWORD_SALT.$_POST['password']);
			$_POST['created']  	  		  = Time::now();
			$_POST['modified']            = Time::now();
			$_POST['token']               = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string()); # This creates a random 'token'. The users initial email + the random # generator is just to create an extra 
			
			DB::instance (DB_NAME)->insert('users',$_POST);
			@setcookie("token", $_POST['token'], strtotime('+2 weeks'), '/');
			#Router::redirect("/users");
			
			 */
		    $this->template->content = View::instance("v_users_login");
			echo $this->template;
			
		if(!$this->user){
			echo "foo";
			 
			$this->template->content = View::instance("v_users_login");
			#$this->template->content = View::instance("v_index_index");
			 
 	   	}else{
 	   		echo "Bar";
			 
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
