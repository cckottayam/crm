<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

		var $template  = array();
		var $data      = array();
		
	public function index($string = '')
	{
		//$this->load->helper('url');
		redirect(base_url('user/login'));
	}
	
	// login form
	public function login()
	{
		$this->load->library('form_validation');
			
		$user=$this->session->get_userdata('user');
		
		if(isset($user['name']) && $user['name'] != '')
			{
				redirect(base_url('dashboard'));

			}
		else{
			//$data['header']=$this->load->view('template/header','',true);
			//$data['footer']=$this->load->view('template/footer','',true);
			$data['base_url']=base_url();
			$data['form_action']=base_url('user/login_action');
			$data['register']=base_url('user/register');
			
			$this->load->view('login',$data);
		}
	}
	
	
	
	public function login_action()
	{
		$data=$this->input->post();
		if(isset($data['email'])&&isset($data['password'])){
			$this->load->model('users_m');
			$data['password']=$this->hash($data['password']);
			$users=$this->users_m->get_users($data);
			if(count($users)>0){
				$u=$users[0];
//				if($u->user_group==4)
//				{
					$user = array(
					'name' => $u->name,
					'email' => $u->email,
					'group' => 4,
					'id' => $u->id,
					'notifications' => $u->notifications,
					'loggedin' => TRUE,
					);
					$this->session->set_userdata('user', $user);
					$this->session->set_userdata($user);
					redirect(base_url('dashboard'));
//				}
//				else if($u->user_group==1){
//					$user = array(
//					'name' => $u->name,
//					'email' => $u->email,
//					'group' => 1,
//					'id' => $u->id,
//					'notifications' => $u->notifications,
//					'loggedin' => TRUE,
//					);
//					$this->session->set_userdata('user', $user);
//					$this->session->set_userdata($user);
//					redirect(base_url('admin'));
//				}
			}
			else
			{
				//print_r($users);
				redirect(base_url('user/login'));
			}
		}
		
	}
	
	function create()
	{
		if(isset($this->user['username']) && $this->user['username'] != '')
			redirect(site_url());
			

		//$data['header']=$this->load->view('template/header','',true);
		//$data['footer']=$this->load->view('template/footer','',true);
		$data['base_url']=base_url();
		$data['link']=base_url('user/register');
		$this->load->view('registerform',$data);

	}
	
		public function register()
		{
		$data=$this->input->post();
		if(isset($data)){
			$data['password']=$this->hash($data['password']);
			$this->load->model('users_m');
			$data['user_group']=4;
			$this->users_m->add($data);
			$user_id=$this->db->insert_id();
			$user = array(
				'name' => $data['name'],
				'email' => $data['email'],
				'group' => 4,
				'id' => $user_id,
				'loggedin' => TRUE,
			);
			$this->session->set_userdata('user', $user);
			$this->session->set_userdata($user);
			redirect(base_url('order'));
		}
	}
	
	public function profile()
	{
		$user=$this->session->get_userdata('user');
		if(isset($user['name']) && $user['name'] != '')
			{
				$key['logout']=base_url('user/logout');
				$key['profile']=base_url('user/profile');
				$template['key']=$key;
				$data['header']=$this->load->view('template/header',$template,true);
				$data['footer']=$this->load->view('template/footer','',true);
				$data['form_action']=base_url('user/changepass');
				$this->load->view('profile',$data);
			}
		else{
			redirect(base_url('user/login'));
			
		}		
	}
	
	public function changepass()
	{
		$user=$this->session->get_userdata('user');
		if(isset($user['name']) && $user['name'] != '')
			{
				$data['flashmsg']='yor password has successfully been reset ! ';
				$data['form_action']=base_url('user/changepass');
				$key['logout']=base_url('user/logout');
				$key['profile']=base_url('user/profile');
				$template['key']=$key;
				$data['header']=$this->load->view('template/header',$template,true);
				$data['footer']=$this->load->view('template/footer','',true);
				$data['form_action']=base_url('user/changepass');
				$this->load->view('profile',$data);
			}
		else{
			redirect(base_url('user/login'));
			
		}	
	}
	
	public function hash ($string)
	{
		return hash('sha512', $string);
	}
	
	
	public function logout()
	{

		$this->session->sess_destroy();
		//$this->session->unset_userdata('user');
		//$u=$this->session->get_userdata('user');
		//print_r($u);
		redirect(base_url('user/login'));
	}
	
}
?>