<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('is_logged_in')==1){

			$data=array();
			$data_title=array(
				'title'=>'Profile Page'
				);

			$this->load->model('Model_profile');
			$user_info=$this->Model_profile->load_user_info();//to load personal info
			$data['name']=$user_info->name;
			$data['profile_pic']=$user_info->profile_pic;

			//Adding variables in session for code reusability
			$this->load->library('session');
			$this->session->set_userdata('user_id', $user_info->user_id);
			$this->session->set_userdata('name', $user_info->name);
			$this->session->set_userdata('profile_pic', $user_info->profile_pic);

			$limit=10; //Number of stacks to be loaded

			$page=1;

			//echo $page;
			
			$start = ($page * $limit) - $limit;//calcuating the starting stack

			//echo $start;

			$this->load->model('Model_stacks');
			$num_rows=$this->Model_stacks->get_stacks_num_rows();

			//echo $num_rows;

			if( $num_rows > ($page * $limit) )
			{
				$next = ++$page;
				$data['next']=$next;//passing this to view
			}

			

			$data['stacks']=$this->Model_stacks->load_stacks($limit, $start);//to load the stacks

			$this->load->view('user/includes/css_link', $data_title);
			$this->load->view('user/includes/header_inc', $data);
			$this->load->view('user/includes/sidebar', $data);
			$this->load->view('user/profile/view_feed',$data);
			$this->load->view('user/includes/js_link');

		}else{

			redirect('Error/access_denied');
		}
		
	}

	public function stacks($next)
	{
		if($this->session->userdata('is_logged_in')==1){

			$data=array();
			$data_title=array(
				'title'=>'Profile Page'
				);

			$this->load->model('Model_profile');
			$user_info=$this->Model_profile->load_user_info();//to load personal info
			$data['name']=$user_info->name;
			$data['profile_pic']=$user_info->profile_pic;

			//Adding variables in session for code reusability
			$this->load->library('session');
			$this->session->set_userdata('user_id', $user_info->user_id);
			$this->session->set_userdata('name', $user_info->name);
			$this->session->set_userdata('profile_pic', $user_info->profile_pic);

			$limit=10; //Number of stacks to be loaded

			$page=$next;

			//echo $page;
			
			$start = ($page * $limit) - $limit;//calcuating the starting stack

			//echo $start;

			$this->load->model('Model_stacks');
			$num_rows=$this->Model_stacks->get_stacks_num_rows();

			//echo $num_rows;

			if( $num_rows > ($page * $limit) )
			{
				$next = ++$page;
				$data['next']=$next;//passing this to view
			}

			

			$data['stacks']=$this->Model_stacks->load_stacks($limit, $start);//to load the stacks

			$this->load->view('user/includes/css_link', $data_title);
			$this->load->view('user/includes/header_inc', $data);
			$this->load->view('user/includes/sidebar', $data);
			$this->load->view('user/profile/view_feed',$data);
			$this->load->view('user/includes/js_link');

		}else{

			redirect('Error/access_denied');
		}
		
	}


	public function do_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '5000';
		$config['max_width']  = '5024';
		$config['max_height']  = '2768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			print_r($error);

			//$this->load->view('upload_form', $error);
		}
		else
		{
			$upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
			$file_name = $upload_data['file_name'];

			$this->load->model('Model_profile');
			if($this->Model_profile->add_uploaded_file($file_name)){

				redirect('Profile');
			}
		}
	}
}
