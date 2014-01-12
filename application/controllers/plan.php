<?php
class Plan extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->model('Project_model');

	}

	public function index($pid){
		$project = $this->Project_model->getProject($pid);
		//print_r($project);
		foreach ($project as $pj){
			$pro['name']  = $pj['PROJECT'];
			$pro['role']  = $pj['ROLE'];
		}
		
		$pro['pid'] = $pid;
		
		$this->load->view('projectheader');
		$this->load->view('plan/index',$pro);
		$this->load->view('projectside');
	}
}