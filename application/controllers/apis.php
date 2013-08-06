<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/REST_Controller.php';
require APPPATH.'libraries/Format.php';

/**
* 
*/
class apis extends REST_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('api');
	}

	public function forex_get(){

		$table = 'final';
		$date = $this->get('date');
		$key = $this->get('key');
		$start = $this->get('start_date');
		$end = $this->get('end_date');
	
		$ip=$this->input->ip_address();
		$forex_buy= 0;
		$key_val = $this->api->requests_excides($key);

		foreach ($key_val as $values) {
			$keys = array_keys($values);
			$forex_buy= $values[$keys[0]];
		}
	
			if($forex_buy>=20){
				$this->exceed_limit();
			}
		
		
			else{
				$this->api->log_api_requests($ip, $key);
		
				if($date){  
        	
			            $query = $this->api->select_date($date,$table);  
			            if(empty($query)){
							//$this->response(array('status'=>'false','msg'=>'invalid','result'=>'Date not exist'), 400);
							$this->not_exist();
						} else {

						$this->response(array('status'=>'true','message'=>'valid','result'=>$query), 200);
					}

			        }   

			  		elseif($start&&$end)  
			        {  
			        	$low = strtotime($this->get('start_date'));		
						$high = strtotime($this->get('end_date'));
			        	if($low>$high){
			        		$this->not_allowed();        	}
			        	else{
			        	            $from = $this->api->select_date($start,$table);  
			        	            $to = $this->api->select_date($end,$table);  

			            			if(empty($from) || empty($to) || empty($from) && empty($to)){
			            				$this->either_empty();
			            			}
			            			else{
			        	            $query = $this->api->date_range($start,$end,$table);  
			        	            $this->response(array('status'=>'true','message'=>'valid','result'=>$query), 200);
			    		}
			        }
			}
			  		elseif(empty($start)||empty($end)||empty($start)&&empty($end)) {
			  			$this->empty_range();
			  		}

			        else{
			          //$query = $this->api->get_current($table);
			      		$this->response('Not Found', 404);
			      }
      		
 	}
}


	public function metal_get(){

		$table = 'goldpricenepal';
		$date = $this->get('date');
		$key = $this->get('key');
		$start = $this->get('start_date');
		$end = $this->get('end_date');
	
		$ip=$this->input->ip_address();
		$forex_buy= 0;
		if($key ='foo'){

		}
		$key_val = $this->api->requests_excides($key);

		foreach ($key_val as $values) {
			$keys = array_keys($values);
			$forex_buy= $values[$keys[0]];
		}
	
			if($forex_buy>=15){
				$this->exceed_limit();
			}
		
		
			else{
				$this->api->log_api_requests($ip, $key);
		
				if($date){  
        	
			            $query = $this->api->select_date($date,$table);  
			            if(empty($query)){
							//$this->response(array('status'=>'false','msg'=>'invalid','result'=>'Date not exist'), 400);
							$this->not_exist();
						} else {

						$this->response(array('status'=>'true','message'=>'valid','result'=>$query), 200);
					}

			        }   

			  		elseif($start&&$end)  
			        {  
			        	$low = strtotime($this->get('start_date'));		
						$high = strtotime($this->get('end_date'));
			        	if($low>$high){
			        		$this->not_allowed();        	}
			        	else{
			        	            $from = $this->api->select_date($start,$table);  
			        	            $to = $this->api->select_date($end,$table);  

			            			if(empty($from) || empty($to) || empty($from) && empty($to)){
			            				$this->either_empty();
			            			}
			            			else{
			        	            $query = $this->api->date_range($start,$end,$table);  
			        	            $this->response(array('status'=>'true','message'=>'valid','result'=>$query), 200);
			    		}
			        }
			}
			  		elseif(empty($start)||empty($end)||empty($start)&&empty($end)) {
			  			$this->empty_range();
			  		}

			        else{
			          //$query = $this->api->get_current($table);
			      		$this->response('Not Found', 404);
			      }
      		
 	}
}


// 
// 
		function exceed_limit(){
			$this->response(array('status'=>'false','message'=>'invalid','result'=>'You have reached limit to use this api'), 400);
		}
 		// function success(){
 		// 	$this->response(array('status'=>'true','message'=>'valid','result'=>$query), 200);
 		// }

 		function bad_request(){
 			$this->response(array('status'=>'false','message'=>'invalid','error'=>'Date not exist'),400);
 		}

 		function empty_range(){
 			$this->response(array('status'=>'false','message'=>'invalid','error'=>'Date parameters missing'),400);
 		}
 		function either_empty(){
 			$this->response(array('status'=>'false','message'=>'invalid','error'=>'Either start date or end date doesnot exist'),400);
 		}
 		function not_allowed(){
 			$this->response(array('status'=>'false','message'=>'invalid','error'=>'Date Range Not Allowed'),405);
 		}

 		function not_exist(){
 			$this->response(array('status'=>'false','message'=>'invalid','error'=>'Date doesnot exist'),404);
 		}

		


}
 ?>