<?php
class Role_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	
	public function getRoleOption(){
		$query = $this->db->get('tb_role');
		
		$role = $query->result_array();
// 		print_r($role);
// 		exit;
		
		
		return $option;
	}
	
	
}