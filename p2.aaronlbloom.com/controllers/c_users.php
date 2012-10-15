<?php

class users_controller extends base_controller {
	
	public function __construct(){
		parent::__construct();
		
	}
	
	public function index() {
 			$this->template->content = View::instance("v_welcome");
			echo $this->template;
		
	}
	
	
	public function signup() {
		echo "display the signup page";
	}
	
	public function login(){
		echo "display the login page";
		
	}
	
	public function logout(){
		echo "display the logout page";
	}
	
	public function profile($user_name=NULL){
	echo "this is my echo test:<br>";
	//If ($user_name == null){	
		//	echo "   This is the profile for No One";
 	//}else{
		echo "   This is the profile for ".$user_name;
	//}
	//-> template means instantiate the template file from the view folder
	// ->content is a way of passing a value into the content variable, which in the template file is the body
	// -> what is being passed in is another view file, it is a fragment of a file

	echo "<br>this is bringing in a template<br>";
		
	$this->template->content = View::instance("v_users_profile");
	
	$this->template->content->user_name = $user_name;
	
	$client_files = Array("/css/users/css","/js/users.js");
	
	$this->template->content->client_files = Utils::load_client_files($client_files);
	
	
	echo $this->template;
	
	
	 
	}
	
}
