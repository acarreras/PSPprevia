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
			$data['graffitipropi'] = $this->respostes->getLaMevaRespostaFitxer($session_data['username'], 4,2);
			$data['perquegraffitipropi'] = $this->respostes->getLaMevaRespostaText($session_data['username'], 4,22);
			$data['graffiti1'] = $this->respostes->getAltresRespostaFitxerUltim($session_data['username'], 4,2);
			$data['graffiti2'] = $this->respostes->getAltresRespostaFitxerPenultim($session_data['username'], 4,2);
			$data['graffiti3'] = $this->respostes->getAltresRespostaFitxerAvantPenultim($session_data['username'], 4,2);
			$data['perquegraffiti1'] = $this->respostes->getAltresRespostaTextUltim($session_data['username'], 4,22);
			$data['perquegraffiti2'] = $this->respostes->getAltresRespostaTextPenultim($session_data['username'], 4,22);
			$data['perquegraffiti3'] = $this->respostes->getAltresRespostaTextAvantPenultim($session_data['username'], 4,22);
			
			$data['fotogramapropi'] = $this->respostes->getLaMevaRespostaEtiqueta($session_data['username'], 4,3);

			$this->load->view('saladelaimatge_view', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
		
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
	
	public function uploadFileGraffiti(){
		$session_data = $this->session->userdata('logged_in');
		
		$status = "";
		$msg = "";
		$file_element_name = 'userfile';
		$filename = "";
		$origname = "";
		$path = "";

		$config['upload_path'] = './files/';
		$config['allowed_types'] = 'jpg|gif|png';
		$config['max_size']  = 1024 * 10;
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($file_element_name)){
			$status = "error";
			$msg = $this->upload->display_errors('', '');
		}
		else{
			$data = $this->upload->data();
			$filename = $data['file_name']; // ok
			$origname = $data['orig_name'];
			$path = $data['full_path'];
			$status = "success";
			$msg = "file successfully uploaded";
			$this->respostes->guardaFilename($filename, $session_data['username'], 4, 2);
			$this->respostes->guardarText($origname, $session_data['username'], 4, 21);
			$this->respostes->guardarText($_POST['title'], $session_data['username'], 4, 22);

		}
		
		$img1 = $this->respostes->getAltresRespostaFitxerUltim($session_data['username'], 4,2);
		$img2 = $this->respostes->getAltresRespostaFitxerPenultim($session_data['username'], 4,2);
		$img3 = $this->respostes->getAltresRespostaFitxerAvantPenultim($session_data['username'], 4,2);
			
			
		@unlink($_FILES[$file_element_name]);
		echo json_encode(array('status' => $status, 'msg' => $msg, 'filename' => $origname, 'path' => $filename,
								'perque' => $_POST['title'], 'img1' => $img1, 'img2' => $img2, 'img3' => $img3));
	}
	
	function guardaFrame(){
		$session_data = $this->session->userdata('logged_in');
		$this->respostes->guardarValor($this->input->post('num'), $session_data['username'], 4,3);
	}
}
?>