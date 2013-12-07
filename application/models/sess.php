<?php
class Sess extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}	
	
	public function setsession($data)
	{
// 		print_r($data);
		
		foreach ($data as $r){
			$user_id = $r['UID'];
			$user_name=$r['NAME'];
			$user_email=$r['EMAIL'];
			$user_phone=$r['PHONE'];
		}

		$ar=array(
				'user_id'=>$user_id,
				'user_name'=>$user_name,
				'user_email'=>$user_email,
				'user_phone'=>$user_phone
		);
		$this->session->set_userdata($ar);
	}
	
	
	
}