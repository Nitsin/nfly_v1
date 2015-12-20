<?php

class Manage extends CI_Controller{

	public function index(){

		$this->load->view('members/member_login');
	}

	public function login_validation(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('email','Email','required|trim|callback_validate_credentials');
		$this->form_validation->set_rules('password','Password','required|md5');

		if($this->form_validation->run()){

			$data=array(
				'email'=>$this->input->post('email'),
				'is_logged_in'=>2 //2 for admin
				);

			$this->session->set_userdata($data);
			redirect('member_profile');
		}else{
			$this->load->view('members/member_login');
		}

	}

	public function validate_credentials(){

		$this->load->model('model_members');

		if($this->model_members->can_log_in()){

			return true;

		}else{

			$this->form_validation->set_message('validate_credentials','Incorrect email/password');
			return false;

		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('manage');
	}

	public function forgot_password(){

		$this->load->view('members/member_forgot_password');
	}

	public function reset_password_validation(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('email','Email','required|trim|callback_email_available');

		if($this->form_validation->run()){

			$this->load->library('email', array('mailtype'=>'html'));
			$this->load->model('model_members');

			//create key
			$key=md5(uniqid());

			//enter data to temp db
			if($this->model_members->add_temp_user($key)){

				$this->email->from('support@nfly.in','nFLY');
				$this->email->to($this->input->post('email'));
				$this->email->subject("Password Reset");

				$message="<p>Password reset request.</p>";
				$message.="<p><a href=\"".base_url()."Manage/set_new_password/".$key."\">Click here</a> to reset your password.</p>";

				$this->email->message($message);

				if($this->email->send()){

					$this->session->set_flashdata('msg','Email sent successfully. Please check your inbox.');
					redirect('Manage/forgot_password');
				}
			}else{

				$this->session->set_flashdata('msg','Email could not be sent. Please try again.');
				redirect('Manage/forgot_password');
			}

			//send email

			//redirect & show msg
		}

		else{

			$this->load->view('forgot_password');
		}


	}

	public function set_new_password($key){


		$data=array('valid_key'=>$key);

		$this->load->view('members/set_new_password', $data);
		

	}

	public function receive_key(){


		$this->load->model('model_members');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('password','Password','required|trim');
		$this->form_validation->set_rules('cpassword','Password','required|trim|matches[password]');


		if($this->form_validation->run()){

			if($this->model_members->replace_password($this->input->post('key'))){

					$this->session->set_flashdata('msg','Password reset successful. Please login with your new password');
					redirect('Manage');//can login now
				}else{

					$this->session->set_flashdata('msg','Some error occured. Please try again.');
					redirect('Manage/forgot_password');//something went wrong, send mail again.
				}

		}


	}
}



?>