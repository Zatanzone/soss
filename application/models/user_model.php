<?php
class User_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function checkSignIn($signin)
	{		
		$rs = $this->db->get_where('tb_user',array('EMAIL'=>$signin['email'],'PASSWORD'=>$signin['pwd']));
		
		if ($rs->num_rows() > 0){			
			$data['login'] = $rs->result_array();
			$this->session->set_flashdata('signin', '');
			return $data;
		}else{
			$data = false;
			$this->session->set_flashdata('signin', 'Email or Password is invalid!!');
			return $data;
		}
	
	}
	
	public function register($data){

		$insert = array(
			'EMAIL' => $data['email'],
			'NAME' => $data['name'],
			'PASSWORD' => $data['password'],
			'PHONE'=>$data['phone'],
			'IMG'=>$data['avatar']
		);
		
		$this->db->insert('tb_user',$insert);
		
		$rs = $this->db->get_where('tb_user',array('EMAIL'=>$data['email'],'PASSWORD'=>$data['password']));
		if ($rs->num_rows() > 0){
			$data['login'] = $rs->result_array();
			$this->Sess->setsession($data['login']);
		}
		redirect('main','refesh');
		exit();
	}
}
?>