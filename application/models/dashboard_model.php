<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_Model extends CI_Model
{ 	 
	public function getLang()
	{		 
		$query=$this->db->get('lang_state');
		return $query->result();		
	}
 
}
