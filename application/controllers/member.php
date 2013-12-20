<?php
class Member extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->model('Member_model');
		$this->load->model('Role_model');
	}
 
	public function index(){
		if (isset($_GET['pid'])){
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
			
		$pro['member']= $this->memberList($_GET['pid']);
		$pro['pid'] = $_GET['pid'];
		$pro['pname'] = $_GET['pname'];
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
			'UID' => $uid
		);
		
		if ($this->db->insert('tb_team', $data)) {
			redirect('member');
		}
		
	}
	
	public function memberList($pid){
		
		//$pro['member'] = $this->memberList($_GET['pid']);
		$member = $this->Member_model->findByProject($pid);
		
		//echo json_encode($member);
		return $member;
	}
}
