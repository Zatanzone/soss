<?php
class Role_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	
	public function getRoleOption(){
		$query = $this->db->get('tb_role');
		
		$role = $query->result_array();
		return $option;
	}
	public function checkHasRole($pid){
		
		$this->db->select('TID');
		$this->db->from('tb_team');
		$this->db->where('PID', $pid);
		
		$query = $this->db->get();
		
		if ( $query->num_rows() > 1) {
			$chkRole = TRUE;
		}else {
			$chkRole = FALSE;
		}
		
		return $chkRole;
	}
	
	
}