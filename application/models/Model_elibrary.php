<?php 

class Model_elibrary extends CI_Model
{
	public function load_resource()
	{
        $query = $this->db->get('elibrary');
        return $result = $query->result();
	}
}


?>