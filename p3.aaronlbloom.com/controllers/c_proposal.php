<?php

class proposal_controller extends base_controller {

	public function __construct() {
		parent::__construct();
	}

 public function index() {

		$this->template->content = View::instance("v_proposal");
		$client_files = Array(
						 "../css/p3.css"
	                    );
				$this->template->client_files = Utils::load_client_files($client_files);   
	      		
		echo $this->template;

	}
   
}