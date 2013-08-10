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
		$this->db->select('UNIX_TIMESTAMP(Date)*1000, IC_buy,USD_buy,EUR_buy,GBP_buy,CHF_buy,JPY_buy,HKD_buy,AUD_buy,CAD_buy,SGD_buy,SAR_buy,SEK_buy,DKK_buy')->from('forex')->order_by('Date', 'asc');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_charts($field)
	{
		$this->db->select($field)->from('forex')->order_by('Date', 'desc')->limit(1);
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_charts_forex($field, $Date)
	{
		$this->db->select($field)->from('forex')->where('Date', $Date)->order_by('Date', 'desc')->limit(1);
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
		$this->db->select('UNIX_TIMESTAMP(forex.Date)*1000,forex.USD_buy,goldpricenepal.Hallmark')->from('forex')->join('goldpricenepal', 'forex.Date=goldpricenepal.Date', 'inner');
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