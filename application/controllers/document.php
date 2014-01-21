<?php
class Document extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Project_model');
		$this->load->model('Document_model');
		$this->load->model('Member_model');
	}
	
	public function index($pid)
	{
		$project = $this->Project_model->getProject($pid);
		foreach ($project as $pj){
			$pro['name']  = $pj['PROJECT'];
			$pro['role']  = $pj['ROLE'];
			$pro['pid']  = $pj['PID'];
		}
		
		$pro['pid'] = $pid;
		$checkPM= $this->Project_model->checkPM($pid);
		
		if (!$checkPM) {
			$product = $this->Document_model->search($pid);
			$member = $this->Member_model->findByProject($pid);
			$pro['product']=$product;
			$pro['member']=$member;
			$pro['checkPM']=$checkPM;
			$this->load->view('projectheader');
			$this->load->view('document/index',$pro);
			$this->load->view('projectside');
			
		}else{
			
			$checkDoc = $this->Document_model->checkDoc($pid);
			$product = $this->Document_model->search($pid);
			$member = $this->Member_model->findByProject($pid);
			$pro['product']=$product;
			$pro['member']=$member;
			$pro['checkPM']=$checkPM;
			if (!$checkDoc) {
				
				$this->load->view('projectheader');
				$this->load->view('document/show',$pro);
				$this->load->view('projectside');
				
			}else {
				
				$this->load->view('projectheader');
				$this->load->view('document/index',$pro);
				$this->load->view('projectside');
			}		
		}
	}
	public function create($pid) {
		$project = $this->Project_model->getProject($pid);
		foreach ($project as $pj){
			$pro['name']  = $pj['PROJECT'];
			$pro['role']  = $pj['ROLE'];
			$pro['pid']  = $pj['PID'];
		}
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('did[]', 'did', 'required');
		
		if ($this->form_validation->run() == FALSE)  
		{
			$this->load->view('projectheader');
			$this->load->view('document/show',$pro);
			$this->load->view('projectside');
			
		}else{
			//print_r($_POST);
			$creatp['did'] = $this->input->post('did');
			$creatp['pid'] = $pid;
				
			$this->Document_model->create($creatp);
			$product = $this->Document_model->search($pid);
			$member = $this->Member_model->findByProject($pid);
			$pro['product']=$product;
			$pro['member']=$member;

			$this->load->view('projectheader');
			$this->load->view('document/setdoc',$pro);
			$this->load->view('projectside');
			
		}
		
	}
	
	public function setMemberToDoc(){
		$i=0;
		foreach($_POST['did'] as $val)
		{
				$post = array(
					'TID' =>$_POST['tid'][$i]
				);
				
			$this->db->where('PID', $_POST['pid']);
			$this->db->where('DID', $val);
			$this->db->update('tb_workproduct', $post);
			//echo $this->db->last_query();
			$i=$i+1;
		}
		redirect("document/index/".$_POST['pid'],"refresh");
	}
	
	
}