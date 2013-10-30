<?php
	class Saladelesparaules extends CI_Controller {
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
			$result = $this->sala->getSalaById(1); // perque la sala de les paraules es la que te Id = 1 a la base de dades
			foreach($result as $row)
			{
				$data['titol'] = $row->titol;
				$data['salanext'] = $row->salanext;
				$data['salaprev'] = $row->salaprev;
			}
			$data['titolapartat1'] = $this->apartats->getApartatTitol(1); // 1 perque a la taula apartats aquest titol té id 1
			$data['titolapartat2'] = $this->apartats->getApartatTitol(2);
			$data['titolapartat3'] = $this->apartats->getApartatTitol(3);
			
			// TODO: no sé comptar amb querys :-(
			$data['bapartat1fet'] = false;//$this->respostes->bapartatJaFet($session_data['username'], 1,1);
			$data['bapartat2fet'] = false;//$this->respostes->bapartatJaFet($session_data['username'], 1,2);
			$data['bapartat31fet'] = true;//$this->respostes->bapartatJaFet($session_data['username'], 1,31);
			$data['bapartat32fet'] = true;//$this->respostes->bapartatJaFet($session_data['username'], 1,32);
			$data['bapartat33fet'] = true;//$this->respostes->bapartatJaFet($session_data['username'], 1,33);
			
			$data['titolimatgepropi'] = $this->respostes->getLaMevaRespostaText($session_data['username'], 1,1);
			$data['titolimatgealtres'] = $this->respostes->getAltresRespostaText($session_data['username'], 1,1);
			
			// TODO: no sé comptar amb querys :-(
			$data['etiquetapropia'] = "no m'aclaro";//$this->respostes->getLaMevaRespostaEtiqueta($session_data['username'], 1,2);
			$data['percentatgeetiqueta1'] = 50;//$this->respostes->getPercentatgeEtiqueta1();
			$data['percentatgeetiqueta2'] = 30;//$this->respostes->getPercentatgeEtiqueta2();
			$data['percentatgeetiqueta3'] = 20;//$this->respostes->getPercentatgeEtiqueta3();
			
			$data['defguerra1propi'] = $this->respostes->getLaMevaRespostaText($session_data['username'], 1,31);
			$data['defguerra1altres'] = $this->respostes->getAltresRespostaText($session_data['username'], 1,31);
			$data['defguerra2propi'] = $this->respostes->getLaMevaRespostaText($session_data['username'], 1,32);
			$data['defguerra2altres'] = $this->respostes->getAltresRespostaText($session_data['username'], 1,32);
			$data['defguerra3propi'] = $this->respostes->getLaMevaRespostaText($session_data['username'], 1,33);
			$data['defguerra3altres'] = $this->respostes->getAltresRespostaText($session_data['username'], 1,33);
			
			$this->load->view('saladelesparaules_view', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
		
	}
	
	function guardarTitolImatge(){
		$session_data = $this->session->userdata('logged_in');
		
		$results = $this->respostes->getUltimsTexts(1,1);
		$str = '';
		foreach ($results as  $row) {
			$str .= $row->respostatext;
			$str .= "<br/>";
		}
		
		$this->respostes->guardarTitolImatge($this->input->post('titol'), $session_data['username'], 1, 1);
		
		echo $str;
	}
	
	function guardarEtiquetes(){
		$session_data = $this->session->userdata('logged_in');
		
		$str = '';
		// TODO: implementar aquests querys i fer l'string de resultats
		//$results = $this->respostes->getPercentatgeEtiqueta1();
		//$results = $this->respostes->getPercentatgeEtiqueta2();
		//$results = $this->respostes->getPercentatgeEtiqueta3();
		
		$this->respostes->guardarEtiquetes($this->input->post('etiqueta1'), $this->input->post('etiqueta2'), $this->input->post('etiqueta3'), $session_data['username'], 1, 2);
		
		// TODO: retornar l'string que toca i que hem fet a dalt
		$str = "percenttges testtttttttt!!";
		echo $str;
	}
	
	function guardarDefGuerra1(){
		$session_data = $this->session->userdata('logged_in');
		
		$results = $this->respostes->getUltimesDefinicionsGuerra(31);
		$str = '';
		foreach ($results as  $row) {
			$str .= $row->respostatext;
			$str .= "<br/>";
		}
		
		$this->respostes->guardarDefGuerra($this->input->post('def'), $session_data['username'], 1, 31); // sala 1 apartat 3.1
		
		echo $str;
	}
	
	function guardarDefGuerra2(){
		$session_data = $this->session->userdata('logged_in');
		
		$results = $this->respostes->getUltimesDefinicionsGuerra(32);
		$str = '';
		foreach ($results as  $row) {
			$str .= $row->respostatext;
			$str .= "<br/>";
		}
		
		$this->respostes->guardarDefGuerra($this->input->post('def'), $session_data['username'], 1, 32); // sala 1 apartat 3.2
		
		echo $str;
	}
	
	function guardarDefGuerra3(){
		$session_data = $this->session->userdata('logged_in');
		
		$results = $this->respostes->getUltimesDefinicionsGuerra(33);
		$str = '';
		foreach ($results as  $row) {
			$str .= $row->respostatext;
			$str .= "<br/>";
		}
		
		$this->respostes->guardarDefGuerra($this->input->post('def'), $session_data['username'], 1, 33); // sala 1 apartat 3.3
		
		echo $str;
	}
}
?>