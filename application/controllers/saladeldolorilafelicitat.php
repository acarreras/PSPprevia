<?php
	class Saladeldolorilafelicitat extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('sala','',TRUE);
		$this->load->model('apartats','',TRUE);
		$this->load->model('respostes','',TRUE);
		$this->load->helper(array('form', 'url'));
	}

	function index(){
		$this->load->library(array('form_validation'));

		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$result = $this->sala->getSalaById(6);
			foreach($result as $row)
			{
				$data['titol'] = $row->titol;
				$data['salanext'] = $row->salanext;
				$data['salaprev'] = $row->salaprev;
			}
			$data['titolapartat1'] = $this->apartats->getApartatTitol(16);
			$data['titolapartat2'] = $this->apartats->getApartatTitol(17);
			
			$data['bapartat1fet'] = $this->respostes->bapartatJaFet($session_data['username'], 6,1);
			$data['bapartat2fet'] = $this->respostes->bapartatJaFet($session_data['username'], 6,2);
			
			$this->load->view('saladeldolorilafelicitat_view', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
		
	}
}
?>