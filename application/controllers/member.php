<?php
class Member extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->model('Member_model');
		$this->load->model('Role_model');
		$this->load->model('Project_model');
	}
 
	public function index($pid){
		//$pro['roleOption'] = $this->Role_model->getRoleOption();
				
		//print_r($pro['member']);
		$pro['roleOption']=array(
				'null'=>'<-- Select Role -->',
				'1'=>'Analyst ',
				'2'=>'Customer',
				'3'=>'Designer',
				'4'=>'Programmer',
				'5'=>'Project Manager',
				'6'=>'Technical Leader ',
				'7'=>'Work Team ',
		);
			
		$pro['member']= $this->memberList($pid);
		$pro['name'] = $this->Project_model->getProject($pid);
		$pro['pid'] = $pid;

		$checkPM= $this->Project_model->checkPM($pid);

		 if (!$checkPM) {
			$this->load->view('projectheader');
			$this->load->view('member/memberview',$pro);
			$this->load->view('projectside');
		}else{ 
			$this->load->view('projectheader');
			$this->load->view('member/member',$pro);
			$this->load->view('projectside');
		}
		
	
		
	}
	
	public function search($data){
		//$data = $this->input->get('data');
		
		$query = $this->Member_model->findBtKey($data);		
		$find = $query->result_array();

		echo json_encode($find);
	}
	
	public function add($uid,$pid){
		$data = array(
			'PID' => $pid,
			'UID' => $uid,
			'RID' => 7
		);
		
		if ($this->db->insert('tb_team', $data)) {
			redirect(base_url()."member/index/".$pid,"refresh");
		}
		
	}
	
	public function setRole(){
		 foreach($_POST['uid'] as $val )
		{
			
 			$post = array(
 				'RID' => $_POST['role'][$val],
 			);
 			$this->db->where('PID', $_POST['pid']);
 			$this->db->where('UID', $val);
 			$this->db->update('tb_team', $post);

		} 
		redirect("member/index/".$_POST['pid'],"refresh");
	}
	
	public function del($id,$pid){
		$this->db->delete('tb_team', array('TID' => $id));
		redirect("member/index/".$pid,"refresh");
	}
	
	
	
	public function memberList($pid){
		//$pro['member'] = $this->memberList($_GET['pid']);
		$member = $this->Member_model->findByProject($pid);
		
		//echo json_encode($member);
		return $member;
	}
}
