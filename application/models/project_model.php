<?php
class Project_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function getListMyProject($uid){
		
		$query = $this->db->get_where('tb_project', array('uid' => $uid));
		$data['myProject'] = $query->result_array();
		return $data;
	}
	
	public function  getProject($pid){
		
		$query = $this->db->get_where('tb_project', array('pid' => $pid));
		$data = $query->result_array();
		return $data;
	}

	public function create($data){
		
		$insert = array(
				'PROJECT' => $data['projectname'],
				'DETAIL' => $data['projectdetail'],
				'STARTDATE' => $data['startdate'],
				'ENDDATE'=>$data['enddate'],
				'MEMBER'=>$data['member'],
				'UID'=>$data['uid']
		);
		
		if($this->db->insert('tb_project',$insert)){
			$success = "Create Project successfull!!";
			$this->session->set_flashdata('success',$success);
			redirect('main','refesh');
		}else{
			$fail = "Create Project Fail!!";
			$this->session->set_flashdata('fail',$fail);
			redirect('main','refesh');
		}
	}
}