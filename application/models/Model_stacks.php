<?php

class Model_stacks extends CI_Model{


	public function get_stacks_num_rows()
	{
		$this->db->from('stacks');
		$query = $this->db->get();
		$rowcount = $query->num_rows();

		return $rowcount;
	}

	public function load_stacks($limit,$start){

        $this->db->order_by('upload_time', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('stacks');
        return $result = $query->result();
	}

	public function load_stacks_admin(){

        $this->db->order_by('upload_time', 'desc');
        $query = $this->db->get('stacks');
        return $result = $query->result();
	}

	public function load_selected_stacks($stack_name){

		$this->db->where('stack_name',$stack_name);
		$this->db->order_by('upload_time', 'desc');
        $query = $this->db->get('stacks');
        return $result = $query->result();

	}
}




?>