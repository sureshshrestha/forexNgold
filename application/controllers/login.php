<?php

class Login extends CI_Controller {

	function index()
	{
//		$data['main_content'] = 'login_form';
//			$this->load->view('includes/template', $data);
		$this->load->view('header_admin');
		$this->load->view('login_form');
		$this->load->view('footer');
//		$this->load->library('session');
	}

	function validate_credentials()
	{
		$this->load->model('admin_model');
		$query = $this->admin_model->validate();
//		console.log($query);
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