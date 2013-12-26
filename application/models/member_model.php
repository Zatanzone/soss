<?php
class Member_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function findBtKey($key){
		
		$this->db->select('*');
		$this->db->from('tb_user');
		//$this->db->join('tb_team', 'tb_team.UID = tb_user.UID', 'left');
		$this->db->like('NAME', $key);
		$this->db->or_like('EMAIL', $key);
		//$this->db->where('tb_user.UID', null);
		
		$query = $this->db->get();
		//echo $this->db->last_query();    
		return $query;
	}
	public function findByProject($pid){
		$this->db->select('*');
		$this->db->from('tb_team');
		$this->db->join('tb_user', 'tb_user.UID = tb_team.UID');
		$this->db->join('tb_role', 'tb_role.RID = tb_team.RID');
		$this->db->where('tb_team.PID', $pid);
		
		$query = $this->db->get();
		$member = $query->result_array();
		//echo $this->db->last_query();
		
		return $member;
		
	}
	
}
