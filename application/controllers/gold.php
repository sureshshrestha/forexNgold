<?php

class Gold extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('chart');
		$this->load->helper('form');
	}

	function index()
	{
//		$this->gold_json();
//		$this->current_gold();
		$data = array();
		$data['dates'] = $this->chart->get_date('goldpricenepal');
		$this->load->view('header');
		$this->load->view('gold', $data);
		$this->load->view('footer');
	}

	
}

?>