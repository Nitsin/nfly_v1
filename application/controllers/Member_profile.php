<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_profile extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('is_logged_in')==2){

			$data=array();
			$data_title=array(
				'title'=>'Members Page'
				);
			$this->load->model('Model_stacks');
			$this->load->model('Model_members');

			$data['stacks']=$this->Model_stacks->load_stacks_admin();//to load the stacks

			$member_info=$this->Model_members->load_member_info();//to load personal info
			$data['name']=$member_info->member_name;
			$data['profile_pic']=$member_info->member_profile_pic;

			$this->load->model('Model_members');
			$data['select_stack']=$this->Model_members->get_stacks();

			//Adding variables in session for code reusability
			$this->load->library('session');
			$this->session->set_userdata('user_id', $member_info->member_id);
			$this->session->set_userdata('name', $member_info->member_name);
			$this->session->set_userdata('profile_pic', $member_info->member_profile_pic);
			$this->session->set_userdata('member_type', $member_info->member_type);

			if($this->session->userdata('member_type')=='admin'){

				$this->load->view('members/admin/includes/css_link', $data_title);
				$this->load->view('members/admin/includes/header_inc', $data);
				$this->load->view('members/admin/includes/sidebar', $data);
				$this->load->view('members/admin/profile/view_feed',$data);
				$this->load->view('members/admin/includes/js_link');

			}

			

		}else{

			redirect('Error/access_denied');
		}
		
	}

	public function add_stacks(){

		if($this->session->userdata('is_logged_in')==2){

			$data_title=array('title'=>'Add Stack');
			$data['name']=$this->session->userdata('name');
			$data['profile_pic']=$this->session->userdata('profile_pic');

			$this->load->model('model_members');
			$data['select_stack']=$this->model_members->get_stacks();


			$this->load->view('members/admin/includes/css_link', $data_title);
			$this->load->view('members/admin/includes/header_inc', $data);
			$this->load->view('members/admin/includes/sidebar', $data);
			$this->load->view('members/admin/profile/display_add_stack_form',$data);
			$this->load->view('members/admin/includes/js_link');

		}else{

			redirect('Error/access_denied');
		}
	}

	public function do_upload(){

		if($this->session->userdata('is_logged_in')==2){

			$this->load->library('form_validation');
			$this->form_validation->set_rules('stack_publisher','Stack Publisher', 'required|trim');
			$this->form_validation->set_rules('stack_text', 'Stack Text','required|trim');
			$this->form_validation->set_rules('stack_link', 'Stack Link','required|trim');

			if($this->form_validation->run()){

				$config['upload_path'] = './dist/uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '5000';
				$config['max_width']  = '5024';
				$config['max_height']  = '2768';

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if($this->upload->do_upload('publisher_image')){

					$upload_data1 = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
					$file_name1 = $upload_data1['file_name'];

					$this->upload->initialize($config);
					if($this->upload->do_upload('stack_image')){

						$this->load->helper('date');//launching date helper
						$date = date('Y-m-d H:i:s');//setting the current date

						$upload_data2 = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
						$file_name2 = $upload_data2['file_name'];

						$insert_data=array(
							'stack_name'=>$this->input->post('stack_name'),
							'stack_publisher'=>$this->input->post('stack_publisher'),
							'publisher_image'=>$file_name1,
							'stack_text'=>$this->input->post('stack_text'),
							'stack_link'=>$this->input->post('stack_link'),
							'stack_image'=>$file_name2,
							'upload_time'=>$date,
							);
						$this->load->model('Model_members');

						if($this->Model_members->upload_stacks($insert_data)){

							$data_title=array('title'=>'Stack Uploaded!');
							$data=array();
							$data['name']=$this->session->userdata('name');
							$data['profile_pic']=$this->session->userdata('profile_pic');

							$this->load->view('members/admin/includes/css_link', $data_title);
							$this->load->view('members/admin/includes/header_inc', $data);
							$this->load->view('members/admin/includes/sidebar', $data);
							$this->load->model('model_members');
							$data['select_stack']=$this->model_members->get_stacks();
							$this->session->set_flashdata('msg','Stack posted successfully.');
							$this->load->view('members/admin/profile/display_add_stack_form',$data);
							$this->load->view('members/admin/includes/js_link');

						}else{
							echo "problem in model";
						}


					}else{
						echo "Error in file upload 1";
					}


				}else{
					echo "Error in file upload 2";
				}

			}else{

				echo "validation error";

			}

		}else{

			redirect('Error/access_denied');
		}
	}

	public function edit_stack($stack_id){

		if($this->session->userdata('is_logged_in')==2)
		{
			$data_title=array('title'=>'Edit Stack');
			$data['name']=$this->session->userdata('name');
			$data['profile_pic']=$this->session->userdata('profile_pic');

			$this->load->model('Model_members');
			$data['selected_stack']=$this->Model_members->get_selected_stack($stack_id);

			$data['select_stack']=$this->Model_members->get_stacks();

			$this->load->view('members/admin/includes/css_link', $data_title);
			$this->load->view('members/admin/includes/header_inc', $data);
			$this->load->view('members/admin/includes/sidebar', $data);
			$this->load->view('members/admin/profile/edit_stack',$data);
			$this->load->view('members/admin/includes/js_link');


		}
	}

	public function update_stack()
	{

		if($this->session->userdata('is_logged_in')==2){

			$this->load->library('form_validation');
			$this->form_validation->set_rules('stack_publisher','Stack Publisher', 'required|trim');
			$this->form_validation->set_rules('stack_text', 'Stack Text','required|trim');
			$this->form_validation->set_rules('stack_link', 'Stack Link','required|trim');

			if($this->form_validation->run()){

				$config['upload_path'] = './dist/uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '5000';
				$config['max_width']  = '5024';
				$config['max_height']  = '2768';

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if($this->upload->do_upload('publisher_image')){

					$upload_data1 = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
					$file_name1 = $upload_data1['file_name'];

					$this->upload->initialize($config);
					if($this->upload->do_upload('stack_image')){

						$upload_data2 = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
						$file_name2 = $upload_data2['file_name'];

						$insert_data=array(
							'stack_name'=>$this->input->post('stack_name'),
							'stack_publisher'=>$this->input->post('stack_publisher'),
							'publisher_image'=>$file_name1,
							'stack_text'=>$this->input->post('stack_text'),
							'stack_link'=>$this->input->post('stack_link'),
							'stack_image'=>$file_name2,
							);
						$stack_id=$this->input->post('stack_id');
						$this->load->model('Model_members');

						if($this->Model_members->update_stack($insert_data,$stack_id)){

							$data_title=array('title'=>'Stack Updated!');
							$data=array();
							$data['name']=$this->session->userdata('name');
							$data['profile_pic']=$this->session->userdata('profile_pic');

							$this->load->model('Model_stacks');
							$data['stacks']=$this->Model_stacks->load_stacks();

							$this->load->view('members/admin/includes/css_link', $data_title);
							$this->load->view('members/admin/includes/header_inc', $data);
							$this->load->view('members/admin/includes/sidebar', $data);
							$this->session->set_flashdata('msg','Stack updated successfully.');

							$this->load->view('members/admin/profile/view_feed',$data);
							$this->load->view('members/admin/includes/js_link');

						}else{
							echo "problem in model";
						}


					}else{
						echo "Error in file upload 2";
					}


				}else{
					echo "Error in file upload 1";
				}

			}else{

				echo "validation error";

			}

		}else{

			redirect('Error/access_denied');
		}
	}

	public function display_workshop_form1()
	{
		if($this->session->userdata('is_logged_in')==2)
		{
			$data_title=array('title'=>'Workshop Details | Step 1');
			$data['name']=$this->session->userdata('name');
			$data['profile_pic']=$this->session->userdata('profile_pic');

			$this->load->view('members/admin/includes/css_link', $data_title);
			$this->load->view('members/admin/includes/header_inc', $data);
			$this->load->view('members/admin/includes/sidebar', $data);
			$this->load->view('members/admin/profile/workshop/workshop_form1');
			$this->load->view('members/admin/includes/js_link.php');

		}
	}

	public function display_workshop_form2()
	{
		if($this->session->userdata('is_logged_in')==2)
		{
			$data_title=array('title'=>'Workshop Details | Step 2');
			$data['name']=$this->session->userdata('name');
			$data['profile_pic']=$this->session->userdata('profile_pic');

			$this->load->model('Model_members');

			$workshop_detail=array(
				'workshop_name'=>$this->input->post('workshop_name'),
				'workshop_company'=>$this->input->post('company'),
				'workshop_date'=>$this->input->post('date'),
				'workshop_fees'=>$this->input->post('fees'),
				'max_seats'=>$this->input->post('max_seats'),
				'venue'=>$this->input->post('venue'),
				'certification'=>$this->input->post('certification'),
				'bg_color'=>$this->input->post('bg_color')
				);

			if($this->Model_members->insert_workshop_details1($workshop_detail))
			{
				$this->load->model('model_members');
				$data['select_branch']=$this->model_members->get_branches();

				$this->load->model('model_members');
				$data['workshop_id']=$this->model_members->get_workshop_id($workshop_detail);

				$this->load->view('members/admin/includes/css_link', $data_title);
				$this->load->view('members/admin/includes/header_inc', $data);
				$this->load->view('members/admin/includes/sidebar', $data);
				$this->load->view('members/admin/profile/workshop/workshop_form2',$data);
				$this->load->view('members/admin/includes/js_link.php');
			}

			else
			{
				echo "query failed";
			}

			

		}
	}

	public function display_workshop_form3()
	{
		$data=$this->input->post('branch');
		$workshop_id=$this->input->post('workshop_id');

		$this->load->model('Model_members');
		if($this->Model_members->workshop_suitable_for($data, $workshop_id))
		{
			$config['upload_path'] = './dist/uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '5000';
			$config['max_width']  = '5024';
			$config['max_height']  = '2768';

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if($this->upload->do_upload('workshop_image'))
			{
				$upload_data1 = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
				$file_name = $upload_data1['file_name'];
				$this->load->Model('Model_members');

				if($this->Model_members->insert_workshop_image($workshop_id, $file_name))
				{
					$data_title=array('title'=>'Workshop Details | Step 3');
					$data['name']=$this->session->userdata('name');
					$data['profile_pic']=$this->session->userdata('profile_pic');
					$data['workshop_id']=$workshop_id;

					$this->load->view('members/admin/includes/css_link', $data_title);
					$this->load->view('members/admin/includes/header_inc', $data);
					$this->load->view('members/admin/includes/sidebar', $data);
					$this->load->view('members/admin/profile/workshop/workshop_form3',$data);
					$this->load->view('members/admin/includes/js_link.php');


					
				}


			}
			
		}
		else
		{
			echo "problems";
		}
	}

	public function workshop_submit()
	{
		if($this->session->userdata('is_logged_in'))
		{
			$this->load->model('Model_members');
			if($this->Model_members->insert_workshop_desc($this->input->post('workshop_id'), $this->input->post('workshop_desc')))
			{
				$data_title=array('title'=>'Workshop Details | Step 1');
				$data['name']=$this->session->userdata('name');
				$data['profile_pic']=$this->session->userdata('profile_pic');

				$this->load->view('members/admin/includes/css_link', $data_title);
				$this->load->view('members/admin/includes/header_inc', $data);
				$this->load->view('members/admin/includes/sidebar', $data);
				$this->session->set_flashdata('msg','Workshop updated successfully.');
				$this->load->view('members/admin/profile/workshop/workshop_form1');
				$this->load->view('members/admin/includes/js_link.php');

			}
		}
	}

	/*-------------------------Elibrary--------------------------------*/

	public function display_elibrary_form()
	{
		if($this->session->userdata('is_logged_in')==2)
		{
			$data_title=array('title'=>'Add Resource | Elibrary');
			$data['name']=$this->session->userdata('name');
			$data['profile_pic']=$this->session->userdata('profile_pic');

			$this->load->view('members/admin/includes/css_link', $data_title);
			$this->load->view('members/admin/includes/header_inc', $data);
			$this->load->view('members/admin/includes/sidebar', $data);
			$this->load->view('members/admin/profile/elibrary/elibrary_form');
			$this->load->view('members/admin/includes/js_link.php');

		}

	}

	public function add_resource_to_elibrary()
	{
		if($this->session->userdata('is_logged_in')==2)
		{
			$config['upload_path'] = './dist/uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '5000';
			$config['max_width']  = '5024';
			$config['max_height']  = '2768';

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if($this->upload->do_upload('resource_cover_image'))
			{
				$upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
				$file_name = $upload_data['file_name'];

				$resource_data=array(
					'resource_name'=>$this->input->post('resource_name'),
					'resource_type'=>$this->input->post('resource_type'),
					'resource_desc'=>$this->input->post('resource_desc'),
					'resource_link'=>$this->input->post('resource_download_link'),
					'resource_cover_image'=>$file_name,
					);

				$this->load->model('Model_members');

				if($this->Model_members->insert_resource_to_elibrary($resource_data))
				{
					//redirect to elibrary form
					$data_title=array('title'=>'Add Resource | Elibrary');
					$data['name']=$this->session->userdata('name');
					$data['profile_pic']=$this->session->userdata('profile_pic');

					$this->load->view('members/admin/includes/css_link', $data_title);
					$this->load->view('members/admin/includes/header_inc', $data);
					$this->load->view('members/admin/includes/sidebar', $data);
					$this->session->set_flashdata('msg','Resources updated successfully into Elibrary.');
					$this->load->view('members/admin/profile/elibrary/elibrary_form');
					$this->load->view('members/admin/includes/js_link.php');
				}
				else
				{
					echo "insert query failed";
				}

			}
			else
			{
				echo "Image upload failed";
			}

		}
	}

	/**********************************Event********************************/

	public function add_event()
	{
		if($this->session->userdata('is_logged_in')==2)
		{
			$data_title=array('title'=>'Event Details | Step 1');
			$data['name']=$this->session->userdata('name');
			$data['profile_pic']=$this->session->userdata('profile_pic');

			$this->load->view('members/admin/includes/css_link', $data_title);
			$this->load->view('members/admin/includes/header_inc', $data);
			$this->load->view('members/admin/includes/sidebar', $data);
			$this->load->view('members/admin/profile/event/event_form1');
			$this->load->view('members/admin/includes/js_link.php');

		}

	}

	public function add_event_form2()
	{
		if($this->session->userdata('is_logged_in')==2)
		{
			$config['upload_path'] = './dist/uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '5000';
			$config['max_width']  = '5024';
			$config['max_height']  = '2768';

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if($this->upload->do_upload('event_cover_image'))
			{
				$upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
				$file_name = $upload_data['file_name'];

				$event_data=array(
					'event_name'=>$this->input->post('event_name'),
					'event_organised_by'=>$this->input->post('event_organised_by'),
					'event_cover_image'=>$file_name,
					'event_bg_color'=>$this->input->post('event_bg_color'),
					'event_type'=>$this->input->post('event_type'),
					'event_start_time'=>$this->input->post('event_start_time'),
					'event_ticket_price'=>$this->input->post('event_ticket_price')
					);

				$this->load->model('Model_members');

				if($this->Model_members->insert_event_data1($event_data))
				{
					$data_title=array('title'=>'Event Details | Step 2');
					$data['name']=$this->session->userdata('name');
					$data['profile_pic']=$this->session->userdata('profile_pic');
					$this->load->model('model_members');
					$data['event_id']=$this->model_members->get_event_id($event_data);

					$this->load->view('members/admin/includes/css_link', $data_title);
					$this->load->view('members/admin/includes/header_inc', $data);
					$this->load->view('members/admin/includes/sidebar', $data);
					$this->load->view('members/admin/profile/event/event_form2',$data);
					$this->load->view('members/admin/includes/js_link.php');
				}
				else
				{
					echo "insert query failed";
				}

			}
			else
			{
				echo "Image upload failed";
			}

			

		}

	}

	public function event_submit()
	{
		$event_additional_data=array(
					'event_id'=>$this->input->post('event_id'),
					'event_venue'=>$this->input->post('event_venue'),
					'event_organiser_detail'=>$this->input->post('event_organiser_detail'),
					'event_details'=>$this->input->post('event_details'),
					'event_location'=>$this->input->post('event_location')
					);

		$this->load->model('Model_members');

		if($this->Model_members->insert_event_data2($event_additional_data))
		{

			$data_title=array('title'=>'Event Details | Step 1');
			$data['name']=$this->session->userdata('name');
			$data['profile_pic']=$this->session->userdata('profile_pic');

			$this->load->view('members/admin/includes/css_link', $data_title);
			$this->load->view('members/admin/includes/header_inc', $data);
			$this->load->view('members/admin/includes/sidebar', $data);
			$this->session->set_flashdata('msg','Event updated successfully.');
			$this->load->view('members/admin/profile/event/event_form1');
			$this->load->view('members/admin/includes/js_link.php');

		}

	}



	
}
?>