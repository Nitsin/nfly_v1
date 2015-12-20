<?php

class Fest extends CI_Controller
{
	public function index()
	{
		if($this->session->userdata('is_logged_in'))
		{
			$data_title=array('title'=>'nFLY | Workshops');
			$data['name']=$this->session->userdata('name');
			$data['profile_pic']=$this->session->userdata('profile_pic');


			$this->load->view('user/includes/css_link_boxed', $data_title);
			$this->load->view('user/includes/header_inc_boxed', $data);
			$this->load->view('user/fest/view_fest',$data);
			$this->load->view('user/includes/js_link');

		}

		else
		{
			redirect('Error/access_Denied');
		}
	}

	
}
?>