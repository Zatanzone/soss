<?php
class Member_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function findBtKey($key){
		
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->like('NAME', $key);
		$this->db->or_like('EMAIL', $key);
		
		
		
		
		$query = $this->db->get();
		
		//echo $this->db->last_query();    
		return $query;
	}
	
}