<?php

class Model_workshop extends CI_Model
{
	public function load_workshops()
	{
		$this->db->order_by('workshop_date', 'desc');
        $query = $this->db->get('workshop');
        return $result = $query->result();
	}

	public function get_workshop_details($workshop_id)
	{
		$this->db->where('workshop_id',$workshop_id);
        $query = $this->db->get('workshop');
        return $query->row();
	}

	public function other_workshop_details($workshop_id)
	{
		$this->db->not_like('workshop_id', $workshop_id);
        $query = $this->db->get('workshop');
        return $result = $query->result();
	}
}
?>