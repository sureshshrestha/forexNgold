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
		$this->gold_json();
		$this->current_gold();
		$data = array();
		$data['dates'] = $this->chart->get_date('goldpricenepal');
		$this->load->view('header');
		$this->load->view('gold', $data);
		$this->load->view('footer');
	}

	function gold_json()
	{
		$query = $this->chart->history_gold();
		foreach ($query as $values)
		{
			$key = array_keys($values);
			$row[] = array($values[$key[0]], $values[$key[1]], $values[$key[2]], $values[$key[3]]);
		}

		$result = json_encode($row, JSON_NUMERIC_CHECK);
		$file = FCPATH . 'lib/history_gold.json';
		file_put_contents($file, $result);
	}

	function current_gold()
	{
		$query = $this->chart->gold_chart();
		$field = $this->chart->get_fields('goldpricenepal');
		$result = array();
		for ($index = 1; $index < 4; $index++)
		{
			$series[$index]['name'] = $field[$index];
			foreach ($query as $values)
			{
				$key = array_keys($values);
				$series[$index]['data'][] = $values[$key[$index]];
			}
			array_push($result, $series[$index]);
		}
		$result = json_encode($result, JSON_NUMERIC_CHECK);
		$file = FCPATH . 'lib/current_gold.json';
		file_put_contents($file, $result);
	}
}

?>