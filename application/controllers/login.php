<?php

class Login extends CI_Controller {

	function index()
	{
		$this->load->view('header_admin');
		$this->load->view('login_form');
		$this->load->view('footer');
	}

	function validate_credentials()
	{
		$this->load->model('admin_model');
		$query = $this->admin_model->validate();
		if ($query)
		{
			$data = array(
				'username' => $this->input->post('username'),
				'is_logged_in' => true
			);

			$this->session->set_userdata($data);
			redirect('site');
		}
		else
		{
			$this->index();
		}
	}
}