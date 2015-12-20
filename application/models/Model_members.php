<?php

class Model_members extends CI_Model{

	public function can_log_in(){

		$this->db->where('member_email',$this->input->post('email'));
		$this->db->where('member_password',md5($this->input->post('password')));
		$query=$this->db->get('members');

		if($query->num_rows()==1){

			return true;
		}else{

			return false;
		}
	}

	public function load_member_info(){

		$this->db->where('member_email',$this->session->userdata('email'));
        $query = $this->db->get('members');
        return $query->row();
	}

	public function add_temp_user($key){

		$data=array(
			'email'=>$this->input->post('email'),
			'key'=>$key
			);

		$query= $this->db->insert('forgot_password',$data);

		if($query){

			return true;

		}else{

			return false;
		}


	}

	public function replace_password($key){

		$this->db->where('key',$key);
		$query=$this->db->get('forgot_password');

		if($query){

			$row=$query->row();
			$email=$row->email;
			$data=array(
				'email'=>$email,
				'password'=>md5($this->input->post('password'))
				);
			$this->db->where('member_email',$email);
			$query2=$this->db->update('members',$data);

			if($query2){

				return true;
			}else{

				return false;
			}
		}else{

			return false;
		}
	}

	public function get_stacks() {
        $this->db->select('stack_name'); 
        $this->db->from('stack_name');
        $query = $this->db->get();
        foreach($query->result_array() as $row){
            $data[$row['stack_name']]=$row['stack_name'];
        }
        return $data;
	}

	//to get details of selected stack to edit

	public function get_selected_stack($stack_id)
	{
		$this->db->where('news_stack_id',$stack_id);
		$query=$this->db->get('stacks');
		return $query->row();

	}

	public function upload_stacks($insert_data){

		$query= $this->db->insert('stacks',$insert_data);

		if($query){

			return true;

		}else{

			return false;
		}
	}

	public function update_stack($insert_data, $stack_id)
	{
		$this->db->where('news_stack_id',$stack_id);
		$query=$this->db->update('stacks',$insert_data);

		if($query)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function insert_workshop_details1($workshop_detail)
	{

		$query= $this->db->insert('workshop',$workshop_detail);

		if($query){

			return true;

		}else{

			return false;
		}


	}

	public function get_branches() {
        $this->db->select('branch_name'); 
        $this->db->from('branch_name');
        $query = $this->db->get();
        foreach($query->result_array() as $row){
            $data[$row['branch_name']]=$row['branch_name'];
        }
        return $data;
	}

	public function get_workshop_id($workshop_detail)
	{
		$this->db->select('workshop_id');
		$this->db->from('workshop');
		$this->db->where('workshop_name', $workshop_detail['workshop_name']);
		$this->db->where('workshop_company', $workshop_detail['workshop_company']);
		$this->db->where('workshop_date', $workshop_detail['workshop_date']);
		$this->db->where('venue', $workshop_detail['venue']);
		$query=$this->db->get();

		return $query->row('workshop_id');

	}

	public function workshop_suitable_for($data, $workshop_id)
	{
		$i=0;
		$size=count($data);

		
		for($i=0;$i<$size;$i++)
		{
			$insert_data=array(
				'workshop_id'=>$workshop_id,
				'branch_name'=>$data[$i]
				);

			$query= $this->db->insert('workshop_suitable_for',$insert_data);
			$i++;

		}

		return true;
		
	}

	public function insert_workshop_image($workshop_id, $file_name)
	{
		$insert_data=array('workshop_cover_image'=>$file_name);
		$this->db->where('workshop_id', $workshop_id);
		$query=$this->db->update('workshop', $insert_data); 

		if($query){

			return true;

		}else{

			return false;
		}

	}

	public function insert_workshop_desc($workshop_id, $workshop_desc)
	{
		$insert_data=array('workshop_desc'=>$workshop_desc);
		$this->db->where('workshop_id', $workshop_id);
		$query=$this->db->update('workshop', $insert_data); 

		if($query){

			return true;

		}else{

			return false;
		}

	}

	/*-----------------------------------Elibrary--------------------------------------*/

	public function insert_resource_to_elibrary($resource_data)
	{
		$query= $this->db->insert('elibrary',$resource_data);

		if($query){

			return true;

		}else{

			return false;
		}

	}

	/***************************************Event************************************/

	public function insert_event_data1($event_data)
	{
		$query= $this->db->insert('event',$event_data);

		if($query){

			return true;

		}else{

			return false;
		}

	}

	public function get_event_id($event_data)
	{
		$this->db->select('event_id');
		$this->db->from('event');
		$this->db->where('event_name', $event_data['event_name']);
		$this->db->where('event_organised_by', $event_data['event_organised_by']);
		$this->db->where('event_start_time', $event_data['event_start_time']);
		$this->db->where('event_type', $event_data['event_type']);
		$query=$this->db->get();

		return $query->row('event_id');

	}

	public function insert_event_data2($event_additional_data)
	{
		$query= $this->db->insert('event_desc',$event_additional_data);

		if($query){

			return true;

		}else{

			return false;
		}

	}
}
?>