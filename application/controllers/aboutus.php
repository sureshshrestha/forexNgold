<?php

class Aboutus extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		
	}

	function index()
	{
		$this->load->view('header');
		$this->load->view('aboutus_view');
		$this->load->view('footer');
	}
}
