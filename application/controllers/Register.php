<?php

class Register extends CI_Controller{

	public function index(){

		$this->load->view('view_reg');
	}

	public function reg_validation(){

		$this->load->library('form_validation');

		$this->form_validation->set_rules('name','Name','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password','Password','required|trim|md5');

		$this->form_validation->set_message('is_unique',"Uh-oh! Email already exists! ):");

		if($this->form_validation->run()){
			
			$this->load->model('model_users');

			if($this->model_users->add_user()){

				$data=array(
				'email'=>$this->input->post('email'),
				'is_logged_in'=>1
				);

				$this->session->set_userdata($data);
				redirect('Profile');

			}else{

				redirect('Register');

			}

		}else{
			$this->load->view('view_reg');
		}
	}

	public function additional_info(){

		if($this->session->userdata('is_logged_in')==1){

			$this->load->view('error_pages/includes/css_link');
			$this->load->view('error_pages/includes/header_inc');
			$data = array();
	        $this->load->model('model_users');
	        $data['select_options'] = $this->model_users->get_colleges();
			
			$this->load->model('model_users');
	        $data['select_options_branch'] = $this->model_users->get_branch();

	        $this->load->view('additional_info', $data);
			$this->load->view('error_pages/includes/js_link');

		}else{

			redirect('Error/access_denied');
		}

		
	}

	public function update_additional_info(){

		$college=$this->input->post('college');
		$course=$this->input->post('course');
		$branch=$this->input->post('branch');
		$year=$this->input->post('year');

		$this->load->model('model_users');

		if($this->model_users->reg_add_info($college,$course,$branch,$year)){

			redirect('Profile');
		}
		else{

			$this->session->set_flashdata('msg','Some error occured. Please try again.');
					redirect('Regiter/additional_info');
		}
	}
}

?>