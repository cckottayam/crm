<?php
class Calendar extends CI_Controller {

   var $template	= array();
   var $data		= array();
   var $page_id		= "calendar";

   
	public function index($string = '')
	{
		$user=$this->session->get_userdata('user');
		if(isset($user['name']) && $user['name'] != '')
		{
			if(ENVIRONMENT=='development') $template['debug']=true;
			else $template['debug']=false;
			$template['username']=$user['name'];
			$template['base_url']=base_url();
			$template['page_id']=$this->page_id;
			$data['header']=$this->load->view('template/header',$template,true);
			$data['left_menu']=$this->load->view('template/left_menu',$template,true);
			$data['top_nav']=$this->load->view('template/top_nav',$template,true);
			$data['footer']=$this->load->view('template/footer',$template,true);
	
			$this->load->view('calendar',$data);
		}
		else
		{
			//Kint::dump($user);
			redirect(base_url('user/login'));
			
		}
		
	}	
}
?>
