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
		$this->forex_json();
		$this->current_forex();
		$data = array();
		$data['forex_dates'] = $this->chart->get_date('final');
		$this->load->view('header');
		$this->load->view('forex', $data);
		$this->load->view('footer');
	}

	function forex_json()
	{
		$query = $this->chart->history_charts();
		foreach ($query as $values)
		{
			$key = array_keys($values);
			$row[] = array($values[$key[0]], $values[$key[1]], $values[$key[2]], $values[$key[3]], $values[$key[4]], $values[$key[5]], $values[$key[6]], $values[$key[7]], $values[$key[8]], $values[$key[9]], $values[$key[10]], $values[$key[11]], $values[$key[12]], $values[$key[13]]);
		}


		$result = json_encode($row, JSON_NUMERIC_CHECK);
		$file = FCPATH . 'lib/history_forex.json';
		file_put_contents($file, $result);
	}

	/*
	  this makes json for latest forex rates
	 */

	function current_forex()
	{
		$col_name = $this->chart->get_fields('final');
		$col_buy = 'UNIX_TIMESTAMP(date_added)*1000,';
		$col_sell = 'UNIX_TIMESTAMP(date_added)*1000,';
		foreach ($col_name as $value)
		{
			if (preg_match('/_buy/', $value))
			{
				$col_buy .= $value . ',';
			}
			elseif (preg_match('/_sell/', $value))
			{
				$col_sell .= $value . ',';
			}
		}
		$buy = $this->chart->get_charts($col_buy);
		$sell = $this->chart->get_charts($col_sell);

		$forex_buy['name'] = 'Buy';
		foreach ($buy as $values)
		{
			$key = array_keys($values);
			$forex_buy['data'] = array($values[$key[1]], $values[$key[2]], $values[$key[3]], $values[$key[4]], $values[$key[5]], $values[$key[6]], $values[$key[7]], $values[$key[8]], $values[$key[9]], $values[$key[10]], $values[$key[14]], $values[$key[15]], $values[$key[16]], $values[$key[17]], $values[$key[18]], $values[$key[19]], $values[$key[11]], $values[$key[12]], $values[$key[13]]);
		}

		$forex_sell['name'] = 'Sell';
		foreach ($sell as $values)
		{
			$key = array_keys($values);
			$forex_sell['data'] = array($values[$key[1]], $values[$key[2]], $values[$key[3]], $values[$key[4]], $values[$key[5]], $values[$key[6]], $values[$key[7]], $values[$key[8]], $values[$key[9]], $values[$key[10]], $values[$key[11]], $values[$key[12]], $values[$key[13]], $values[$key[14]], $values[$key[15]], $values[$key[16]]);
		}
		$result = array();
		array_push($result, $forex_buy);
		array_push($result, $forex_sell);

		$result = json_encode($result, JSON_NUMERIC_CHECK);
		//print $result;
		$file = FCPATH . 'lib/current_forex.json';
		file_put_contents($file, $result);
	}
}

?>