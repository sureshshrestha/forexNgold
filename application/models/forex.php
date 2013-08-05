<?php 


		class forex extends CI_Model
		{
			
			function __construct(){
	            parent:: __construct();
	            $this->load->database();
        }
			function get_forex($num=20,$start=0){
				$this->db->select()->from('forex')->limit($num,$start);
				$query=$this->db->get();
				return $query->result_array();

		}
			function get_current_forex(){
				$this->db->select()->from('final')->order_by('date_added','desc');
				$query=$this->db->get();
				return $query->first_row('array');
		}

			function insert_forex($forexArray){
				$this->db->insert('forex',$forexArray);
				return $this->db->insert_id();
		}

			public function make_log(){
				date_default_timezone_set('Asia/kathmandu');
				$time= date('jS F Y h:i:s A');
				$file = 'log.txt';
				// Open the file to get existing content
				$current = file_get_contents($file);
				// Append a new person to the file
				$current .= "Forex data has been updated at:". $time .".\r\n";
				// Write the contents back to the file
				file_put_contents($file, $current, LOCK_EX);
			}



			function date_check($forexArray){
				
			$ql = $this->db->select('date_added')->from('final')->where('date_added',$forexArray['date_added'])->get();

			if( $ql->num_rows() > 0 ) {} else {
			$this->db->insert('final', $forexArray);
			$this->make_log();
			return $this->db->insert_id();

			}
			
 		
		}
		// function date_exist(){
		// 		$date_exist = "SELECT date_added FROM forex WHERE date_added='{$value[0]}'";
	 //    		$resultdb = mysql_query($date_exist) or die(mysql_error());
		// 		$idtemp = mysql_fetch_array($resultdb) ; //list($idtemp)
		// 		return $idtemp;

		// 	}

			

}

 ?>