<?php
class Createproject extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('manuindex');
		$this->load->view('createproject/createproject');
	}
	
	public  function create() {
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('projectname', 'Project Name', 'required');
		$this->form_validation->set_rules('projectdetail', 'Project Detail', 'emtry');
		$this->form_validation->set_rules('member', 'Member', 'emtry|numeric');
		$this->form_validation->set_rules('startdate', 'Start Date', 'required');
		$this->form_validation->set_rules('enddate', 'End Date', 'required');
		
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('manuindex');
			$this->load->view('createproject/createproject');
			
		}else{
			
			//$sDate = date_format($this->input->post('startdate'), 'd-m-y');
			

			$creatp['projectname'] = $this->input->post('projectname');
			$creatp['projectdetail'] = $this->input->post('projectdetail');
			$creatp['member'] = $this->input->post('member');
			$creatp['startdate'] = $this->input->post('startdate');
			$creatp['enddate'] = $this->input->post('enddate');
			$creatp['uid'] = $this->session->userdata('user_id');
			
			$this->load->model('Project_model');
			$this->Project_model->create($creatp);
			
		}
		
	}
}