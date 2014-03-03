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
			$data['start'] = $p['STARTDATE'];
			$data['end'] = $p['ENDDATE'];
			$data['status'] = $p['STATUS'];
		}
		$data['chkRole'] = $chkRole;
		//$projectname = $project['PROJECT'];
		
		$checkPM= $this->Project_model->checkPM($pid);
		if (!$checkPM) {
			$data['pm'] = false;
		}else{
			$data['pm'] = true;
		}
		
		//echo $projectname;
		$this->load->view('projectheader');
		$this->load->view('project/index',$data);
		$this->load->view('projectside',$data);
	}
	
	public function getCloseProject($pid) {
		
		$project = $this->Project_model->getProject($pid);
		$chkRole = $this->Role_model->checkHasRole($pid);
		//print_r($project);
		foreach ($project as $p){
			$data['pid'] = $p['PID'];
			$data['project'] = $p['PROJECT'];
			$data['detail'] = $p['DETAIL'];
			$data['pm'] = $p['UID'];
			$data['role'] = $p['ROLE'];
			$data['start'] = $p['STARTDATE'];
			$data['end'] = $p['ENDDATE'];
			$data['status'] = $p['STATUS'];
		}

			// count task of project
		   $task = $this->Plan_model->checkTask($pid);
	
			$data['counttask']=$task['countTask'];
			$data['finished']=$task['finished'];
			$data['nonFinished']=$task['nonFinished'];
			
			// count document of project
			$doc = $this->Document_model->checkWorkproduct($pid);	
			
			$data['countDoc']=$doc['countDoc'];
			$data['docfinished']=$doc['finished'];
			$data['docnonFinished']=$doc['nonFinished'];
		
		$this->load->view('projectheader');
		$this->load->view('project/closeproject',$data);
		$this->load->view('projectside',$data);
	}
	
	public function confirmClose() {
		$upd = array(
			'STATUS'=>'F',
		);
		$this->db->where('PID',$_POST['pid']);
		if($this->db->update('tb_project',$upd)){
			$this->index($_POST['pid']);
		}else{
			$this->getCloseProject($_POST['pid']);
		}
	}
}