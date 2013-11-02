<?php
	class Saladelso extends CI_Controller {
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
			$result = $this->sala->getSalaById(2);
			foreach($result as $row)
			{
				$data['titol'] = $row->titol;
				$data['salanext'] = $row->salanext;
				$data['salaprev'] = $row->salaprev;
			}
			$data['titolapartat1'] = $this->apartats->getApartatTitol(4); // 4 perque a la taula apartats aquest titol té id 4
			$data['titolapartat2'] = $this->apartats->getApartatTitol(5);
			$data['titolapartat3'] = $this->apartats->getApartatTitol(6);
			
			$data['bapartat11fet'] = $this->respostes->bapartatJaFet($session_data['username'], 2,11);
			$data['bapartat12fet'] = $this->respostes->bapartatJaFet($session_data['username'], 2,12);
			$data['bapartat13fet'] = $this->respostes->bapartatJaFet($session_data['username'], 2,13);
			$data['bapartat14fet'] = $this->respostes->bapartatJaFet($session_data['username'], 2,14);
			$data['bapartat21fet'] = $this->respostes->bapartatJaFet($session_data['username'], 2,21);
			$data['bapartat22fet'] = $this->respostes->bapartatJaFet($session_data['username'], 2,22);
			$data['bapartat3fet']  = $this->respostes->bapartatJaFet($session_data['username'], 2,3);
			
			$data['titolso1propi'] = $this->respostes->getLaMevaRespostaText($session_data['username'], 2,11);
			$data['titolso1resposta'] = $this->respostes->getNomSo(2,11);
			$data['titolso2propi'] = $this->respostes->getLaMevaRespostaText($session_data['username'], 2,12);
			$data['titolso2resposta'] = $this->respostes->getNomSo(2,12);
			$data['titolso3propi'] = $this->respostes->getLaMevaRespostaText($session_data['username'], 2,13);
			$data['titolso3resposta'] = $this->respostes->getNomSo(2,13);
			$data['titolso4propi'] = $this->respostes->getLaMevaRespostaText($session_data['username'], 2,14);
			$data['titolso4resposta'] = $this->respostes->getNomSo(2,14);
			
			$this->load->view('saladelso_view', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}
		
	function guardarTitolSo1(){
		$session_data = $this->session->userdata('logged_in');
		
		$result = $this->respostes->getNomSo(2,11);
		
		$this->respostes->guardarText($this->input->post('titol'), $session_data['username'], 2, 11);
		
		echo $result;
	}
	
	function guardarTitolSo2(){
		$session_data = $this->session->userdata('logged_in');
		
		$result = $this->respostes->getNomSo(2,12);
		
		$this->respostes->guardarText($this->input->post('titol'), $session_data['username'], 2, 12);
		
		echo $result;
	}
	
	function guardarTitolSo3(){
		$session_data = $this->session->userdata('logged_in');
		
		$result = $this->respostes->getNomSo(2,13);
		
		$this->respostes->guardarText($this->input->post('titol'), $session_data['username'], 2, 13);
		
		echo $result;
	}
	
	function guardarTitolSo4(){
		$session_data = $this->session->userdata('logged_in');
		
		$result = $this->respostes->getNomSo(2,14);
		
		$this->respostes->guardarText($this->input->post('titol'), $session_data['username'], 2, 14);
		
		echo $result;
	}
	
}
?>