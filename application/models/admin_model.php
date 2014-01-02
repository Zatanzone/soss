<?php
class Admin_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function checkSignIn($signin)
	{
		$rs = $this->db->get_where('tb_user',array('EMAIL'=>$signin['email'],'PASSWORD'=>$signin['pwd'],'STATUS'=>'A'));
	
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

	public function getuser(){
		
		$sql="select*from tb_user where STATUS != 'A' order by UID asc";
		
		$rs=$this->db->query($sql);
		
		$data['rs'] = $rs->result_array();
		
		return $data;
	}

	public function edituser($uid) {
	
		$user['STATUS']='Y';
		$this->db->where('UID', $uid);
		$this->db->update('tb_user', $user);
	}
	
	public function deleteuser($uid) {
	
		$user['STATUS']='N';
		$this->db->where('UID', $uid);
		$this->db->update('tb_user', $user);
	}
}
?>