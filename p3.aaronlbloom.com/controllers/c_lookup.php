<?php

class lookup_controller extends base_controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		
		$this->template->content = View::instance("v_lookup");

		$client_files = Array(
						"/js/p3.js","/js/convert.js","/css/p3.css"
	                    );
		$this->template->client_files = Utils::load_client_files($client_files);

		echo $this->template;

	}
   
}