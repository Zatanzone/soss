<?php
class Project_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function getListMyProject($uid){
		
		$query = $this->db->get_where('tb_project', array('uid' => $uid));
		$data = $query->result_array();
		return $data;
	}
	
	public function getListMyTeam($uid){
	
		$this->db->select('tb_team.PID,tb_project.PROJECT,tb_user.NAME,tb_role.ROLE');
		$this->db->from('tb_team');
		$this->db->join('tb_project', 'tb_project.PID = tb_team.PID');
		$this->db->join('tb_user', 'tb_user.UID = tb_project.UID');
		$this->db->join('tb_role', 'tb_role.RID = tb_team.RID');
		$this->db->where('tb_team.UID', $uid);
		
		$query = $this->db->get();
		
		$data = $query->result_array();
		
		//echo $this->db->last_query();

		return $data;
	}
	
	public function  getProject($pid){
		
		$this->db->select('*');
		$this->db->from('tb_project');
		$this->db->join('tb_team', 'tb_team.PID = tb_project.PID');
		$this->db->join('tb_role', 'tb_role.RID = tb_team.RID');
		$this->db->where('tb_team.UID', $this->session->userdata('user_id'));
		$this->db->where('tb_team.PID', $pid);
		$query = $this->db->get();
		//$query = $this->db->get_where('tb_project', array('pid' => $pid));
		//echo $this->db->last_query();
		
		$data = $query->result_array();
		return $data;
	}
	
	public function  checkPM($pid){
	
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