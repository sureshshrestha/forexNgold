<?php

class Scrape_engine_forex extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('forex');
		$this->load->helper('simple_html_dom');
	}

	function index()
	{

		//$url = 'http://localhost/amr/forex_ci/lib/forex.html';
		$url = 'http://nrb.org.np/detailexchrate.php?YY=&&MM=&&DD=&&YY1=&&MM1=&&DD1=#';
		$html = file_get_html($url);
		//create an array for forex
		$forexArray = array('date_added' => null,
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
			$forexArray['date_added'] = $value[0];
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

		//to get forex_today.json
		$jsondata = json_encode($forexArray);
		$filesite= 'c:/wamp/www/forex_ci/lib/forex_today.json';
		if (file_put_contents($filesite, $jsondata))
			echo('Forex json file of ' . $forexArray['date_added'] . ' is created successfully.');
		else
		{
			echo('Error in Forex json creation!!!');
			exit();
		}
		
		$html->clear();
		unset($html);

		if ($forexArray['date_added'] == '' || $forexArray['date_added'] == 'null' || $forexArray['date_added'] == null)
		{
			echo "There is problem while scraping data!!";
			exit;
		}
		else
		{
			$this->forex->date_check($forexArray);
		}

		redirect(base_url() . 'site');
//				$forexArray['forex'] = $forexArray;
//				$this->load->view('header');  
//    			$this->load->view('home', $forexArray);  
//    			$this->load->view('footer'); 
	}

}

?>
