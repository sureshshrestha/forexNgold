<?php 


		class Contact extends CI_Model
		{
			
			function __construct(){
	            parent:: __construct();
	            $this->load->database();
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
        	$this->db->set('level', 1);
        	//$this->db->set('date_created',NOW());
        	$this->db->insert('keys');
        }
    }?>