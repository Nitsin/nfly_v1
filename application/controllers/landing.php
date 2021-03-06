<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('is_logged_in')){
			redirect('profile');

		}else{
			$this->load->view('view_landing');
		}
		
	}
	

	public function login_validation(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('email','Email','required|trim|callback_validate_credentials');
		$this->form_validation->set_rules('password','Password','required|md5');

		if($this->form_validation->run()){

			$data=array(
				'email'=>$this->input->post('email'),
				'is_logged_in'=>1
				);

			$this->session->set_userdata($data);
			redirect('Profile');
		}else{
			$this->load->view('view_landing');
		}

	}

	public function validate_credentials(){

		$this->load->model('model_users');

		if($this->model_users->can_log_in()){

			return true;

		}else{

			$this->form_validation->set_message('validate_credentials','Incorrect email/password');
			return false;

		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('Landing');
	}

	public function forgot_password(){

		$this->load->view('forgot_password');
	}

	public function reset_password_validation(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('email','Email','required|trim|callback_email_available');

		if($this->form_validation->run()){

			$this->load->library('email', array('mailtype'=>'html'));
			$this->load->model('model_users');

			//create key
			$key=md5(uniqid());

			//enter data to temp db
			if($this->model_users->add_temp_user($key)){

				$this->email->from('support@nfly.in','nFLY');
				$this->email->to($this->input->post('email'));
				$this->email->subject("Password Reset");

				$message="<p>Password reset request.</p>";
				$message.="<p><a href=\"".base_url()."Landing/set_new_password/".$key."\">Click here</a> to reset your password.</p>";

				$this->email->message($message);

				if($this->email->send()){

					$this->session->set_flashdata('msg','Email sent successfully. Please check your inbox.');
					redirect('Landing/forgot_password');
				}
			}else{

				$this->session->set_flashdata('msg','Email could not be sent. Please try again.');
				redirect('Landing/forgot_password');
			}

			//send email

			//redirect & show msg
		}

		else{

			$this->load->view('forgot_password');
		}


	}

	public function email_available(){

	    $this->load->model('model_users');
	    $result =   $this->model_users->emailAvailability($this->input->post('email'));
	    if ($result)
	    {
	        
	        return True;
	    }else{

	    	$this->form_validation->set_message('email_available', 'The email does not exist');
	        return False;
	    }
	}
	
	public function set_new_password($key){


		$data=array('valid_key'=>$key);

		$this->load->view('set_new_password', $data);
		

	}

	public function receive_key(){


		$this->load->model('model_users');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('password','Password','required|trim');
		$this->form_validation->set_rules('cpassword','Password','required|trim|matches[password]');


		if($this->form_validation->run()){

			if($this->model_users->replace_password($this->input->post('key'))){

					$this->session->set_flashdata('msg','Password reset successful. Please login with your new password');
					redirect('Landing');//can login now
				}else{

					$this->session->set_flashdata('msg','Some error occured. Please try again.');
					redirect('Landing/forgot_password');//something went wrong, send mail again.
				}

		}


	}
}
