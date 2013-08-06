<?php

class Site extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('site_model');
		$this->load->library('pagination');
		
		$this->is_logged_in();
		$this->load->view('header_admin'); 

	}

	function index()
	{
		$this->load->view("scrape_view");
	}
	
	function history_data()
	{
		$this->load->view("admin_area", $data);
	}

	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');

		if (!isset($is_logged_in) || $is_logged_in !== TRUE)
		{
			echo 'You don\'t have permission to access this page. <a href="../login">Login</a>';
			die();
		}
	}

	function log_out()
	{
		$this->session->unset_userdata('is_logged_in');
		session_destroy();
		redirect(login);
	}

	function update($date)
	{
		$query['records'] = $this->site_model->forex_get($date);
		$this->load->view('update_forex', $query);
		$this->index();
	}

	function delete()
	{
		$this->site_model->delete_row();
		return;
	}
	
	function update_forex_data()
	{
		$this->site_model->update_record();
		redirect(base_url().'site');
	}
	
	//for gold records...
	
	function deleteGold()
	{
		$this->site_model->delete_row_gold();
		return;
	}
	function updateGold($date)
	{
		$query['goldRecords'] = $this->site_model->gold_get($date);
		$this->load->view('update_gold', $query);
	}
	function update_gold_data()
	{
		$this->site_model->update_record_gold();
	}
	
	//for pagination
	public function pagination()
	{
		$config = array();
		$config["base_url"]=base_url()."site/pagination";
		$config["total_rows"] = $this->site_model->record_count();
		$config["per_page"]=10;
		$config["uri_segment"]=3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = round($choice);
		
		$this->pagination->initialize($config);
		
		$page=($this->uri->segment(3)) ? $this->uri->segment(3):0;
		$data["results"] = $this->site_model->fetch_forex($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();
		
		$this->load->view("admin_area", $data);
	}
	public function paginationGold()
	{
		$config = array();
		$config["base_url"]=base_url()."site/paginationgold";
		$config["total_rows"] = $this->site_model->record_count_gold();
		$config["per_page"]=20;
		$config["uri_segment"]=3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = round($choice);
		
		$this->pagination->initialize($config);
		
		$page=($this->uri->segment(3)) ? $this->uri->segment(3):0;
		$data["goldpricenepal"] = $this->site_model->fetch_gold($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();
		
		$this->load->view("admin_area", $data);
	}
}