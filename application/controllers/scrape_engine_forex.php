<?php

class Scrape_engine_forex extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('forex');
		$this->load->model('chart');
		$this->load->helper('simple_html_dom');
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
    function current_forex()
	{
		$col_name = $this->chart->get_fields('forex');
		$col_buy = 'UNIX_TIMESTAMP(Date)*1000,';
		$col_sell = 'UNIX_TIMESTAMP(Date)*1000,';
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
	function index()
	{

//		$url = 'http://localhost/forex_ci/lib/forex.html';
		$url = 'http://nrb.org.np/detailexchrate.php?YY=&&MM=&&DD=&&YY1=&&MM1=&&DD1=#';
		$html = file_get_html($url);
		//create an array for forex
		$forexArray = array('Date' => null,
			'IC_buy' => null, 'IC_sell' => null, 'USD_buy' => null, 'USD_sell' => null, 'EUR_buy' => null, 'EUR_sell' => null, 'GBP_buy' => null, 'GBP_sell' => null, 'CHF_buy' => null, 'CHF_sell' => null, 'AUD_buy' => null, 'AUD_sell' => null, 'CAD_buy' => null, 'CAD_sell' => null, 'SGD_buy' => null, 'SGD_sell' => null, 'JPY_buy' => null, 'JPY_sell' => null, 'CNY_buy' => null, 'CNY_sell' => null, 'SEK_buy' => null, 'DKK_buy' => null, 'HKD_buy' => null, 'SAR_buy' => null, 'SAR_sell' => null, 'QAR_buy' => null, 'QAR_sell' => null, 'THB_buy' => null, 'THB_sell' => null, 'AED_buy' => null, 'AED_sell' => null, 'MYR_buy' => null, 'MYR_sell' => null, 'KPW_buy' => null, 'KPW_sell' => null,
		);
		$fData = array();
		foreach ($html->find('table[bordercolor=#FFFFCC] tr[!bgcolor]') as $row)
		{
			// initialize array to store the cell data from each row
			$rowData = array();
			foreach ($row->find('td') as $cell)
			{
				// push the cell's text to the array
				$rowData[] = $cell->plaintext;
			}
			$fData[] = filter_var_array($rowData, FILTER_SANITIZE_STRING);
		}
		//var_dump($fData);
		unset($fData[1]);
		foreach ($fData as $key => $value)
		{
			// $i= strip_tags(trim($value[0]));
			$forexArray['Date'] = $value[0];
			$forexArray['IC_buy'] = $value[1];
			$forexArray['IC_sell'] = $value[2];
			$forexArray['USD_buy'] = $value[3];
			$forexArray['USD_sell'] = $value[4];
			$forexArray['EUR_buy'] = $value[5];
			$forexArray['EUR_sell'] = $value[6];
			$forexArray['GBP_buy'] = $value[7];
			$forexArray['GBP_sell'] = $value[8];
			$forexArray['CHF_buy'] = $value[9];
			$forexArray['CHF_sell'] = $value[10];
			$forexArray['AUD_buy'] = $value[11];
			$forexArray['AUD_sell'] = $value[12];
			$forexArray['CAD_buy'] = $value[13];
			$forexArray['CAD_sell'] = $value[14];
			$forexArray['SGD_buy'] = $value[15];
			$forexArray['SGD_sell'] = $value[16];
			$forexArray['JPY_buy'] = $value[17];
			$forexArray['JPY_sell'] = $value[18];
			$forexArray['CNY_buy'] = $value[19];
			$forexArray['CNY_sell'] = $value[20];
			$forexArray['SEK_buy'] = $value[21];
			//$forexArray['_sell'] = $value[];
			$forexArray['DKK_buy'] = $value[22];
			// $forexArray['_sell'] = $value[];
			$forexArray['HKD_buy'] = $value[23];
			// $forexArray['_sell'] = $value[];
			$forexArray['SAR_buy'] = $value[24];
			$forexArray['SAR_sell'] = $value[25];
			$forexArray['QAR_buy'] = $value[26];
			$forexArray['QAR_sell'] = $value[27];
			$forexArray['THB_buy'] = $value[28];
			$forexArray['THB_sell'] = $value[29];
			$forexArray['AED_buy'] = $value[30];
			$forexArray['AED_sell'] = $value[31];
			$forexArray['MYR_buy'] = $value[32];
			$forexArray['MYR_sell'] = $value[33];
			$forexArray['KPW_buy'] = $value[34];
			$forexArray['KPW_sell'] = $value[35];
		}
		$html->clear();
		unset($html);

		if ($forexArray['Date'] == '' || $forexArray['Date'] == 'null' || $forexArray['Date'] == null)
		{
			$forexArray['result'] = "There is problem while scraping data!!";
			exit;
		}
		else
		{
			if(($this->forex->date_check($forexArray)) == TRUE){
                $forexArray['exist'] = ('Forex data already exists of ' . $forexArray['Date'] . '.');
            }ELSE{
            $this->forex_json();
            $this->current_forex();
			//to get forex_today.json
			$jsondata = json_encode($forexArray, JSON_NUMERIC_CHECK);
			$filesite = FCPATH . '/lib/forex_today.json';
			file_put_contents($filesite, $jsondata);
			$forexArray['result'] = ('Forex data scraped successfully and Forex json file of ' . $forexArray['Date'] . ' is created successfully.');
            }
		}

		$this->load->view('header_admin');
		$this->load->view('scrape_view', $forexArray);
		$this->load->view('footer');
	}
}

?>
