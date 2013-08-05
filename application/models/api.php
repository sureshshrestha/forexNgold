<?php 

/**
* 
*/
class api extends CI_Model
{
	
	function __construct(){
	            parent:: __construct();
	            $this->load->database();
        }


	function log_api_requests($ip,$key){
			mysql_query("INSERT INTO `api_log` (`ip`,`key`,`date`,`requests`) VALUES ('{$ip}','{$key}',NOW(),0) ON DUPLICATE KEY UPDATE `requests` = `requests` + 1") or die(mysql_error());  
				
		
}  
	function requests_excides($key){
			$this->db->select('requests')->from('api_log')->where('key',$key);
			$query = $this->db->get();
			return $query->result_array();
		
}       
	function select_date($date,$table) {
			$this->db->select()->from($table)->where('date_added',$date);
			$query = $this->db->get();
			return $query->result_array();
		}

	function date_range($date_from, $date_to,$table) {
			$this->db->select()->from($table)->where('date_added BETWEEN "'. date('Y-m-d', strtotime($date_from)). '" and "'. date('Y-m-d', strtotime($date_to)).'"');//between($date_from, $date_to);
			$query = $this->db->get();
			return $query->result_array();
	}

	function get_current($table) {
				$this->db->select()->from($table)->order_by('date_added','desc')->limit(1);;
				$query = $this->db->get();
				return $query->result_array();
			}
	


	 function register($name, $email, $ip,$key){

        	$this->db->set('user_name',$name);
			$this->db->set('email', $email);
			$this->db->set('ip', $ip);
			$this->db->set('api_key', $key);
			$this->db->insert('api_user');
        }

        function insert_key($key){
        	$this->db->set('key',$key);
        	$this->db->set('level',1);
          	$this->db->insert('keys');
        }

}
 ?>