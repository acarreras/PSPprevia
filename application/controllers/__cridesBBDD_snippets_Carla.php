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
		
		$results = $this->respostes->getUltimsTitolsImatges();
		$str = '';
		foreach ($results as  $row) {
			$str .= $row->respostatext;
			$str .= "<br/>";
		}
		
		$this->respostes->guardarTitolImatge($this->input->post('titol'), $session_data['username'], 1, 1);
		
		
		// compta el total de respostes
		select count(1)
from respostes
where salaid = 1
and apartatid = 2
and respostanumber is not null

// compta el total de respostes que valen 1
select count(1)
from respostes
where salaid = 1
and apartatid = 2
and respostanumber = 1 // els que valen 1

// tot el llistat de sales i apartats que ha completat l¡usuari
select salaid, apartatid
from respostes
where userid = 1;

// número d'apartat resolts per l'usuari 1 en la sala 1
select count(1)
from respostes
where userid = 1
and salaid = 1;

// total d'apartats de la sala 1
select count(1) 
from salaapartat 
where salaid = 1;
		
		echo $str;
	}
}
?>