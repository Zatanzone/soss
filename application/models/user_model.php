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
			
			$data = true;
			return $data;
		}else{
			$data = false;
			return $data;
		}
	
	}
}
?>