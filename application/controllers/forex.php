<?php

class Forex extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('chart');
		$this->load->helper('form');
	}

	function index()
	{
//		$this->forex_json();
//		$this->current_forex();
		$data = array();
		$data['forex_dates'] = $this->chart->get_date('forex');
		$this->load->view('header');
		$this->load->view('forex', $data);
		$this->load->view('footer');
	}

//	function forex_json()
//	{
//		$query = $this->chart->history_charts();
//		foreach ($query as $values)
//		{
//			$key = array_keys($values);
//			$row[] = array($values[$key[0]], $values[$key[1]], $values[$key[2]], $values[$key[3]], $values[$key[4]], $values[$key[5]], $values[$key[6]], $values[$key[7]], $values[$key[8]], $values[$key[9]], $values[$key[10]], $values[$key[11]], $values[$key[12]], $values[$key[13]]);
//		}
//
//
//		$result = json_encode($row, JSON_NUMERIC_CHECK);
//		$file = FCPATH . 'lib/history_forex.json';
//		file_put_contents($file, $result);
//	}

	/*
	  this makes json for latest forex rates
	 */

	
}

?>