<?php

class lookup_controller extends base_controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {

		$this->template->content = View::instance("v_lookup");

		$client_files = Array(
			"/js/p3.js");

		$this->template->client_files = Utils::load_client_files($client_files);

		echo $this->template;

	}
	
public function p_lookup() {
		
	 
	 
		 echo "In Lookup: ";
		 echo $_POST['i_isbn']; 
}
					


}