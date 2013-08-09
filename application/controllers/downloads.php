<?php

/**
 * 
 */
class Downloads extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('download');
		$this->load->model('chart');
		$this->load->helper('form');
		$this->load->dbutil();
	}

	function index()
	{
		$data = array();
		// $data['dates'] = $this->chart->get_date('goldpricenepal');
		$this->load->view('header');
		$this->load->view('download_page');
		$this->load->view('footer');
	}

	function table_call()
	{

		if ($_POST)
		{
			$table = $_POST['field_type'];
			$dates = $this->chart->get_date($table);
			$date_array = array();
			foreach ($dates as $date)
			{
				$date_array[$date['Date']] = $date['Date'];
			}
			echo "From: &nbsp";
			echo form_dropdown('date_from', $date_array);
			echo "<br>";
			echo "To: &nbsp&nbsp&nbsp&nbsp&nbsp";
			echo form_dropdown('date_to', $date_array);
		}
	}

	function main()
	{
		if ($_POST)
		{

			if (empty($_POST['table']))
			{
				echo "<script>alert('Field Empty');</script>";
				$location = base_url() . "downloads";
				echo "<script>window.location.href='" . $location . "';</script>";
			}
			elseif ($_POST['date_from'] && $_POST['date_to'])
			{

				$result = array();
				$row = array();
				$jsondata = array();
				$format = $_POST['format'];
				$table = $_POST['table'];
				$date_from = $_POST['date_from'];
				$date_to = $_POST['date_to'];

				$low = strtotime($date_from);
				$high = strtotime($date_to);

				if ($low > $high)
				{

					echo "<script>alert('Date range not valid');</script>";
					$location = base_url() . "downloads";
					echo "<script>window.location.href='" . $location . "';</script>";
				}
				else
				{


					$fetch = $this->chart->range($table, $date_from, $date_to);
					$query = $this->chart->csv_range($table, $date_from, $date_to);
					$field = $this->chart->get_fields($table);

					if ($table == 'goldpricenepal')
					{
						switch ($format)
						{
							case 'json':
								foreach ($fetch as $row)
								{
									$jsondata[] = array('Date' => $row['Date'],
										'Hallmark Gold' => $row['Hallmark'],
										'Tejabi GOld' => $row['Tejabi'],
										'Silver' => $row['Silver']
									);
								}

								force_download('gold&siver.json', json_encode($jsondata));
								break;

							case 'xml':
								header("Content-type: text/xml");
								$XML = "<?xml version=\"1.0\"?>\n";

								$XML .= "<result>\n"; // root node   

								foreach ($fetch as $row)
								{

									$XML .= "\t<row>\n";
									$index = 0;  // for field name index

									foreach ($row as $cell)
									{
										// escaping illegal characters
										$cell = str_replace("&", "&amp;", $cell);
										$cell = str_replace("<", "&lt;", $cell);
										$cell = str_replace(">", "&gt;", $cell);
										$cell = str_replace("\"", "&quot;", $cell);
										$col_name = $field[$index];
										$XML .= "\t\t<" . $col_name . ">" . $cell . "</" . $col_name . ">\n";
										$index++;
									}
									$XML .= "\t</row>\n";
								}
								$XML .= "</result>\n";
								$file = FCPATH . 'lib/metal.xml';
								file_put_contents($file, $XML);

								force_download('gold&siver.xml', $XML);

								break;

							case 'csv':

								$delimiter = ",";
								$newline = "\r\n";
								$data = $this->dbutil->csv_from_result($query, $delimiter, $newline);

								force_download('gold&siver.csv', $data);
								break;
						}
					}
					elseif ($table == 'forex')
					{
						switch ($format)
						{
							case 'json':

								foreach ($fetch as $row)
								{
									$jsondata[] = array('Date' => $row['Date'],
										'IC Buy' => $row['IC_buy'], 'IC Sell' => $row['IC_sell'], 'USD Buy' => $row['USD_buy'], 'USD Sell' => $row['USD_sell'], 'EUR Buy' => $row['EUR_buy'], 'EUR Sell' => $row['EUR_sell'], 'GBP Buy'=> $row['GBP_buy'], 'GBP Sell' => $row['GBP_sell'], 'CHF buy' => $row['CHF_buy'], 'CHF Sell' => $row['CHF_sell'], 'AUD Buy' => $row['AUD_buy'], 'AUD Sell' => $row['AUD_sell'], 'CAD Buy' => $row['CAD_buy'], 'CAD Sell' => $row['CAD_sell'], 'SGD Buy' => $row['SGD_buy'], 'SGD Sell' => $row['SGD_sell'], 'JPY Buy' => $row['JPY_buy'], 'JPY Sell' => $row['JPY_sell'], 'CNY Buy' => $row['CNY_buy'], 'CNY Sell' => $row['CNY_sell'], 'SEK Buy' => $row['SEK_buy'], 'DKK Buy' => $row['DKK_buy'], 'HKD Buy' => $row['HKD_buy'], 'SAR Buy' => $row['SAR_buy'], 'SAR Sell' => $row['SAR_sell'], 'QAR Buy' => $row['QAR_buy'], 'QAR Sell' => $row['QAR_sell'], 'THB Buy' => $row['THB_buy'], 'THB Sell' => $row['THB_sell'], 'AED Buy' => $row['AED_buy'], 'AED Sell' => $row['AED_sell'], 'MYR Buy' => $row['MYR_buy'], 'MYR Sell' => $row['MYR_sell'], 'KPW Buy' => $row['KPW_buy'], 'KPW Sell' => $row['KPW_sell']
									);
								}
								force_download('forex.json', json_encode($jsondata));
								break;
							case 'xml':

								header("Content-type: text/xml");
								$XML = "<?xml version=\"1.0\"?>\n";

								$XML .= "<result>\n";

								foreach ($fetch as $row)
								{

									$XML .= "\t<row>\n";
									$index = 0;
									
									foreach ($row as $cell)
									{
										// escaping illegal characters
										$cell = str_replace("&", "&amp;", $cell);
										$cell = str_replace("<", "&lt;", $cell);
										$cell = str_replace(">", "&gt;", $cell);
										$cell = str_replace("\"", "&quot;", $cell);

										$field[$index] = str_replace('_buy', 'Buy', $field[$index]);
										$field[$index] = str_replace('_sell','Sell', $field[$index]);
										

										$col_name = $field[$index];
										$XML .= "\t\t<" . $col_name . ">" . $cell . "</" . $col_name . ">\n";
										$index++;
									}
									$XML .= "\t</row>\n";
								}
								$XML .= "</result>\n";
								$file = FCPATH . 'lib/xml.xml';
								file_put_contents($file, $XML);

								force_download('forex.xml', $XML);

								break;

							case 'csv':

								$delimiter = ",";
								$newline = "\r\n";
								$data = $this->dbutil->csv_from_result($query, $delimiter, $newline);


								force_download('forex.csv', $data);
								break;
						}
					}
				}
			}
		}
	}

	function download_api_doc()
	{
		$data = file_get_contents('http://localhost/forex_ci/lib/api_doc.pdf');
		force_download('API_Documentation.pdf', $data);
	}

}

?>