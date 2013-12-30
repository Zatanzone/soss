<?php
class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index()
	{
		if ($this->session->userdata('user_id')==null) {
			redirect('form/signin','refesh');
		}else{
		$this->load->model('Project_model');
		$uid = $this->session->userdata('user_id');
		$project['myProject'] = $this->Project_model->getListMyProject($uid);
		$project['myTeam'] = $this->Project_model->getListMyTeam($uid);
		$project['mySuccess'] = $this->Project_model->getListMySuccess($uid);
		$this->load->view('main/index',$project);
		$this->load->view('projectside',$project);
		}
	}
}