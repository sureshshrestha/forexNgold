<?php

/**
 * 
 */
class Chart extends CI_Model {

	function __construct()
	{
		parent:: __construct();
		$this->load->database();
	}

	function history_charts()
	{
<<<<<<< HEAD
		$this->db->select('UNIX_TIMESTAMP(Date)*1000, IC_buy,USD_buy,EUR_buy,GBP_buy,CHF_buy,JPY_buy,HKD_buy,AUD_buy,CAD_buy,SGD_buy,SAR_buy,SEK_buy,DKK_buy')->from('forex')->order_by('Date', 'asc');
=======
		$this->db->select('UNIX_TIMESTAMP(date_added)*1000, (IC_buy)/100,USD_buy,EUR_buy,GBP_buy,CHF_buy,JPY_buy,HKD_buy,AUD_buy,CAD_buy,SGD_buy,SAR_buy,SEK_buy,DKK_buy')->from('forex')->order_by('date_added', 'asc');
>>>>>>> 410f8fca42435a2a33c24aa2083e59953c661af2
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_charts($field)
	{
<<<<<<< HEAD
		$this->db->select($field)->from('forex')->order_by('Date', 'desc')->limit(1);
=======
		$this->db->select($field)->from('forex')->order_by('date_added', 'desc')->limit(1);
>>>>>>> 410f8fca42435a2a33c24aa2083e59953c661af2
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_charts_forex($field, $Date)
	{
<<<<<<< HEAD
		$this->db->select($field)->from('forex')->where('Date', $Date)->order_by('Date', 'desc')->limit(1);
=======
		$this->db->select($field)->from('forex')->where('date_added', $date_added)->order_by('date_added', 'desc')->limit(1);
>>>>>>> 410f8fca42435a2a33c24aa2083e59953c661af2
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_fields($var)
	{
		return $this->db->list_fields($var);
	}

	function get_table($table)
	{
		$this->db->select()->from($table);
		$query = $this->db->get();
		return $query->result_array();
	}

	function history_gold()
	{
		$this->db->select('UNIX_TIMESTAMP(Date)*1000,Hallmark,Tejabi,Silver')->from('goldpricenepal')->order_by('Date', 'asc');
		$query = $this->db->get();
		return $query->result_array();
	}

	function gold_chart()
	{
		$this->db->select()->from('goldpricenepal')->order_by('Date', 'desc')->limit(1);
		$query = $this->db->get();
		return $query->result_array();
	}

	function dual_chart()
	{
		$this->db->distinct();
<<<<<<< HEAD
		$this->db->select('UNIX_TIMESTAMP(forex.Date)*1000,forex.USD_buy,goldpricenepal.Hallmark')->from('forex')->join('goldpricenepal', 'forex.Date=goldpricenepal.Date', 'inner');
=======
		$this->db->select('UNIX_TIMESTAMP(forex.date_added)*1000,forex.USD_buy,goldpricenepal.hallmark_amt')->from('forex')->join('goldpricenepal', 'forex.date_added=goldpricenepal.date_added', 'inner');
>>>>>>> 410f8fca42435a2a33c24aa2083e59953c661af2
		$query = $this->db->get();
		return $query->result_array();
	}

	public function gold_chart_form($Date)
	{
		$this->db->select()->from('goldpricenepal')->where('Date', $Date)->limit(1);
		$query = $this->db->get();
		return $query->result_array();
	}

	function range($table, $date_from, $date_to)
	{
		$this->db->select()->from($table)->where('Date BETWEEN "' . date('Y-m-d', strtotime($date_from)) . '" and "' . date('Y-m-d', strtotime($date_to)) . '"');
		$query = $this->db->get();
		return $query->result_array();
	}

	function csv_range($table, $date_from, $date_to)
	{
		$this->db->select()->from($table)->where('Date BETWEEN "' . date('Y-m-d', strtotime($date_from)) . '" and "' . date('Y-m-d', strtotime($date_to)) . '"');
		$query = $this->db->get();
		return $query;
	}

	public function get_date($var)
	{
		$this->db->distinct();
		$this->db->select('Date')->from($var)->order_by('Date', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

}

?>