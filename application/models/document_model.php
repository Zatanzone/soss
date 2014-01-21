<?php
class Document_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function  checkDoc($pid){
	
		$this->db->select('*');
		$this->db->from('tb_workproduct');
		$this->db->where('PID', $pid);
		
		$query = $this->db->get();
	
		if ( $query->num_rows() > 0) {
			$chkDoc = TRUE;
		}else {
			$chkDoc = FALSE;
		}
	
		return $chkDoc;
	}
	
	public function create($data){
	
		foreach ($data['did'] as $did){
			$insert = array(
					'DID' => $did,
					'PID' => $data['pid']
			);
			
			$this->db->insert('tb_workproduct',$insert);
		}					
	}
	
	public function search($pid){
		
			$this->db->select('*');
			$this->db->from('tb_document');
			$this->db->join('tb_workproduct', 'tb_workproduct.DID = tb_document.DID');
			$this->db->where('tb_workproduct.PID', $pid);
			$this->db->order_by("tb_document.PRIORITY", "asc");
			$query = $this->db->get();
			$product = $query->result_array();
			//print_r($product);
			//echo $this->db->last_query();
			return $product;
	}
	
		
}
	
