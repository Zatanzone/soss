<?php
class Project_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function getListMyProject($uid){
		
		$sql= "SELECT PID,PROJECT,datediff(ENDDATE,STARTDATE) as day 
				FROM `tb_project` 
				where STATUS = 'N' and 
					  DELETED = 'N' and UID = ".$uid.";";
		$this->db->query($sql);
		$query = $this->db->query($sql);
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
		$this->db->where_not_in('tb_team.RID', 5);
		$this->db->where_not_in('tb_project.STATUS', 'F');
		$this->db->where_not_in('tb_project.DELETED', 'Y');
		$query = $this->db->get();
		$data = $query->result_array();
		
		return $data;
	}
	
	public function getListMySuccess($uid){
	
		$sql= "select tb_project.PID, tb_project.PROJECT, tb_user.NAME, tb_role.ROLE, datediff(ENDDATE,STARTDATE) as day
				from  tb_project, tb_user, tb_role, tb_team
				where tb_project.STATUS = 'F' and
					  tb_project.DELETED='N' and
					  tb_team.UID ='".$uid."' and
					  tb_user.UID = tb_project.UID and	
					  tb_team.RID = tb_role.RID and
					  tb_project.PID = tb_team.PID;";
		$this->db->query($sql);
		$query = $this->db->query($sql);
		$data = $query->result_array();
	
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
				//'MEMBER'=>$data['member'],
				'UID'=>$data['uid']
		);
		
		if($this->db->insert('tb_project',$insert)){
			$success = "Create Project successfull!!";
			
			$this->db->select('PID');
			$this->db->from('tb_project');
			$this->db->where('PROJECT', $insert['PROJECT']);
			$qpid = $this->db->get();
			
			$pid = $qpid->result_array();
			
			$insertteam =array(
				'PID' => $pid[0]['PID'],
				'UID' => $data['uid'],
				'RID' => 5 // Project Manager
			);
			
			$this->db->insert('tb_team',$insertteam);
			
			
			$this->session->set_flashdata('success',$success);
			redirect('main','refesh');
		}else{
			$fail = "Create Project Fail!!";
			$this->session->set_flashdata('fail',$fail);
			redirect('main','refesh');
		}
	}
}
