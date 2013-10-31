<?php
	class Saladeljo extends CI_Controller {
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
			$result = $this->sala->getSalaById(3);
			foreach($result as $row)
			{
				$data['titol'] = $row->titol;
				$data['salanext'] = $row->salanext;
				$data['salaprev'] = $row->salaprev;
			}
			$data['titolapartat1'] = $this->apartats->getApartatTitol(11);
			$data['titolapartat2'] = $this->apartats->getApartatTitol(12);
			
			// TODO: no sé comptar amb querys :-(
			$data['bapartat1fet'] = false;//$this->respostes->bapartatJaFet($session_data['username'], 3,1);
			$data['bapartat2fet'] = false;//$this->respostes->bapartatJaFet($session_data['username'], 3,2);
			
			$data['lemapropi'] = $this->respostes->getLaMevaRespostaText($session_data['username'], 3,2);
			$data['lemaaltres'] = $this->respostes->getAltresRespostaText($session_data['username'], 3,2);
			
			$this->load->view('saladeljo_view', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
		
	}
	
	function guardarLema(){
		$session_data = $this->session->userdata('logged_in');
		
		$results = $this->respostes->getUltimsTexts(3,2);
		$str = '';
		foreach ($results as  $row) {
			$str .= $row->respostatext;
			$str .= "<br/>";
		}
		
		$this->respostes->guardarText($this->input->post('titol'), $session_data['username'], 3,2);
		
		echo $str;
	}
}
?>