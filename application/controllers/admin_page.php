<?php

class Admin_page extends CI_Controller {

	function index()
    {
        $this->load->view('header_admin');
        $this->load->view('scrape_view');
    }
}
