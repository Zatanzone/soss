<?php
class Plan_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}
	
	public function findLastTask($pid){
		

		$this->db->select_max('ENDDATE', 'last_date');
		$this->db->where('PID', $pid);
		$query = $this->db->get('tb_plan');
		
		return $query->result_array();

	}
	
	public function getTaskList($pid){
			$sel = array( // set attributes
			'*',
			'datediff(ENDDATE,STARTDATE) as duration',
		);
		
		$this->db->select($sel);
		$this->db->from('tb_plan');
		$this->db->where('PID', $pid);

		$query = $this->db->get();
		if ($query->num_rows() > 0) 
			return $query->result_array();
		else
			return false;
		
	}
	
	public function countTask($pid){
		$this->db->like('PID',$pid);
		$this->db->from('tb_plan');
		return $this->db->count_all_results();
	}
	
	public function save($data){
		if (isset($data)) {
			if ($this->db->insert('tb_plan',$data)) 
				return true;
			else return false;
		}
	}
	
	public function update($data,$plid){
		if (isset($data)) {
			$this->db->where('PLID', $plid);
			if ($this->db->update('tb_plan', $data))
				return true;
			else return false;
		}
	}
	
	public function getDocName($did){
		$this->db->select('tb_document.DOCUMENT');
		$this->db->from('tb_workproduct');
		$this->db->join('tb_document', 'tb_document.DID = tb_workproduct.DID','left');
		$this->db->where('WID', $did);
		$query = $this->db->get();
		$rs = $query->result_array();
		foreach ($rs as $r){
			$name = $r['DOCUMENT'];
		}
		return $name;
	}
	
	public function getDocId($wid){
		$query = $this->db->get_where('tb_workproduct', array('WID' => $wid));
		$rs = $query->result_array();
		foreach ($rs as $r){
			$did = $r['DID'];
		}
		return $did;
	}
	
	public function findByPk($plid){
		$this->db->select('*');
		$this->db->from('tb_plan');
		//$this->db->join('tb_project', 'tb_project.PID = tb_plan.PID','left');
		$this->db->where('PLID', $plid);
		$query = $this->db->get();
		$rs = $query->result_array();
		
		return $rs;
	}
}