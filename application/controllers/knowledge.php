<?php

class Knowledge extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Project_model');
	}

	public function index()
	{
		$countPJ = $this->Project_model->countPJ();
		$countSess = $this->Project_model->countSess();
		foreach ($countPJ as $pj){
			$counter['countPJ'] = $pj['countPJ'];
		}
		foreach ($countSess as $ps){
			$counter['countSess'] = $ps['countSess'];
		}
		
		$this->load->view('header',$counter);
		$this->load->view('knowledge/knowledge');
		$this->load->view('footer');
	}
}
?>