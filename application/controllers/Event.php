<?php

class Event extends CI_Controller
{
	public function index()
	{
		if($this->session->userdata('is_logged_in'))
		{
			$data_title=array('title'=>'nFLY | Events');
			$data['name']=$this->session->userdata('name');
			$data['profile_pic']=$this->session->userdata('profile_pic');

			$this->load->model('Model_event');

			$data['event_info']= $this->Model_event->load_events();

			$this->load->view('user/includes/css_link', $data_title);
			$this->load->view('user/includes/header_inc', $data);
			$this->load->view('user/includes/sidebar', $data);
			$this->load->view('user/event/view_event',$data);
			$this->load->view('user/includes/js_link');

		}

		else
		{
			redirect('Error/access_Denied');
		}
	}

	public function details($event_id)
	{
		if($this->session->userdata('is_logged_in'))
		{
			$this->load->model('Model_event');
			$event_details=$this->Model_event->get_event_details($event_id);

			//details of event
			$data['event_name']=$event_details->event_name;
			$data['event_organised_by']=$event_details->event_organised_by;
			$data['event_type']=$event_details->event_type;
			$data['event_cover_image']=$event_details->event_cover_image;
			$data['event_start_time']=$event_details->event_start_time;
			$data['event_ticket_price']=$event_details->event_ticket_price;

			$this->load->model('Model_event');
			$event_long_details=$this->Model_event->get_event_long_details($event_id);

			//Other event details

			
			$data['event_venue']=$event_long_details->event_venue;
			$data['event_organiser_detail']=$event_long_details->event_organiser_detail;
			$data['event_details']=$event_long_details->event_details;
			$data['event_location']=$event_long_details->event_location;

			// Loading event info for other than current event

			$this->load->model('Model_event');

			$data['other_event_details']=$this->Model_event->other_event_details($event_id);

			$data_title=array('title'=>$event_details->event_name);
			$data['name']=$this->session->userdata('name');
			$data['profile_pic']=$this->session->userdata('profile_pic');

			$this->load->view('user/includes/css_link_boxed', $data_title);
			$this->load->view('user/includes/header_inc_boxed', $data);
			$this->load->view('user/event/show_event_detail', $data);
			$this->load->view('user/includes/js_link');

		}
	}
}


?>