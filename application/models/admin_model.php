<?php
class Admin_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getuser(){
		
		$sql="select*from tb_user order by UID asc";
		
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