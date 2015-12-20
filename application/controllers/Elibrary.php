<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Elibrary extends CI_Controller
{
	public function index()
	{
		if($this->session->userdata('is_logged_in'))
		{
			$data_title=array('title'=>'nFLY | Elibrary');
			$data['name']=$this->session->userdata('name');
			$data['profile_pic']=$this->session->userdata('profile_pic');

			$this->load->model('Model_elibrary');

			$data['resource_info']= $this->Model_elibrary->load_resource();

			$this->load->view('user/includes/css_link', $data_title);
			$this->load->view('user/includes/header_inc', $data);
			$this->load->view('user/includes/sidebar', $data);
			$this->load->view('user/elibrary/view_elibrary',$data);
			$this->load->view('user/includes/js_link');

		}

		else
		{
			redirect('Error/access_Denied');
		}
	}
}

?>