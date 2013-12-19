<?php

class Knowledge extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('knowledge/knowledge');
		$this->load->view('footer');
	}
}
?>