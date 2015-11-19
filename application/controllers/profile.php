<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function index()
	{
		$this->load->view('user/includes/css_link');
		$this->load->view('user/includes/header_inc');
		$this->load->view('user/includes/sidebar');
		$this->load->view('user/profile/view_feed');
		$this->load->view('user/includes/js_link');
	}
}
