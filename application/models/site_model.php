<?php

	class Site_model extends CI_Model{
		
		public function __construct()
		{
			parent::__construct();
		}
				
		function get_records()
		{
			$query = $this->db->get('forex');
			return $query->result(); 
		}
		
		function get_record_gold()
		{
			$query = $this->db->get('goldpricenepal');
			return $query->result();
		}
		
		function update_record()
		{
			$date = $this->input->post('newValue0');
			$update_array= array(
					'ic_buy' => $this->input->post('newValue1'),
					'ic_sell' => $this->input->post('newValue2'),
					'usDollar_buy' => $this->input->post('newValue3'),
					'usDollar_sell' => $this->input->post('newValue4'),
					'euro_buy' => $this->input->post('newValue5'),
					'euro_sell' => $this->input->post('newValue6'),
					'stPound_buy' => $this->input->post('newValue7'),
					'stPound_sell' => $this->input->post('newValue8'),
					'swissFranc_buy' => $this->input->post('newValue9'),
					'swissFranc_sell' => $this->input->post('newValue10'),
					'ausDollar_buy' => $this->input->post('newValue11'),
					'ausDollar_sell' => $this->input->post('newValue12'),
					'canDollar_buy' => $this->input->post('newValue13'),
					'canDollar_sell' => $this->input->post('newValue14'),
					'singDollar_buy' => $this->input->post('newValue15'),
					'singDollar_sell' => $this->input->post('newValue16'),
					'yen_buy' => $this->input->post('newValue17'),
					'yen_sell' => $this->input->post('newValue18'),
					'yuan_buy' => $this->input->post('newValue19'),
					'yuan_sell' => $this->input->post('newValue20'),
					'swedishKr_buy' => $this->input->post('newValue21'),
					'swedishKr_buy' => $this->input->post('newValue22'),
					'danishKr_buy' => $this->input->post('newValue23'),
					'hkDollar_buy' => $this->input->post('newValue25'),
					'saRiyal_buy' => $this->input->post('newValue27'),
					'saRiyal_sell' => $this->input->post('newValue28'),
					'qatRiyal_buy' => $this->input->post('newValue29'),
					'qatRiyal_sell' => $this->input->post('newValue30'),
					'baht_buy' => $this->input->post('newValue31'),
					'baht_sell' => $this->input->post('newValue32'),
					'dirham_buy' => $this->input->post('newValue33'),
					'dirham_sell' => $this->input->post('newValue34'),
					'ringgit_buy' => $this->input->post('newValue35'),
					'ringgit_sell' => $this->input->post('newValue36'),
					'won_buy' => $this->input->post('newValue37'),
					'won_sell' => $this->input->post('newValue38')
					);
			$this->db->where('date_added', $date);
			$this->db->update('forex', $update_array);
			return;
		}
		
		function checkIfNullTextBox($forexData)
		{
			if ($forexData == '' || $forexData == NULL)
			{
				$defaultValue = 0;
				return $defaultValue;
			}
		}
				
		function delete_row()
		{
			$this->db->where('date_added', $this->uri->segment(3));
			$this->db->delete('forex');
			return;
		}
		
		function forex_get($date)
		{
			$query = $this->db->get_where('forex', array('date_added' => $date));
			return $query->row_array();
		}
		
		function delete_row_gold()
		{
			$this->db->where('date_added', $this->uri->segment(3));
			$this->db->delete('goldpricenepal');
			return;
		}
		
		function gold_get($date)
		{
			$query = $this->db->get_where('goldpricenepal', array('date_added' => $date));
			return $query->row_array();
		}
		
		function update_record_gold()
		{
			$date = $this->input->post('newValue0');
			$update_array= array(
					'hallmark_amt' => $this->input->post('newValue1'),
					'tejabi_amt' => $this->input->post('newValue2'),
					'silver_amt' => $this->input->post('newValue3'),
					);
			$this->db->where('date_added', $date);
			$this->db->update('goldpricenepal', $update_array);
			return;
		}
		
		//for pagination
		public function record_count()
		{
			return $this->db->count_all('forex');
		}
		public function record_count_gold()
		{
			return $this->db->count_all('goldpricenepal');
		}
		
		public function fetch_forex($limit, $start)
		{
			$this->db->limit($limit, $start);
			$query = $this->db->get('forex');
			
			if($query->num_rows() > 0)
			{
				foreach($query->result() as $row)
				{
					$data[] = $row;
				}
				return $data;
			}
			return false;
		}
		public function fetch_gold($limit, $start)
		{
			$this->db->limit($limit, $start);
			$query = $this->db->get('goldpricenepal');
			if($query->num_rows() > 0)
			{
				foreach($query->result() as $row)
				{
					$data[] = $row;
				}
				return $data;
			}
			return false;
		}
	}