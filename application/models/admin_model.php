<?php

	class Admin_model extends CI_Model
	{
		function validate()
		{
			echo ($this->input->post('username'));
			echo ($this->input->post('password'));
			$this->db->where('admin_name', $this->input->post('username'));
			$this->db->where('admin_password', md5($this->input->post('password')));
			$query = $this->db->get('admin');
			
			if($query->num_rows == 1)
			{
				return true;
			}
			else
			{
				echo ('Login error!!! Username and Password do not match.');
			}
		}
	}
