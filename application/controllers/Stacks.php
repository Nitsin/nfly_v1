<?php

class Stacks extends CI_Controller{

	public function index($stack_name){

		if($this->session->userdata('is_logged_in')==1){

			$data_title=array(
				'title'=> $stack_name
				);

			$this->load->model('Model_stacks');
			$data['selected_stacks']=$this->Model_stacks->load_selected_stacks($stack_name);

			$data['name']=$this->session->userdata('name');
			$data['profile_pic']=$this->session->userdata('profile_pic');

			$this->load->view('user/includes/css_link', $data_title);
			$this->load->view('user/includes/header_inc',$data);
			$this->load->view('user/includes/sidebar',$data);
			$this->load->view('user/profile/selected_stacks',$data);
			$this->load->view('user/includes/js_link');

		}else{

			redirect('Error/access_denied');
		}


	}
}


?>