<?php
class Plan extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->model('Project_model');
		$this->load->model('Plan_model');
		$this->load->model('Member_model');
		$this->load->model('Document_model');
		}
		
	private $_pid;

	public function index($pid){
		$project = $this->Project_model->getProject($pid);
		$pro['task'] = $this->Plan_model->getTaskList($pid);
		$pro['num'] = $this->Plan_model->countTask($pid);
		$this->_pid = $pid;

		foreach ($project as $pj){
			$pro['name']  = $pj['PROJECT'];
			$pro['role']  = $pj['ROLE'];
			$pro['projectSdate']  = $pj['STARTDATE'];
			$pro['projectEdate']  = $pj['ENDDATE'];
		}
		
		$pro['memberoption'] = $this->Member_model->getMemberOption($pid);
		$pro['docoption'] = $this->Document_model->getDocOption($pid);
		$pro['pid'] = $pid;
		
		$checkPM= $this->Project_model->checkPM($pid);
		if (!$checkPM) {
			$this->show($this->_pid);
		}else{
		$this->load->view('projectheader');
		$this->load->view('plan/index',$pro);
		}
	}
	
	public function checkLastTask(){
		//echo 'checkLastTask2';
		$task = $this->Plan_model->findLastTask($_POST['pid']);
		foreach ($task as $ldate){
			$lastedDate = $ldate['last_date'];
		}
		$date = $_POST['date'];
		$startDate = date("Y-m-d", strtotime($date));
		$lastDate = date("Y-m-d", strtotime($lastedDate));

		if ($startDate > $lastDate)
			$chk = true;
		else $chk = false;
		
		echo $chk;
	//	return $task;
	}
	
	public function lastDate(){
		$project = $this->Project_model->model($_POST['pid']);
		foreach ($project as $p){
			$lastedDate = $p['ENDDATE'];
		}
		$date = $_POST['date'];
		$endDate = date("Y-m-d", strtotime($date));
		$lastDate = date("Y-m-d", strtotime($lastedDate));
	
		if ($endDate > $lastDate)
			$chk = false;
		else $chk = true;
	
		echo $chk;
		//	return $task;
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
				'PID'=>$_POST['pid'],
				'RES'=>$_POST['member']
			);
			$success = $this->Plan_model->save($data);
			if ($success) {
				redirect('plan/index/'.$_POST['pid'],'refesh');
			//	$this->index($_POST['pid']);
			}
		}
	}
	public function savedoc(){
		
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('doc', 'Document', 'required');
		$this->form_validation->set_rules('startdoc', 'Start Date', 'required');
		$this->form_validation->set_rules('enddoc', 'End Date', 'required');
		
		
		if ($this->form_validation->run() == FALSE){
			$this->index($_POST['pid']);
		}else{
			$data = array(
					'TASK'=>$this->Plan_model->getDocName($_POST['doc']),
					'STARTDATE'=>$_POST['startdoc'],
					'ENDDATE'=>$_POST['enddoc'],
					'PID'=>$_POST['pid'],
					'IS_DOC'=>$_POST['doc']
			);
			$success = $this->Plan_model->save($data);
			if ($success) {
				redirect('plan/index/'.$_POST['pid'],'refesh');
				//	$this->index($_POST['pid']);
			}
		}
	}
	
	public function edit($plid){
		
		$task= $this->Plan_model->findByPk($plid);
		
		foreach ($task as $pj){  // set param for use in edit view
			$trk['pid'] = $pj['PID'];
			$trk['task'] = $pj['TASK'];
			$trk['des']=$pj['DESCRIPTION'];
			$trk['taskstart']=$pj['STARTDATE'];
			$trk['taskend']=$pj['ENDDATE'];
			$trk['res']=$pj['RES'];
			$trk['progress'] = $pj['PROGRESS'];
			$trk['is_doc']=$pj['IS_DOC'];
		}

		$project = $this->Project_model->getProject($trk['pid']);
		
		foreach ($project as $pj){
			$trk['role']=$pj['ROLE'];
			$trk['name']  = $pj['PROJECT'];
			$trk['projectSdate']  = $pj['STARTDATE'];
			$trk['projectEdate']  = $pj['ENDDATE']; 
		}
		
			$trk['memberoption'] = $this->Member_model->getMemberOption($trk['pid']);
			$trk['docoption'] = $this->Document_model->getDocOption($trk['pid']);
			$trk['plid'] = $plid;

			$this->load->view('projectheader');
			$this->load->view('plan/editplan',$trk);
	}
	
	public function update(){
	
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
					'PID'=>$_POST['pid'],
					'PROGRESS'=>$_POST['progress'],
					'RES'=>$_POST['member']
			);
			$success = $this->Plan_model->update($data,$_POST['plid']);
			if ($success) {
				redirect('plan/index/'.$_POST['pid'],'refesh');
				//	$this->index($_POST['pid']);
			}
		}
	}

	public function show($pid){
		$project = $this->Project_model->getProject($pid);
		$pro['task'] = $this->Plan_model->getTaskList($pid);
		$pro['num'] = $this->Plan_model->countTask($pid);
		$this->_pid = $pid;

		foreach ($project as $pj){
			//$pro['duration'] = $pj['day'];
			$pro['pid'] = $pj['PID'];
			$pro['name']  =  $pj['PROJECT'];
			$pro['role']  = $pj['ROLE'];
			$pro['projectSdate']  = $pj['STARTDATE'];
			$pro['projectEdate']  = $pj['ENDDATE'];
			$pro['projectDura'] = $pj['duration'];
		}
		
		$checkPM= $this->Project_model->checkPM($pid);
		if (!$checkPM) {
			$pro['pm'] = false;
		}else{
			$pro['pm'] = true;
		}
		
		$this->load->view('projectheader');
		$this->load->view('plan/show',$pro);
		
		
	}
}