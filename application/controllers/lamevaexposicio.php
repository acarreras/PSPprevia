<?php
	class Lamevaexposicio extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	function index(){
		$this->load->library(array('form_validation'));
		$this->load->helper(array('form', 'url'));

		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$this->load->view('lamevaexposicio_view', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}
}
?>