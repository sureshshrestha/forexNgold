<?php 
class Scrape_engine extends CI_Controller{ 
		protected $html = null;

	function __construct(){
		parent::__construct();
		
		$this->load->helper('simple_html_dom');
		$this->load->helper('nepali_calendar');
		$this->load->model('metal');
	}

	public function make_log(){
	date_default_timezone_set('Asia/kathmandu');
	$time= date('jS F Y h:i:s A');
	$file = 'log.txt';
	// Open the file to get existing content
	$current = file_get_contents($file);
	// Append a new person to the file
	$current .= "Gold & Silver Data for have been updated @::". $time .".\r\n";
	// Write the contents back to the file
	file_put_contents($file, $current, LOCK_EX);
}
		
		function _convert2AD($dateInBS){
        $engDate = new nepali_calendar();
		$y = $dateInBS['year'];
		$m = $dateInBS['month'];
		$d = $dateInBS['day'];
		//format month into corresponding digits
		switch ($m) {
			case 'Baisakh':
				# code...
				$mm = 1;
				break;
			case 'Jestha':
				# code...
				$mm = 2;
				break;
			case 'Ashad':
				# code...
				$mm = 3;
				break;
			case 'Shrawan':
				# code...
				$mm = 4;
				break;
			case 'Bhadra':
				# code...
				$mm = 5;
				break;
			case 'Ashoj':
				# code...
				$mm = 6;
				break;
			case 'Kartik':
				# code...
				$mm = 7;
				break;
			case 'Mansir':
				# code...
				$mm = 8;
				break;
			case 'Poush':
				# code...
				$mm = 9;
				break;
			case 'Magh':
				# code...
				$mm = 10;
				break;
			case 'Falgun':
				# code...
				$mm = 11;
				break;
			case 'Chaitra':
				# code...
				$mm = 12;
				break;
			default:
				# code...
				$mm = 0;
				break;
		}
		//calling nep_to_eng
		$temp = $engDate->nep_to_eng_formated($y, $mm, $d);
		//var_dump($temp);exit;
		return $temp;
	}

	function scrapeData(){
			$url = 'http://www.negosida.com.np/';
			//$url = 'http://localhost/forex_ci/lib/gold.html';
			$html = file_get_html($url);
			$scrapedDate = array('year' => null, 'month' => null, 'day' => null);
			
				//for date
				foreach ($html->find('div[id=calender]') as $dateToday) { 
					foreach($dateToday->find('h3') as $value){
					 	//$year =  $value->plaintext;
						$this->scrapedDate['year'] = $value->plaintext;
					}
					foreach($dateToday->find('h2') as $value){
						// $month =  $value->plaintext;
						$this->scrapedDate['month'] = $value->plaintext;
					}
					foreach($dateToday->find('h1') as $value){
						 // $day =  $value->plaintext;
						$this->scrapedDate['day'] = $value->plaintext;
					}

				}

			
				$dateBS=$this->_convert2AD($this->scrapedDate);
				$metalArray = array('date_added'=>null ,'hallmark_amt' => null , 'tejabi_amt' => null, 'silver_amt' => null);
				
				$temp = implode("-", $dateBS);
				$metalArray['date_added']= $temp; 
				
				$flag = 'hallmark';
				foreach ($html->find('div[id=goldContainer]') as $goldPrice) {
					foreach ($goldPrice->find('b') as $goldValue) {
						if($flag == 'hallmark'){
							$metalArray['hallmark_amt'] = $goldValue->plaintext;
							$flag = 'tejabi';
						}
						else if($flag == 'tejabi') {
							$metalArray['tejabi_amt'] = $goldValue->plaintext;
						}
						else
							return 'Error in scraping gold price!!!';
					}	
				}
				
				 
				foreach ($html->find('div[id=silverContainer] li B') as $silverPrice){
					$metalArray['silver_amt'] = $silverPrice->plaintext;
				}

				$metalArray=filter_var_array($metalArray,FILTER_SANITIZE_STRING);
				$this->metal->date_check($metalArray);
				$html->clear();
				unset($html);
				 $data['date'] = $dateBS;
				 $data['metal'] = $metalArray;
//				$this->load->view('header'); 
//				$this->load->view('home_1', $data); 
//    			
//				$this->load->view('footer'); 
//				
			redirect(base_url().'site');
			

}




 } 
?>
