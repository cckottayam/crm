<?php
class Settings extends CI_Controller {

   var $template  = array();
   var $data      = array();
   
	function __construct()
	{
		parent::__construct();	
		$this->load->model('service_m');
	}

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
	
			$this->load->view('settings',$data);
		}
		else
		{
			//Kint::dump($user);
			redirect(base_url('user/login'));			
		}
	}
	public function service()
	{
		$data['success']="";
		$data['error']="";
		$data['data']=""; 
		$user=$this->session->get_userdata('user');
		if(isset($user['name']) && $user['name'] != '')
		{
			if(ENVIRONMENT=='development') $template['debug']=true;
			else $template['debug']=false;
			$template['username']='Arathi';
			$template['base_url']=base_url();
			$data['header']=$this->load->view('template/header',$template,true);
			$data['left_menu']=$this->load->view('template/left_menu',$template,true);
			$data['top_nav']=$this->load->view('template/top_nav',$template,true);
			$data['footer']=$this->load->view('template/footer',$template,true);
	
			if($this->input->post('sub_save')){
			$stype 		=	$this->input->post("service_select");
			$sname		=	$this->input->post("txtsname");
			$sdetail	=	$this->input->post("txtsdetail");
			$slocation	=	$this->input->post("service_location");
			$sphone		=	$this->input->post("txtphoneno");
			$surl		=	$this->input->post("txturl");
			$sdurationh	=	$this->input->post("service_durationh");
			$sdurationm	=	$this->input->post("service_durationm");
			if($sdurationh)
			{
				$duration = $sdurationh*60;
			}
			if($sdurationm)
			{
				$duration=$duration+$sdurationm;
			}
			
			if($slocation == "c1")
			{
				$slocation = "Phone-You call the client";
			}
			else if($slocation == "c2")
			{
				$slocation = "Phone-Client calls you";
			}
			else if($slocation == "c3")
			{
				$slocation = "Online Meeting";
			}
			$dataser=array("service_type"=>$stype,"service_name"=>$sname,"service_detail"=>$sdetail,"phone"=>$sphone,"url"=>$surl,"location"=>$slocation,"duration"=>$duration);
			if($dataser)
			{
				$result=$this->service_m->insert_service($dataser);
			}
			if($result)
			{
				$data["success"]="Service Details Added Successfully...";
				
			}
			else
			{
				$data["error"]="Some error occured...";
			}
			
		  }
		  $this->load->view('service',$data);
		}
		else
		{
			//Kint::dump($user);
			redirect(base_url('user/login'));			
		}
	}
	public function ajax_servicedisp()
	{
		$disp = '<div id="service">
        	<div>
              <label>Service Name</label>
              <input type="text" name="txtsname"/> 
            </div>
           <div>
              <label>Service Details</label>
              <input type="text" name="txtsdetail"/> 
            </div>
            <div>
              <label>Location</label>
              <select name="service_location" id="service_location" class="form-control">
                  <option value="c1">Phone-You call the client</option>
                  <option value="c2">Phone-Client calls you</option>
                  <option value="c3">Online Meeting</option>
     		 </select>
            </div>
            <div id="servicesub1">
              <label>Your Phone Number</label>
              <input type="text" name="txtphoneno"/> 
            </div>
            <div id="servicesub2">
              <label>URL</label>
              <input type="text" name="txturl"/> 
            </div>
             <div>
              <label>Duration</label>
               <select name="service_durationh" id="service_durationh">';
			   		for($i=0;$i<=18;$i++)
					{
                    	$disp.="<option value='".$i."'>".$i." hours</option>";
					}
			 $disp.='</select>
               <label>and</label>
               <select name="service_durationm" id="service_durationm">';
			   		for($j=0;$j<60;$j=$j+5)
					{
                   $disp.="<option value='".$j."'>".$j." minutes</option>";
				    } 
			 $disp.='</select>
            </div>
            <div><input type="submit" name="sub_save" value="Save"/></div> ';                        
	echo $disp.'</div>';
	}
}