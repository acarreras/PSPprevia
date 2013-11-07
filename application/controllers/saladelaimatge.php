<?php
	class Saladelaimatge extends CI_Controller {
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
			$result = $this->sala->getSalaById(4);
			foreach($result as $row)
			{
				$data['titol'] = $row->titol;
				$data['salanext'] = $row->salanext;
				$data['salaprev'] = $row->salaprev;
			}
			$data['titolapartat1'] = $this->apartats->getApartatTitol(8);
			$data['titolapartat2'] = $this->apartats->getApartatTitol(9);
			$data['titolapartat3'] = $this->apartats->getApartatTitol(10);
			
			$data['bapartat1fet'] = $this->respostes->bapartatJaFet($session_data['username'], 4,1);
			$data['bapartat2fet'] = $this->respostes->bapartatJaFet($session_data['username'], 4,2);
			$data['bapartat3fet'] = $this->respostes->bapartatJaFet($session_data['username'], 4,3);
			
			$data['perquegraffitipropi'] = $this->respostes->getLaMevaRespostaText($session_data['username'], 4,2);
			$data['perquegraffitialtres'] = $this->respostes->getAltresRespostaText($session_data['username'], 4,2);
			
			$filtrepropinum = $this->respostes->getLaMevaRespostaEtiqueta($session_data['username'], 4,1);
			if($filtrepropinum == 1){
				$data['filtrepropi'] = '/assets/images/saladelaimatge/filtra01ambfiltre1.jpg';
			}
			else if($filtrepropinum == 2){
				$data['filtrepropi'] = '/assets/images/saladelaimatge/filtra01ambfiltre2.jpg';
			}
			else if($filtrepropinum == 3){
				$data['filtrepropi'] = '/assets/images/saladelaimatge/filtra01ambfiltre3.jpg';
			}
			$data['percentatgeetiqueta1'] = $this->respostes->getPercentatgeEtiqueta(1, 4,1);
			$data['percentatgeetiqueta2'] = $this->respostes->getPercentatgeEtiqueta(2, 4,1);
			$data['percentatgeetiqueta3'] = $this->respostes->getPercentatgeEtiqueta(3, 4,1);
			
			$this->load->view('saladelaimatge_view', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
		
	}
	
	function guardarGraffiti(){
		$session_data = $this->session->userdata('logged_in');
		
		$results = $this->respostes->getUltimsTexts(4,2);
		$str = '';
		foreach ($results as  $row) {
			$str .= $row->respostatext;
			$str .= "<br/>";
		}
		
		$this->respostes->guardarText($this->input->post('titol'), $session_data['username'], 4,2);
		
		echo $str;
	}
	
	function guardaFiltre(){
		$session_data = $this->session->userdata('logged_in');
		$this->respostes->guardarEtiquetes($this->input->post('num'), $session_data['username'], 4,1);
	}
	
	function percentatgeFiltre1(){
		$str = '';
		$results = $this->respostes->getPercentatgeEtiqueta(1, 4, 1);
		$str .= $results;
		echo $str;
	}
	
	function percentatgeFiltre2(){
		$str = '';
		$results = $this->respostes->getPercentatgeEtiqueta(2, 4, 1);
		$str .= $results;
		echo $str;
	}
	
	function percentatgeFiltre3(){
		$str = '';
		$results = $this->respostes->getPercentatgeEtiqueta(3, 4, 1);
		$str .= $results;
		echo $str;
	}
	
}
?>