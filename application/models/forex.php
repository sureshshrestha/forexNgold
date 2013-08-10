<?php
class forex extends CI_Model {

	function __construct()
	{
		parent:: __construct();
		$this->load->database();
	}

	function get_forex($num = 20, $start = 0)
	{
		$this->db->select()->from('forex')->limit($num, $start);
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_current_forex()
	{
		$this->db->select()->from('forex')->order_by('Date', 'desc');
		$query = $this->db->get();
		return $query->first_row('array');
	}

	function insert_forex($forexArray)
	{
		$this->db->insert('forex', $forexArray);
		return $this->db->insert_id();
	}

	public function make_log()
	{
		date_default_timezone_set('Asia/kathmandu');
		$time = date('jS F Y h:i:s A');
		$file = 'log.txt';
		// Open the file to get existing content
		$current = file_get_contents($file);
		// Append a new person to the file
		$current .= "Forex data has been updated at:" . $time . ".\r\n";
		// Write the contents back to the file
		file_put_contents($file, $current, LOCK_EX);
	}

	function date_check($forexArray)
	{
		$ql = $this->db->select('Date')->from('forex')->where('Date', $forexArray['Date'])->get();

		if ($ql->num_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			$this->db->insert('forex', $forexArray);
			$this->make_log();
			return $this->db->insert_id();
		}
	}
}

?>