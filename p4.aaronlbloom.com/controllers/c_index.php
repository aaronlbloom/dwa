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
			$this->template->content = View::instance('v_users_login');
			
		# Now set the <title> tag
			$this->template->title = "P4 Proposal";
	
		# If this view needs any JS or CSS files, add their paths to this array so they will get loaded in the head
			$client_files = Array(
						"/css/p4.css","/css/poster.css"
	                    );
	    
	    	$this->template->client_files = Utils::load_client_files($client_files);   
 
			$q     = "select count(*) from users";		
		
			$users = DB::instance(DB_NAME)->select_field($q);	
			
		if(!$this->user){
		
			 
			$this->template->content = View::instance("v_users_login");
		 $this->template->message = "<--------------------First time using post-er, try clicking HELP";
		 
				 
 	   	}else{
 	   		 
	  		  Router::redirect('/');

 	   	}
		
		echo $this->template;
			
			
			

	}
		public function proposal() {

		$this->template->content = View::instance("v_proposal");
		$client_files = Array(
						 "../css/p4.css"
	                    );
				$this->template->client_files = Utils::load_client_files($client_files);   
	      		
		echo $this->template;

	}
	
 
	
		
} // end class
