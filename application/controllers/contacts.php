<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/REST_Controller.php';
//require APPPATH.'controllers/key.php';
class Contacts extends CI_Controller{
	
	function __construct()
	{	
		parent::__construct();
		$this->load->model('api');
		$this->load->helper('form');
		$this->load->library('email');
		$this->load->library('form_validation');
	}


	function index()
	{
		$this->load->view('header');
		$this->load->view('contact');
		$this->load->view('footer');
	}

	function user_register(){
		if($_POST){
			$email= $_POST['email'];
			$name= $_POST['username'];
			

    		if ( $this->api->email_exists($email) == TRUE ) {
		      echo "Email already exist!! Check the documentation to get more api keys.";
		      
		    } 

		    else {
		     
			$ip = $this->input->ip_address();
			
    		$key = md5(uniqid(rand(), TRUE));
    		 $this->api->insert_key($key);
			 $this->api->register($name, $email, $ip, $key);

			 ini_set("SMTP", "smtp.wlink.com.np");
				$to      = $email;
				$subject = 'forex_ci api key';
				$message = 'Mr/s. '.$name.', the api key is "'. $key. '". Keep it safe for proper use!!';
				$headers = 'From: forex_ci<noreply@forex_ci.com>' . "\r\n" .'X-Mailer: PHP/' . phpversion();

				mail($to, $subject, $message,$headers);
				echo "We will send you api key shortly, check you mail!!";
			//echo $key;

			
		}
    	
	}
}
	function test(){
				ini_set('SMTP', "smtp.wlink.com.np");
				ini_set('smtp_port',"25");
				$this->email->from('your@example.com', 'Your Name');
				$this->email->to('sagaraff@yahoo.com'); 
				$this->email->cc('another@another-example.com'); 
				$this->email->bcc('them@their-example.com'); 

				$this->email->subject('Email Test');
				$this->email->message('Testing the email class.');	

				$this->email->send();

				echo $this->email->print_debugger();

}
	
}
 ?>