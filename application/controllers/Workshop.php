<?php

class Workshop extends CI_Controller
{
	public function index()
	{
		if($this->session->userdata('is_logged_in'))
		{
			$data_title=array('title'=>'nFLY | Workshops');
			$data['name']=$this->session->userdata('name');
			$data['profile_pic']=$this->session->userdata('profile_pic');

			$this->load->model('Model_workshop');

			$data['workshop_info']= $this->Model_workshop->load_workshops();

			$this->load->view('user/includes/css_link', $data_title);
			$this->load->view('user/includes/header_inc', $data);
			$this->load->view('user/includes/sidebar', $data);
			$this->load->view('user/workshop/view_workshop',$data);
			$this->load->view('user/includes/js_link');

		}

		else
		{
			redirect('Error/access_Denied');
		}
	}

	public function details($workshop_id)
	{
		if($this->session->userdata('is_logged_in'))
		{
			$this->load->model('Model_workshop');
			$workshop_details=$this->Model_workshop->get_workshop_details($workshop_id);

			//details of workshop
			$data['workshop_name']=$workshop_details->workshop_name;
			$data['workshop_company']=$workshop_details->workshop_company;
			$data['workshop_date']=$workshop_details->workshop_date;
			$data['fees']=$workshop_details->workshop_fees;
			$data['workshop_cover_image']=$workshop_details->workshop_cover_image;
			$data['max_seats']=$workshop_details->max_seats;
			$data['venue']=$workshop_details->venue;
			$data['certification']=$workshop_details->certification;
			$data['workshop_desc']=$workshop_details->workshop_desc;
			$data['bg_color']=$workshop_details->bg_color;


			$this->load->model('Model_workshop');

			$data['other_workshop_details']=$this->Model_workshop->other_workshop_details($workshop_id); 
			
			$data_title=array('title'=>$workshop_details->workshop_name);
			$data['name']=$this->session->userdata('name');
			$data['profile_pic']=$this->session->userdata('profile_pic');

			$this->load->view('user/includes/css_link_boxed', $data_title);
			$this->load->view('user/includes/header_inc_boxed', $data);
			$this->load->view('user/workshop/show_workshop_detail', $data);
			$this->load->view('user/includes/js_link');

		}
		else
		{
			redirect('Error/access_denied');
		}
		
	}
}
?>