<?php
class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//$this->load->model("usermodel");
	}

	public function index()
	{	
		if ($this->session->userdata('user_id')==null) {
			redirect('form/admin','refesh');
		}else{
		$data = $this->Admin_model->getuser();
		$this->load->view("admin/adminindex",$data);
		}
	}
	
	public function del($id)
	{
	
		$this->Admin_model->deleteuser($id);
		redirect("admin","refresh");
		exit();
	}

	public function edit($id)
	{
	
		$this->Admin_model->edituser($id);
		redirect("admin","refresh");
		exit();
	}
}
?>