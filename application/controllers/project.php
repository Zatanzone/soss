<?php
class Project extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Project_model');
		$this->load->model('Role_model');
	}
	
	public function index($pid){
		
		$project = $this->Project_model->getProject($pid);
		$chkRole = $this->Role_model->checkHasRole($pid);
		//print_r($project);
		foreach ($project as $p){
			$data['pid'] = $p['PID'];
			$data['project'] = $p['PROJECT'];
			$data['detail'] = $p['DETAIL'];
			$data['pm'] = $p['UID'];
			$data['role'] = $p['ROLE'];
		}
		$data['chkRole'] = $chkRole;
		//$projectname = $project['PROJECT'];
		
		//echo $projectname;
		$this->load->view('projectheader');
		$this->load->view('project/index',$data);
		$this->load->view('projectside',$data);
	}
}