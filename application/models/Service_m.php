<?php

//if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Service_m extends CI_Model {
	
	public function __construct()
    {
      $this->load->database();
    }	
	public function insert_service($datas){
				
		$query = $this->db->insert('service',$datas);
		$this->db->last_query();
		return $query;
	}
}
?>