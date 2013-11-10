<?php
	class Lamevaexposicio extends CI_Controller {
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
			$result = $this->sala->getSalaById(8);
			foreach($result as $row)
			{
				$data['titol'] = $row->titol;
				$data['salanext'] = $row->salanext;
				$data['salaprev'] = $row->salaprev;
			}
			
			$data['bautorretrat'] = $this->respostes->bapartatJaFet($session_data['username'], 3,1);
			if($this->respostes->bapartatJaFet($session_data['username'], 3,1) == true){
				$data['autoretratpropi'] = $this->respostes->getLaMevaRespostaFitxer($session_data['username'], 3,1);
			}
			$data['bgraffiti'] = $this->respostes->bapartatJaFet($session_data['username'], 4,2);
			if($this->respostes->bapartatJaFet($session_data['username'], 4,2) == true){
				$data['graffitipropi'] = $this->respostes->getLaMevaRespostaFitxer($session_data['username'], 4,2);
			}
			
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