<?php 


		class metal extends CI_Model
		{
			
			function get_metal($num=20,$start=0){
				$this->db->select()->from('forex')->limit($num,$start);
				$query=$this->db->get();
				return $query->result_array();

		}
			function get_current_metal(){
				$this->db->select()->from('goldpricenepal')->order_by('date_added','desc');
				$query=$this->db->get();
				return $query->first_row('array');
		}

			function insert_metal($metalArray){
				$this->db->insert('goldpricenepal', $metalArray);
				return $this->db->insert_id();
		}


			public function make_log(){
				date_default_timezone_set('Asia/kathmandu');
				$time= date('jS F Y h:i:s A');
				$file = 'log.txt';
				// Open the file to get existing content
				$current = file_get_contents($file);
				// Append a new person to the file
				$current .= "Gold & Silver Data for have been updated at: ". $time .".\r\n";
				// Write the contents back to the file
				file_put_contents($file, $current, LOCK_EX);
}

			function date_check($metalArray){
			$ql = $this->db->select('date_added')->from('goldpricenepal')->where('date_added',	$metalArray['date_added'])->get();

			if( $ql->num_rows() > 0 ) {} else {
			$this->db->insert('goldpricenepal', $metalArray);
			$this->make_log();
			return $this->db->insert_id();

			}
			
 		
		}
			function date_exist(){
				$date_exist = "SELECT date FROM goldpricenepal WHERE date='$value[0]'";
	    		$resultdb = mysql_query($date_exist) or die(mysql_error());
				$idtemp = mysql_fetch_array($resultdb) ; //list($idtemp)

			}

			

}

 ?>