<?php
class Dashboard extends CI_Controller {

	 var $template  = array();
   var $data      = array();
public function index($string = '')
	{
		$user=$this->session->get_userdata('user');
		if(isset($user['name']) && $user['name'] != '')
		{
			if(ENVIRONMENT=='development') $template['debug']=true;
			else $template['debug']=false;
			$template['username']='Abin';
			$template['base_url']=base_url();
			$data['header']=$this->load->view('template/header',$template,true);
			$data['left_menu']=$this->load->view('template/left_menu',$template,true);
			$data['top_nav']=$this->load->view('template/top_nav',$template,true);
			$data['footer']=$this->load->view('template/footer',$template,true);
	
			$this->load->view('dashboard',$data);
		}
		else
		{
			//Kint::dump($user);
			redirect(base_url('user/login'));
			
		}
		
	}
	
}
?>
