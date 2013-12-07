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
		$this->load->view('main/index');
		}
	}
}