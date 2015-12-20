<?php

class Model_profile extends CI_Model{

	public function load_user_info(){

		$this->db->where('email',$this->session->userdata('email'));
        $query = $this->db->get('users');
        return $query->row();
	}

	public function load_profile_pic(){

		$this->db->where('user_id',$this->session->userdata('user_id'));
        $query = $this->db->get('users');
        return $query->row();


	}

	public function add_uploaded_file($file_name){

		$data=array('profile_pic'=>$file_name);
		$this->db->where('user_id',$this->session->userdata('user_id'));
		if($this->db->update('users',$data)){

			return true;
		}else{
			return false;
		}

	}
}



?>