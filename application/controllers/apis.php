<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class apis extends REST_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('api');
	}

	public function forex_get()
	{

		$table = 'forex';
		$date = $this->get('date');
		$api_key = $this->get('key');
		$start = $this->get('start_date');
		$end = $this->get('end_date');
		$format = $this->get('format');


if(isset($format)){
			if ($format=='html'||$format=='csv'){
				$this->response(array('status'=>'false','message'=>'invalid','error'=>'Format not supported'),400);
				exit();
	}
}
		$ip = $this->input->ip_address();
		$forex_buy = 0;
		$key_val = $this->api->requests_excides($api_key);

		foreach ($key_val as $values)
		{
			$keys = array_keys($values);
			$forex_buy = $values[$keys[0]];
		}

		if ($forex_buy >= 200)
		{
			$this->exceed_limit();
		}
		else
		{
			$this->api->log_api_requests($ip, $api_key);

			if ($date)
			{

				$query = $this->api->select_date($date, $table);

				//var_dump($query);
				$arrayName = array('Date' => null,
			'IC Buy' => null, 'IC Sell' => null, 'USD Buy' => null, 'USD Sell' => null, 'EUR Buy' => null, 'EUR Sell' => null, 'GBP Buy' => null, 'GBP Sell' => null, 'CHF Buy' => null, 'CHF Sell' => null, 'AUD Buy' => null, 'AUD Sell' => null, 'CAD Buy' => null, 'CAD Sell' => null, 'SGD Buy' => null, 'SGD Sell' => null, 'JPY Buy' => null, 'JPY Sell' => null, 'CNY Buy' => null, 'CNY Sell' => null, 'SEK Buy' => null, 'DKK Buy' => null, 'HKD Buy' => null, 'SAR Buy' => null, 'SAR Sell' => null, 'QAR Buy' => null, 'QAR Sell' => null, 'THB Buy' => null, 'THB Sell' => null, 'AED Buy' => null, 'AED Sell' => null, 'MYR Buy' => null, 'MYR Sell' => null, 'KPW Buy' => null, 'KPW Sell' => null,
		);
				foreach ($query as $value) {
					// var_dump($value);exit;
					// if($value['IC Buy'] == '1')
			$arrayName ['Date'] = $value['Date'];
			$arrayName ['IC Buy'] = $value['IC_buy'];
			
			$arrayName ['IC Sell'] = $value['IC_sell'];
			$arrayName ['USD Buy'] = $value['USD_buy'];
			$arrayName ['USD Sell'] = $value['USD_sell'];
			$arrayName ['EUR Buy'] = $value['EUR_buy'];
			$arrayName ['EUR Sell'] = $value['EUR_sell'];
			$arrayName ['GBP Buy'] = $value['GBP_buy'];
			$arrayName ['GBP Sell'] = $value['GBP_sell'];
			$arrayName ['CHF Buy'] = $value['CHF_buy'];
			$arrayName ['CHF Sell'] = $value['CHF_sell'];
			$arrayName ['AUD Buy'] = $value['AUD_buy'];
			$arrayName ['AUD Sell'] = $value['AUD_sell'];
			$arrayName ['CAD Buy'] = $value['CAD_buy'];
			$arrayName ['CAD Sell'] = $value['CAD_sell'];
			$arrayName ['SGD Buy'] = $value['SGD_buy'];
			$arrayName ['SGD Sell'] = $value['SGD_sell'];
			$arrayName ['JPY Buy'] = $value['JPY_buy'];
			$arrayName ['JPY Sell'] = $value['JPY_sell'];
			$arrayName ['CNY Buy'] = $value['CNY_buy'];
			$arrayName ['CNY Sell'] =$value['CNY_sell'];
			$arrayName ['SEK Buy'] = $value['SEK_buy'];
			//$arrayName [' Sell'] = $value[];
			$arrayName ['DKK Buy'] = $value['DKK_buy'];
			// $arrayName [' Sell'] = $value[];
			$arrayName ['HKD Buy'] = $value['HKD_buy'];
			// $arrayName [' Sell'] = $value[];
			$arrayName ['SAR Buy'] = $value['SAR_buy'];
			$arrayName ['SAR Sell'] = $value['SAR_sell'];
			$arrayName ['QAR Buy'] = $value['QAR_buy'];
			$arrayName ['QAR Sell'] = $value['QAR_sell'];
			$arrayName ['THB Buy'] = $value['THB_buy'];
			$arrayName ['THB Sell'] = $value['THB_sell'];
			$arrayName ['AED Buy'] = $value['AED_buy'];
			$arrayName ['AED Sell'] = $value['AED_sell'];
			$arrayName ['MYR Buy'] = $value['MYR_buy'];
			$arrayName ['MYR Sell'] = $value['MYR_sell'];
			$arrayName ['KPW Buy'] = $value['KPW_buy'];
			$arrayName ['KPW Sell'] = $value['KPW_sell'];

				}
				
				if (empty($arrayName))
				{
					//$this->response(array('status'=>'false','msg'=>'invalid','result'=>'Date not exist'), 400);
					$this->not_exist();
				}
				else
				{

					$this->response(array('status' => 'true', 'message' => 'valid', 'result' => $arrayName), 200);
				}
			}
			elseif ($start && $end)
			{
				$low = strtotime($this->get('start_date'));
				$high = strtotime($this->get('end_date'));
				if ($low > $high)
				{
					$this->not_allowed();
				}
				else
				{
					$from = $this->api->select_date($start, $table);
					$to = $this->api->select_date($end, $table);

					if (empty($from) || empty($to) || empty($from) && empty($to))
					{
						$this->either_empty();
					}
					else
					{
						$query = $this->api->date_range($start, $end, $table);
						$this->response(array('status' => 'true', 'message' => 'valid', 'result' => $query), 200);
					}
				}
			}
			elseif (empty($start) || empty($end) || empty($start) && empty($end))
			{
				$this->empty_range();
			}
			else
			{
				//$query = $this->api->get_current($table);
				$this->response('Not Found', 404);
			}
		}
	}

	public function metal_get()
	{

		$table = 'goldpricenepal';
		$date = $this->get('date');
		$key = $this->get('key');
		$start = $this->get('start_date');
		$end = $this->get('end_date');
		$format = $this->get('format');

if(isset($format)){
			if ($format=='html'||$format=='csv'){
				$this->response(array('status'=>'false','message'=>'invalid','error'=>'Format not supported'),400);
				exit();
	}
}
		$ip = $this->input->ip_address();
		$forex_buy = 0;
		if ($key = 'foo')
		{
			
		}
		$key_val = $this->api->requests_excides($key);

		foreach ($key_val as $values)
		{
			$keys = array_keys($values);
			$forex_buy = $values[$keys[0]];
		}

		if ($forex_buy >= 200)
		{
			$this->exceed_limit();
		}
		else
		{
			$this->api->log_api_requests($ip, $key);

			if ($date)
			{

				$query = $this->api->select_date($date, $table);
				if (empty($query))
				{
					//$this->response(array('status'=>'false','msg'=>'invalid','result'=>'Date not exist'), 400);
					$this->not_exist();
				}
				else
				{

					$this->response(array('status' => 'true', 'message' => 'valid', 'result' => $query), 200);
				}
			}
			elseif ($start && $end)
			{
				$low = strtotime($this->get('start_date'));
				$high = strtotime($this->get('end_date'));
				if ($low > $high)
				{
					$this->not_allowed();
				}
				else
				{
					$from = $this->api->select_date($start, $table);
					$to = $this->api->select_date($end, $table);

					if (empty($from) || empty($to) || empty($from) && empty($to))
					{
						$this->either_empty();
					}
					else
					{
						$query = $this->api->date_range($start, $end, $table);
						$this->response(array('status' => 'true', 'message' => 'valid', 'result' => $query), 200);
					}
				}
			}
			elseif (empty($start) || empty($end) || empty($start) && empty($end))
			{
				$this->empty_range();
			}
			else
			{
				//$query = $this->api->get_current($table);
				$this->response('Not Found', 404);
			}
		}
	}

	function exceed_limit()
	{
		$this->response(array('status' => 'false', 'message' => 'invalid', 'result' => 'You have reached limit to use this api'), 400);
	}

	function bad_request()
	{
		$this->response(array('status' => 'false', 'message' => 'invalid', 'error' => 'Date not exist'), 400);
	}

	function empty_range()
	{
		$this->response(array('status' => 'false', 'message' => 'invalid', 'error' => 'Date parameters missing'), 400);
	}

	function either_empty()
	{
		$this->response(array('status' => 'false', 'message' => 'invalid', 'error' => 'Either start date or end date doesnot exist'), 400);
	}

	function not_allowed()
	{
		$this->response(array('status' => 'false', 'message' => 'invalid', 'error' => 'Date Range Not Allowed'), 405);
	}

	function not_exist()
	{
		$this->response(array('status' => 'false', 'message' => 'invalid', 'error' => 'Date doesnot exist'), 404);
	}

}
