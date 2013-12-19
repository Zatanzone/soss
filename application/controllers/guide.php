<?php

class Guide extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('guide/guide');
		$this->load->view('footer');	
	}
}
?>
