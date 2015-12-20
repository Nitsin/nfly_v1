<?php

class Model_users extends CI_Model{

	public function can_log_in(){

		$this->db->where('email',$this->input->post('email'));
		$this->db->where('password',md5($this->input->post('password')));
		$query=$this->db->get('users');

		if($query->num_rows()==1){

			return true;
		}else{

			return false;
		}
	}

	public function add_user(){

		$data=array(
			'name'=>$this->input->post('name'),
			'email'=>$this->input->post('email'),
			'password'=>$this->input->post('password'),
			'profile_pic'=>'profile_pic.jpg'
			);

		$query= $this->db->insert('users',$data);

		if($query){

			return true;

		}else{

			return false;
		}
	}

	public function emailAvailability($email)
	{
	    $this->db->where('email',$email);
	    $query  =   $this->db->get('users');
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
			$this->db->where('email',$email);
			$query2=$this->db->update('users',$data);

			if($query2){

				return true;
			}else{

				return false;
			}
		}else{

			return false;
		}
	}

	public function get_colleges() {
        $this->db->select('college_id, college_name'); //change this to the two main values you want to use
        $this->db->from('college_name');
        $query = $this->db->get();
        foreach($query->result_array() as $row){
            $data[$row['college_id']]=$row['college_name'];
        }
        return $data;
	}

	public function get_branch() {
        $this->db->select('branch_id, branch_name'); //change this to the two main values you want to use
        $this->db->from('branch_name');
        $query = $this->db->get();
        foreach($query->result_array() as $row){
            $data[$row['branch_id']]=$row['branch_name'];
        }
        return $data;
	}

	public function reg_add_info($college,$course,$branch,$year){

		//retrieve user_id

		 $this->db->where('email',$this->session->userdata('email'));
	     $query = $this->db->get('users');
	     if($query->num_rows == 1)
	     {
	        $query->row();
	        $data_id['user_id'] = $query->user_id;
	        $user_id=$data_id['user_id'];
	     }

		//add to database

		$data=array(
			'user_id'=>$user_id,
			'college'=>$college,
			'course'=>$course,
			'branch'=>$branch,
			'year'=>$year
			);

		$query= $this->db->insert('user_academic_info',$data);

		if($query){

			return true;

		}else{

			return false;
		}




	}

}



?>