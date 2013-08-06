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
				$date_array[$date['date_added']] = $date['date_added'];
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
									$jsondata[] = array('Date' => $row['date_added'],
										'Hallmark Gold' => $row['hallmark_amt'],
										'Tejabi GOld' => $row['tejabi_amt'],
										'Silver' => $row['silver_amt']
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
					elseif ($table == 'final')
					{
						switch ($format)
						{
							case 'json':

								foreach ($fetch as $row)
								{
									$jsondata[] = array('date_added' => $row['date_added'],
										'IC_buy' => $row['IC_buy'], 'IC_sell' => $row['IC_sell'], 'USD_buy' => $row['USD_buy'], 'USD_sell' => $row['USD_sell'], 'EUR_buy' => $row['EUR_buy'], 'EUR_sell' => $row['EUR_sell'], 'GBP_buy' => $row['GBP_buy'], 'GBP_sell' => $row['GBP_sell'], 'CHF_buy' => $row['CHF_buy'], 'CHF_sell' => $row['CHF_sell'], 'AUD_buy' => $row['USD_buy'], 'AUD_sell' => $row['AUD_sell'], 'CAD_buy' => $row['CAD_buy'], 'CAD_sell' => $row['CAD_sell'], 'SGD_buy' => $row['SGD_buy'], 'SGD_sell' => $row['SGD_sell'], 'JPY_buy' => $row['JPY_buy'], 'JPY_sell' => $row['JPY_sell'], 'CNY_buy' => $row['CNY_buy'], 'CNY_sell' => $row['CNY_sell'], 'SEK_buy' => $row['SEK_buy'], 'DKK_buy' => $row['DKK_buy'], 'HKD_buy' => $row['HKD_buy'], 'SAR_buy' => $row['SAR_buy'], 'SAR_sell' => $row['SAR_sell'], 'QAR_buy' => $row['QAR_buy'], 'QAR_sell' => $row['QAR_sell'], 'THB_buy' => $row['THB_buy'], 'THB_sell' => $row['THB_sell'], 'AED_buy' => $row['AED_buy'], 'AED_sell' => $row['AED_sell'], 'MYR_buy' => $row['MYR_buy'], 'MYR_sell' => $row['MYR_sell'], 'KPW_buy' => $row['KPW_buy'], 'KPW_sell' => $row['KPW_sell']
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