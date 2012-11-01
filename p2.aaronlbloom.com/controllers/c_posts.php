<?php

class posts_controller extends base_controller {
	
		public function __construct(){
					parent::__construct();
			
			if(!$this->user){
				Router::redirect('/users/login');
				#die("Members Only.  <a href='/users/login'>Please Login</a>");
			}
			
		}
	public function hash(){
		 
		#function called to show a specific list of posts for a given hashtag
		$title = "for topic: #";
		$where = "select h.post_id from hashtags h where h.hashtag";
		
		#call generic routine for showing a specific list of posts:
		$this->view_specific($where, $title);
	}

public function mentions(){
	
		#function called to show a specific list of posts that mention a given user
		$title = "mentioning user: @";
		$where = "select m.post_id from mentions m, users u2 where m.user_id = u2.user_id and u2.user_name";

		#call generic routine for showing a specific list of posts:
		$this->view_specific($where, $title);
	}

public function view_specific($where=null, $title=null){
		#generic routine to show a list of posts for a specific reason	
		$input = $_GET['input'];
		if(!$this->user){
			$this->template->content = View::instance("v_user_login");
			$this->template->message = "Login is invalid, please try again.";
			
 	   	}else{
 	   		$this->template->content 		= View::instance("v_posts_specific");
			$this->template->message 	    = "<a href='/users'>Return to Main Page</a>";
			$this->template->logout 	    = "<a href='/users/logout'>Logout</a>";
  			 $this->template->content->input	= $title.$input;
 			 
 			
			#get the posts specific to this topic:
			
			$q = "select u.user_name, u.last_name, u.first_name, u.email, p.post, p.created, p.modified 
						from users u, posts p 
						where u.user_id = p.poster 
						and   p.post_id in (".$where." =  '".$input."')
					
						order by created desc";	
			
			$posts = DB::instance(DB_NAME)->select_rows($q);			
			$this->template->content->posts = $posts; 			
	 	   	
		}
			echo $this->template;
	}


	public function users(){
			
			$this->template->content = View::instance("v_posts_users");
			
			
			$q = "SELECT * FROM users";
			
			$users = DB::instance(DB_NAME)->select_rows($q);
			
			$this->template->content->users = $users;
			
			echo $this->template;
			
		}
		
	public function follow($user_id_followed) {
		
		# Prepare our data array to be inserted
		$data = Array(
			"created" => Time::now(),
			"user_id" => $this->user->user_id,
			"user_id_followed" => $user_id_followed
			);
		
		# Do the insert
		DB::instance(DB_NAME)->insert('users_users', $data);
	
		# Send them back
		Router::redirect("/users/profile");
	
	}

	public function unfollow($user_id_followed) {
	
		# Delete this connection
		$where_condition = 'WHERE user_id = '.$this->user->user_id.' AND user_id_followed = '.$user_id_followed;
		DB::instance(DB_NAME)->delete('users_users', $where_condition);
		
		# Send them back
		Router::redirect("/users/profile");
	
	}
			
 
	public function p_add() {
			# Set up the view
			#print_r($_POST);
			
			
			$_POST['created'] =  Time::now();
 			$_POST['modified'] = Time::now();
			$_POST['poster'] = $this->user->user_id;
			
			#Write Post to the Database
		    $post_id=   DB::instance(DB_NAME)->insert('posts', $_POST);
			#Call the parser to look for hashtags: 
			$_POST['post'] = $this->parse("#",$_POST['post'],$post_id);
			#Call the parser to look for mentions, and the 'reply_to' for the post
			$_POST['post'] = $this->parse("@",$_POST['post'],$post_id);
			#Update the Post record with new post, updated in the parser:
			DB::instance (DB_NAME)->update('posts',$_POST,"where post_id = '".$post_id."'");	
			
		   Router::redirect('/users/');
			
						
		}
		
		public function parse ($del,$post,$post_id){
			#loop through for each instance of the # mark in the post 		 
			$parse_occurances = substr_count($post,$del);
			$parse_end = 0;	 
			$post_new = $post;
			for($i=1; $i<=$parse_occurances;$i++) {
					if($parse_end<strlen($_POST['post'])){
					    #Start of the hashtag
					    $parse_start    = strpos($post,$del,$parse_end);
						#end of the hashtag
						$parse_end      = strpos($post," ",$parse_start);					
						#length of the hashtag value to grab:
					    $parse_length = $parse_end - $parse_start;
					    
						#account for odd situations that might force length to invalid values:
						if($parse_length > strlen($_POST['post']) OR ($parse_length <0) ){
							$parse_length = strlen($_POST['post']);
							$i++;
						}
						#grab the actual tag from the post using the substring					
						$parse_tag = substr($post,$parse_start,$parse_length);
						$parse_tag = substr($parse_tag,1,($parse_length-1));
						if($del=="#"){
							#update the post taggint the tag with a link:
					 		 $post_temp = "<a href='/posts/hash?input=".$parse_tag."'>".$parse_tag."</a>";
							 $post_new = str_replace($parse_tag,$post_temp,$post_new);
								
					 		 #store parsed tag with reference to this post into the db
					 		 $data = Array(
									"post_id" => $post_id,
									"hashtag" => $parse_tag,	 
							 );
							 # Do the insert
							 DB::instance(DB_NAME)->insert('hashtags', $data);
						}
						
						if($del=="@"){
							
							 
							$mention_user_id = 0;	
							$q = "select user_id from users where user_name = '".$parse_tag."'";	
							$mention_user_id = DB::instance(DB_NAME)->select_field($q);
 							#if this is the first iteration of the loop and you have found a 'mention' assume this is a reply to value
							if($i==1){
								 
								$_POST['reply_to'] = $mention_user_id;
							}
							if(!$mention_user_id==0){
								 
								#update the post taggint the tag with a link:
					 		    $post_temp = "<a href='/posts/mentions?input=".$parse_tag."'>".$parse_tag."</a>";
							    $post_new = str_replace($parse_tag,$post_temp,$post_new);
								
					 			#store hashtag with reference to this post into the db
					 			$data = Array(
									"post_id" => $post_id,
									"user_id" => $mention_user_id,
								 
								);
								# Do the insert
								DB::instance(DB_NAME)->insert('mentions', $data);
							}
						}
					}
			} 	 
			#return the updated post with tagged tags:
			return $post_new;		 
			
		}
		
		public function index(){
		  Router::redirect('/users/');
			
		}
	
}