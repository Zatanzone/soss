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
		
			$this->db->select('tb_workproduct.WID, tb_workproduct.DID, tb_document.DOCUMENT, 
				   tb_document.TEMPLATE, tb_user.NAME, tb_workproduct.UID,max(tb_version.PROGRESS) as PROGRESS');
			$this->db->from('tb_workproduct');
			$this->db->join('tb_document', 'tb_document.DID = tb_workproduct.DID');
			$this->db->join('tb_user', 'tb_user.UID = tb_workproduct.UID');
			$this->db->join('tb_version', 'tb_version.WID = tb_workproduct.WID','left');
			$this->db->where('tb_workproduct.PID', $pid);
			$this->db->group_by('tb_workproduct.WID');
			$this->db->order_by("tb_document.PRIORITY", "asc");
			$query = $this->db->get();
			$product = $query->result_array();

			return $product;
	}
	
	Public function getDocOption($pid)
	{
		$return = array();
	
		$this->db->select('tb_workproduct.WID,tb_document.DOCUMENT');
		$this->db->from('tb_workproduct');
		$this->db->join('tb_document', 'tb_document.DID= tb_workproduct.DID','left');
		$this->db->where('PID', $pid);
		$query = $this->db->get();
		$res = $query->result_array();
	
		if( is_array( $res ) && count( $res ) > 0 )
		{
			$return[''] = 'Select Document';
			foreach($res as $row)
			{
				$return[$row['WID']] = $row['DOCUMENT'];
			}
		}
		return $return;
	}
	public function searchDocInPJ($pid){
	
		$this->db->select('tb_workproduct.DID, tb_document.DOCUMENT');
		$this->db->from('tb_workproduct');
		$this->db->join('tb_document', 'tb_document.DID = tb_workproduct.DID');
		$this->db->where('tb_workproduct.PID', $pid);
		$this->db->order_by("tb_document.PRIORITY", "asc");
		$query = $this->db->get();

		$product = $query->result_array();
	
		return $product;
	}
	public function notInPJ($pid){
		$this->db->select('tb_document.DID,tb_document.DOCUMENT');
		$this->db->from('tb_document');
		$this->db->where('tb_document.DID NOT IN (SELECT tb_workproduct.DID FROM tb_workproduct where tb_workproduct.PID ='.$pid.')');
		$query = $this->db->get();
		$res = $query->result_array();

		if( is_array( $res ) && count( $res ) > 0 )
		{
			$return[''] = 'Select Document';
			foreach($res as $row)
			{
				$return[$row['DID']] = $row['DOCUMENT'];
			}
			return $return;
		}else
			return false;
		
	}
	public function upload($data){
	
		$insert = array(
				'WID'=>$data['docid'],
				'FILE'=>$data['docfile'],
				'PROGRESS'=>$data['progress']
		);
	
		$this->db->insert('tb_version',$insert);

		redirect('document/index','refesh');
		exit();
	}
	public function loadDoc($pid){
		$this->db->select('tb_version.WID, tb_version.FILENAME, tb_version.PROGRESS, tb_version.UPLOADTIME');
		$this->db->from('tb_version');
		$this->db->join('tb_workproduct', 'tb_version.WID = tb_workproduct.WID');
		$this->db->where('tb_workproduct.PID',$pid);
		$query = $this->db->get();

		$res = $query->result_array();
		
		return $res;
	}
	public function createOne($data){
	
			$insert = array(
					'DID' => $data['did'],
					'UID' => $data['uid'],
					'PID' => $data['pid']
			);
				
			$this->db->insert('tb_workproduct',$insert);
	}
	public function countVersion($wid,$pid){
		
		$this->db->select('COUNT( tb_version.WID ) AS countvs');
		$this->db->from('tb_version');
		$this->db->join('tb_workproduct', 'tb_version.WID = tb_workproduct.WID');
		$this->db->where('tb_workproduct.PID',$pid);
		$this->db->where('tb_version.WID',$wid);
		$query = $this->db->get();
		
		$res = $query->result_array();
		
		return $res;
	}
	
	public function checkDocInPlan($wid,$pid){
	
		$this->db->select('tb_plan.IS_DOC');
		$this->db->from('tb_plan');
		$this->db->where('tb_plan.IS_DOC',$wid);
		$this->db->where('tb_plan.PID',$pid);
	
		$query = $this->db->get();
		if ( $query->num_rows() == 1) {
			$chkInP = TRUE;
		}else {
			$chkInP = FALSE;
		}
	
		return $chkInP;
	}
	
	public function insertUpLoad($data){

		$insert = array(
				'WID'=>$data['docid'],
				'PROGRESS'=>$data['progress'],
				'FILENAME'=>$data['docname'],
				'UPLOADTIME'=>date("Y-m-d H:i:s")
		
		);
		

		$this->db->insert('tb_version',$insert);
	}
	
	public function updateProGreInPlan($data){
		$post = array(
				'PROGRESS' =>$data['progress']
		);
		
		$this->db->where('tb_plan.IS_DOC', $data['docid']);
		$this->db->where('tb_plan.PID', $data['pid']);
		$this->db->update('tb_plan', $post);
	}
	
	public function setUserToDoc($data){
		$post = array(
				'UID' =>$data['uid']
		);
		
		$this->db->where('PID', $data['pid']);
		$this->db->where('DID', $data['did']);
		$this->db->update('tb_workproduct', $post);
	}
	
	public function checkWorkproduct($pid){
		$docFinish=0;
		$docNoneFinish=0;
	
		$this->db->select('*,MAX(  tb_version.PROGRESS ) AS mp');
		$this->db->from('tb_workproduct');
		$this->db->join('tb_version', 'tb_workproduct.WID = tb_version.WID');
		$this->db->where('tb_workproduct.PID', $pid);
		$this->db->group_by('tb_workproduct.WID');
		$query = $this->db->get();
		
		if ($query->num_rows()>0) {
		$list = $query->result_array();
		foreach ($list as $prg){
			if($prg['mp'] == 100) //progress is 100%
				$docFinish = $docFinish+1;
			else{
			$docNoneFinish = $docNoneFinish+1;
			}
			$doc['finished'] = $docFinish;
			$doc['nonFinished'] = $docNoneFinish;
			$doc['countDoc'] = $query->num_rows();;
			
		}
			return $doc;
		}else{
			return false;
		}
		
	}
		
}
	
