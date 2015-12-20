<?php

class Model_event extends CI_Model
{
	public function load_events()
	{
        $query = $this->db->get('event');
        return $result = $query->result();
	}

	public function get_event_details($event_id)
	{
		$this->db->where('event_id',$event_id);
        $query = $this->db->get('event');
        return $query->row();
	}

	public function get_event_long_details($event_id)
	{
		$this->db->where('event_id',$event_id);
        $query = $this->db->get('event_desc');
        return $query->row();
	}

	public function other_event_details($event_id)
	{
		$this->db->not_like('event_id', $event_id);
        $query = $this->db->get('event');
        return $result = $query->result();
	}

}

?>