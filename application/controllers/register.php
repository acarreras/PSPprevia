<?php
	class Register extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	function index(){
		$this->load->library(array('form_validation'));
		$this->load->helper(array('form', 'url'));
		$this->load->view('register_view');
	}
}
?>