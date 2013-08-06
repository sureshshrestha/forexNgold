<?php

function index()
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
