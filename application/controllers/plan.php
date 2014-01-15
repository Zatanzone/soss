<?php
class Plan extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->model('Project_model');
		$this->load->model('Plan_model');

	}

	public function index($pid){
		$project = $this->Project_model->getProject($pid);
		$pro['task'] = $this->Plan_model->getTaskList($pid);
		foreach ($project as $pj){
			$pro['name']  = $pj['PROJECT'];
			$pro['role']  = $pj['ROLE'];
			$pro['projectSdate']  = $pj['STARTDATE'];
			$pro['projectEdate']  = $pj['ENDDATE'];
		}
		
		$task = $this->Plan_model->findLastTask($pid);
		$pro['pid'] = $pid;
		
		$this->load->view('projectheader');
		$this->load->view('plan/index',$pro);
		$this->load->view('projectside');
	}
	
	public function save(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('taskname', 'Task Name', 'required');
		$this->form_validation->set_rules('start', 'Start Date', 'required');
		$this->form_validation->set_rules('end', 'End Date', 'required');
		
		if ($this->form_validation->run() == FALSE){
				$this->index($_POST['pid']);
		}else{
			$data = array(
				'TASK'=>$_POST['taskname'],
				'DESCRIPTION'=>$_POST['description'],
				'STARTDATE'=>$_POST['start'],
				'ENDDATE'=>$_POST['end'],
				'PID'=>$_POST['pid']
			);
			$success = $this->Plan_model->save($data);
			if ($success) {
				redirect('plan/index/'.$_POST['pid'],'refesh');
			//	$this->index($_POST['pid']);
			}else{
				
			}
		}
		
		
	
		
		
	}
	
}