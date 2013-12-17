<?php
class Member extends CI_Controller
{
	public function __construct() {
		parent::__construct();
	}
	
	public function index(){
		if (isset($_GET['pid'])){
		
		$pro['pid'] = $_GET['pid'];
		$pro['pname'] = $_GET['pname'];
		$this->load->view('projectheader');
		$this->load->view('member/member',$pro);
		$this->load->view('projectside');
		}
	}
	
	public function search($data){
		//$data = $this->input->get('data');
		
		$this->load->model('Member_model');

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
}