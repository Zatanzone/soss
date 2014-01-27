<?php
class Plan_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}
	
	public function findLastTask($pid){
		
		// select MAX(ENDDATE) as last_date
		$this->db->select_max('ENDDATE', 'last_date');
		$this->db->where('PID', $pid);
		$query = $this->db->get('tb_plan');
		
		return $query->result_array();
		//echo $this->db->last_query();
		//exit();
	}
	
	public function getTaskList($pid){
		$query = $this->db->get_where('tb_plan', array('PID' => $pid)/*, $limit, $offset*/);
		if ($query->num_rows() > 0) 
			return $query->result_array();
		else
			return false;
		
	}
	
	public function save($data){
		if (isset($data)) {
			if ($this->db->insert('tb_plan',$data)) 
				return true;
			else return false;
		}
	}
	
	public function getDocName($did){
		$this->db->select('tb_document.DOCUMENT');
		$this->db->from('tb_workproduct');
		//$this->db->join('tb_workproduct', 'tb_workproduct.WID = tb_plan.WID','left');
		$this->db->join('tb_document', 'tb_document.DID = tb_workproduct.DID','left');
		$this->db->where('WID', $did);
		//$query = $this->db->get('tb_plan');
		$query = $this->db->get();
		$rs = $query->result_array();
		foreach ($rs as $r){
			$name = $r['DOCUMENT'];
		}
		return $name;
	}

}