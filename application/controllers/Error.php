<?php

class Error extends CI_Controller{

	public function index(){
		$this->load->access_denied();
	}

	public function access_denied(){

		$this->load->view('error_pages/includes/css_link');
		$this->load->view('error_pages/includes/header_inc');
		$this->load->view('error_pages/access_denied');
		$this->load->view('error_pages/includes/js_link');
	}
}



?>