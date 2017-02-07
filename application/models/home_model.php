<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_Model extends CI_Model
{ 	 
	public function getLang()
	{		 
		$query=$this->db->get('lang_state');
		return $query->result();		
	}
	public function saveEmployee($data)
	{
		return $this->db->insert('employees',$data);
	}
	public function reportPrint($id)
	{
		$this->db->select('employees.*,lang_state.*');
		$this->db->from('employees');
		$this->db->where('lang_id',$id);
		$this->db->join('lang_state','lang_state.id = employees.lang_id');
		$query = $this->db->get();
		return $query->result();
	}
 
}
