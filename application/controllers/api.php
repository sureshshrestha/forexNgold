<?php

class Api extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
	}

	function index()
	{
		$this->load->view('header');
		$this->load->view('api_view');
		$this->load->view('footer');
	}
}