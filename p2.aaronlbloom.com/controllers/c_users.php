<?php

class users_controller extends base_controller {
	
	public function __construct(){
		parent::__construct();
	  
		
	}

	
	 
	public function index() {
	  
	  break;
		if(!$this->user){
		 
			$this->template->content = View::instance("v_users_login");
			$this->template->message = "Login is invalid, please try again.";
			echo $this->template;
 	   	}else{
 	   		 
 	   		$this->main_page();
 	   	}
		
		
	}
	

	public function main_page(){

	# a function to call the main poster page and pass into the page the required values. 
 			 
 			$this->template->content 		= View::instance("v_users_main");	
			$this->template->logout 	    = "<a href='/users/logout'>Logout</a>";
 			
 			#get user data for profile section
			$q = "select * from users where user_id = '".$this->user->user_id."'";		
			$user_data = DB::instance(DB_NAME)->select_row($q);	
 			$this->template->content->user_data = $user_data;
 		 
 			
			#get # of tweets this user has made, for profile
			$mentions = 0;
 			$q = "select count(*) from mentions m where m.user_id = '".$this->user->user_id."'";			
			$mentions = DB::instance(DB_NAME)->select_field($q);
			$this->template->content->user_mentions =  "<a href='\posts\mentions?input=".$this->user->user_name."'>".$mentions."</a>";
 			
			
			#get # of tweets this user has made, for profile
			$tweets = 0;
 			$q = "select count(*) from posts p where p.poster = '".$this->user->user_id."'";			
			$tweets = DB::instance(DB_NAME)->select_field($q);
			$this->template->content->user_tweets =  $tweets;
 			
			
			#get top hashtags
			 
 			$q = "select hashtag, count(*) from hashtags  group by hashtag order by 2 desc LIMIT 10";			
			$hashtags = DB::instance(DB_NAME)->select_rows($q);
			$this->template->content->hashtags =  $hashtags;
 			
			#get the posts this user has made, or follows
			$q = "select u.user_name, u.last_name, u.first_name, u.email, p.post, p.created, p.modified 
						from users u, posts p 
						where u.user_id = p.poster 
						and  ( p.poster = '".$this->user->user_id."'
						 or   p.reply_to = '".$this->user->user_id."'
						 or   p.poster in (select uu.user_id_followed
						 					from users_users uu
						 					where uu.user_id = '".$this->user->user_id."'))
						order by created desc";	
			
			$posts = DB::instance(DB_NAME)->select_rows($q);			
			$this->template->content->posts = $posts;
		 
 			echo $this->template;
	}

public function p_signup() {
		
	 
		 
		
		#Check to see if user already exists before setting them up:
		$q = "Select count(*)
			FROM users
			WHERE email = '".$_POST['email']."'
			or user_name = '".$_POST['user_name']."'
			";

		 $exists = DB::instance(DB_NAME)->select_field($q);
		 echo "Count:";
		 echo $exists;
		
		 if($exists==0){
			 
			echo "In Setup:";
					
			$_POST['password'] 			  = sha1(PASSWORD_SALT.$_POST['password']);
			$_POST['created']  	  = Time::now();
			$_POST['modified']  = Time::now();
			$_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string()); # This creates a random 'token'. The users initial email + the random # generator is just to create an extra 
			
			DB::instance (DB_NAME)->insert('users',$_POST);
			@setcookie("token", $_POST['token'], strtotime('+2 weeks'), '/');
			Router::redirect("/users");
		 }else{
		 	
		 	 echo "In Rediurect:";
			 $this->template->content = View::instance("v_users_login");	
			 $this->template->message 	    = "An account already exists with this email or user name, please try again";	
			 echo $this->template;
		 }
		 
	}
 
	public function login(){
		 
		$this->template->content = View::instance("v_users_login");
		
 	    echo $this->template;
	 
	}
	public function p_login(){
 
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
		$q = "Select token
			FROM users
			WHERE email = '".$_POST['email']."'
			AND password ='".$_POST['password']."'
			";
			 		 echo $q;
			#select field is a framework sql function to retrieve a single field form a db:
		 $token = DB::instance(DB_NAME)->select_field($q);
	 	 echo "<br>";
		 echo "token:".$token;
 			# Login successful, set cookie and reload page. If the cookie is not set the index of this controllor will fail the login
		  if($token)
		
			{ 			 
				@setcookie("token", $token, strtotime('+2 weeks'), '/');	 
 			}
		
			 Router::redirect("/users");
	 	}
	public function logout(){
 	    	
			
			if(!$this->user){
			$this->template->content = View::instance("v_users_login");
			
			echo $this->template;
			return false;
 	   	}
	# Generate and save a new token for next login
	$new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());
	
	# Create the data array we'll use with the update method
	# In this case, we're only updating one field, so our array only has one entry
	$data = Array("token" => $new_token);
	
	# Do the update
	DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");
	
	# Delete their token cookie - effectively logging them out
	setcookie("token", "", strtotime('-1 year'), '/');
	$this->template->content = View::instance("v_users_login");
	$this->template->message = "You have been logged out.";
	
 	echo $this->template;
	
	}
	

	public function profile($user_name=NULL){
		
		if(!$this->user){
			$this->template->content = View::instance("v_users_login");
			$this->template->message = "Login is invalid, please try again.";
			
 	   	}else{
 	   		$this->template->content = View::instance("v_users_profile");
			
			#Get the current users information stored in local variables shown in the view
			$this->template->content->user_name 	= $this->user->user_name;
 	   		$this->template->content->last_name 	= $this->user->last_name;
 			$this->template->content->first_name 	= $this->user->first_name;
			$this->template->content->email 		= $this->user->email;
		 	$this->template->content->bio 		    = $this->user->bio;
			$this->template->content->country 	    = $this->user->country;
			$this->template->content->website 	    = $this->user->website;	
			
					
			#Get a list of all users to show follow/unfollow list on profile page
			# in real app I would limit the # of users that would show on the page with a 'get more' option at the bottom, and a search/filter ability	
			$q = "SELECT * FROM users   where 
						user_id in (SELECT uu.user_id_followed 
					FROM users_users uu
					WHERE uu.user_id = (".$this->user->user_id."))
			 order by last_name asc";
			$users_followed = DB::instance(DB_NAME)->select_rows($q);
			$this->template->content->users_followed = $users_followed;
			
			$q = "SELECT * FROM users   where 
						user_id not in (SELECT uu.user_id_followed 
					FROM users_users uu
					WHERE uu.user_id =  (".$this->user->user_id."))
			 order by last_name asc";
			$users_not_followed = DB::instance(DB_NAME)->select_rows($q);
			$this->template->content->users_not_followed = $users_not_followed;
			 
					
			#Set a return option in the message header
			$this->template->message 	    = "<a href='/users'>Return to Main Page</a>";
			$this->template->logout 	    = "<a href='/users/logout'>Logout</a>";
			
			
 			
	 	   	}
					echo $this->template;
		
		 
	 
	}
	
		public function p_profile() {
			 
		
		$_POST['modified']  = Time::now();
		 
		DB::instance (DB_NAME)->update('users',$_POST,"where user_id = '".$this->user->user_id."'");	
		
	
		Router::redirect('/users/');
			
						
		}
	
}
