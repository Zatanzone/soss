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
			return $data;
		}else{
			$data = false;
			return $data;
		}
	
	}
	
	public function register($data){
		print_r($data);
		echo "WOJJ";
		exit();
	}
}
?>