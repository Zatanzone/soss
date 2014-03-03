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
			$loadDoc = $this->Document_model->loadDoc($pid);
			$pro['product']=$product;
			$pro['loadDoc']=$loadDoc;
			$pro['checkPM']=$checkPM;
			$this->load->view('projectheader');
			$this->load->view('document/index',$pro);
			$this->load->view('projectside');
			
		}else{
			
			$checkDoc = $this->Document_model->checkDoc($pid);
			$product = $this->Document_model->search($pid);
			$docOption = $this->Document_model->notInPJ($pid);
			$member = $this->Member_model->getMemberOption($pid);
			$loadDoc = $this->Document_model->loadDoc($pid);
			$pro['product']=$product;
			$pro['member']=$member;
			$pro['checkPM']=$checkPM;
			$pro['docOP']=$docOption;
			$pro['loadDoc']=$loadDoc;
			if (!$checkDoc) {
					redirect('document/create/'.$pro['pid']);
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
		
		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('projectheader');
			$this->load->view('document/show',$pro);
			$this->load->view('projectside');
			
		}else{
			
			$creatp['did'] = $this->input->post('did');
			$creatp['pid'] = $pro['pid'];
			$this->Document_model->create($creatp);

			redirect('document/setDoc/'.$creatp['pid']);
			
		}
		
	}
	
	public function setDoc($pid){
		
		$project = $this->Project_model->getProject($pid);
		foreach ($project as $pj){
			$pro['name']  = $pj['PROJECT'];
			$pro['role']  = $pj['ROLE'];
			$pro['pid']  = $pj['PID'];
		}
		
		$product = $this->Document_model->searchDocInPJ($pid);
		$member = $this->Member_model->getMemberOption($pid);
		$pro['product']=$product;
		$pro['member']=$member;
	
		$this->load->view('projectheader');
		$this->load->view('document/setDoc',$pro);
		$this->load->view('projectside');

		if(isset($_POST['did'])){
			$i=0;
			foreach($_POST['did'] as $val)
			{
				$data['uid'] = $_POST['tid'][$i];
				$data['did'] = $val;
				$data['pid'] = $pid;
				$this->Document_model->setUserToDoc($data);

				$i=$i+1;
			}
			redirect("document/index/".$pid,"refresh");
		}
		
		
	}
	public function do_upload()
	{

		$updoc['docid']=$this->input->post('docid');
		$updoc['docname']=$this->input->post('docname');
		$updoc['projectname']=$this->input->post('projectname');
		$updoc['pid']=$this->input->post('pid');
		$updoc['progress']=$this->input->post('progress');
		
		$version = $this->Document_model->countVersion($updoc['docid'],$updoc['pid']);
		$chkInPlan = $this->Document_model->checkDocInPlan($updoc['docid'],$updoc['pid']);
		foreach ($version as $vs){
			$counter['countDoc'] = $vs['countvs'];
		}
		
		$vs = $counter['countDoc']+1;
		
		$config['upload_path'] = 'versionupload/';
		$config['allowed_types'] = '*';
		$config['max_size']	= '1000000000000';
		
		//pdf|docx|doc
		
		$file_name=$updoc['docname'] . "_" . $updoc['projectname'] . "_version_" . $vs;// variable of file name
		$config['file_name'] = $file_name;
	
		$this->load->library('upload', $config);
		
	
		if ($this->upload->do_upload("docfile")) { // ¶éÒÁÑ¹ÍÑ¾ä¿Åìä´é
			$data=$this->upload->data();
			$updoc['docfile'] = $data['file_name'];
	
		}else{
			echo  $this->upload->display_errors();
		}
		
		$this->Document_model->insertUpLoad($updoc);
		
		if ($chkInPlan == TRUE) {
				
			$this->Document_model->updateProGreInPlan($updoc);
		}
		redirect('document/index/' . $updoc['pid'],'refesh'); 
	}
	
	public function addDoc(){
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('did[]', 'did', 'required');
		$this->form_validation->set_rules('uid[]', 'uid', 'required');
		$creatp['did1'] = $this->input->post('did');
		$creatp['pid'] = $this->input->post('pid');
		$creatp['uid1'] = $this->input->post('uid');
		if ($this->form_validation->run() == FALSE) {
			echo "<script>";
			echo "alert('Please select the document and project members');";
			echo "</script>";
			redirect('document/index/' . $creatp['pid'],'refesh');
			
		}else{
			
			$uid = $creatp['uid1'][0];
			$did = $creatp['did1'][0];
			$creatp['did'] = $did;
			$creatp['uid'] = $uid;
			$this->Document_model->createOne($creatp);

			redirect('document/index/' . $creatp['pid'],'refesh');
			
		}
		
	}
	
}