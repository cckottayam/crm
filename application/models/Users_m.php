<?php

//if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_m extends CI_Model {
	
	public function __construct()
        {
                $this->load->database();
        }
	
    public $_table_name     = 'category';
    public $_order_by       = 'id desc';
    public $_primary_key    = 'id';
	
	public function get_users($where_array='')
	{
				$where_array['virtual_delete']=0;
				$this->db->where($where_array);
	            $query = $this->db->get('users');
	            return $query->result();
	}
	
		public function get_admin($where_array='')
		{
					$where_array['virtual_delete']=0;
					$where_array['user_group']=1;
					$this->db->where($where_array);
		            $query = $this->db->get('users');
		            return $query->result();
		}
	
	public function add($val){
		$this->db->insert('users', $val);
	}
	function check_email($email){

		$this->db->where('email', $email);

		$query = $this->db->get('users');

		return $query->result_array();

	}
	public function forgot_verify($email){
		$this->db->where('email',$email);
		$query=$this->db->get('users');
		return $query->row_array();
	}
	public function forgot($u){
		$this->db->where('email',$u);
		$query=$this->db->get('users');
		return $query->result_array();
	}
	function get_adminp($aid){

		$this->db->where('id', $aid);

		$query = $this->db->get('users');

		return $query->result_array();

	}

	function update_changepassword_details($data,$id){

		$this->db->where('id', $id);

		$error=$this->db->update('users', $data); 

		return $error;

	}
	public function updatenotifications($id='',$reset=''){
		$where_array = array(
                'id'=>$id
            );
            if($reset=='')
           {
			$this->db->where($where_array);
			$query = $this->db->get('users');
			$users=$query->result();
			$notifcations=(int)$users[0]->notifications;
			$notifcations++;
           }
           else
           {
           	$notifcations=0;
           }
		
		$this->db->where($where_array);
		$this->db->update('users', array('notifications'=>$notifcations));

		return $notifcations;

	}
	
	
		public function blockByid($id,$blockstatus=''){
		$where_array['id']=$id;
		$this->db->where($where_array);

		$this->db->update('users', $blockstatus);

	}
}
?>