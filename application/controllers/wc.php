<?php
	class Wc extends CI_Controller {
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
			$result = $this->sala->getSalaById(7);
			foreach($result as $row)
			{
				$data['titol'] = $row->titol;
				$data['salanext'] = $row->salanext;
				$data['salaprev'] = $row->salaprev;
			}
			$data['titolapartat1'] = $this->apartats->getApartatTitol(18);
			
			$data['bapartat1fet'] = $this->respostes->bapartatJaFet($session_data['username'], 7,1);
			
			$data['wctextpropi'] = $this->respostes->getLaMevaRespostaText($session_data['username'], 7,1);
			$data['wctextaltre1'] = $this->respostes->getAltresRespostaTextUltim($session_data['username'], 7,1);
			$data['wctextaltre2'] = $this->respostes->getAltresRespostaTextPenultim($session_data['username'], 7,1);
			$data['wctextaltre3'] = $this->respostes->getAltresRespostaTextAvantPenultim($session_data['username'], 7,1);
			
			$this->load->view('wc_view', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
		
	}
	
	function guardarTextWc(){
		$session_data = $this->session->userdata('logged_in');
		$this->respostes->guardarText($this->input->post('titol'), $session_data['username'], 7, 1);
	}
	
	function ultimText(){
		$session_data = $this->session->userdata('logged_in');
		
		echo $this->respostes->getAltresRespostaTextUltim($session_data['username'], 7, 1);
	}
	
	function penultimText(){
		$session_data = $this->session->userdata('logged_in');
		
		echo $this->respostes->getAltresRespostaTextPenultim($session_data['username'], 7, 1);
	}
	
	function avantpenultimText(){
		$session_data = $this->session->userdata('logged_in');
		
		echo $this->respostes->getAltresRespostaTextAvantPenultim($session_data['username'], 7, 1);
	}
}
?>