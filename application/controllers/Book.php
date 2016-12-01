<?php
class Book extends CI_Controller {

	 var $template  = array();
   var $data      = array();
public function index($string = '')
	{
		$user=$this->session->get_userdata('user');
		if(isset($user['name']) && $user['name'] != '')
		{
			if(ENVIRONMENT=='development') $template['debug']=true;
			else $template['debug']=false;
			$data['base_url']=base_url();
			$this->load->view('book-appointment',$data);
		}
		else
		{
			//Kint::dump($user);
			redirect(base_url('user/login'));
			
		}
		
	}

public function timeslot($string = '')
	{
		$user=$this->session->get_userdata('user');
		if(isset($user['name']) && $user['name'] != '')
		{
			if(ENVIRONMENT=='development') $template['debug']=true;
			else $template['debug']=false;
			$this->load->view('time-slot');
		}
		else
		{
			//Kint::dump($user);
			redirect(base_url('user/login'));
			
		}
		
	}
	
}
?>
