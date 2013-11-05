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
			
			$data['bapartat1fet'] = $this->respostes->bapartatJaFet($session_data['username'], 3,1);
			$data['bapartat2fet'] = $this->respostes->bapartatJaFet($session_data['username'], 3,2);
			
			$data['lemapropi'] = $this->respostes->getLaMevaRespostaText($session_data['username'], 3,2);
			$data['lemaaltres'] = $this->respostes->getAltresRespostaText($session_data['username'], 3,2);
			
			$data['autoretratpropi'] = $this->respostes->getLaMevaRespostaFitxer($session_data['username'], 3,1);
			// TODO:  aconseguir que aquestes tres variables funcionin
			$data['autoretrat1'] = $this->respostes->getAltresRespostaFitxerUltim($session_data['username'], 3,1);
			//$data['autoretrat2'] = $this->respostes->getAltresRespostaFitxerPenultim($session_data['username'], 3,1);
			//$data['autoretrat3'] = $this->respostes->getAltresRespostaFitxerAvantPenultim($session_data['username'], 3,1);
			
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
	
	public function uploadFileAutorretrat(){
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
			$this->respostes->guardarText($origname, $session_data['username'], 3, 11);
			$this->respostes->guardaFilename($filename, $session_data['username'], 3, 1);
		}
		@unlink($_FILES[$file_element_name]);
		echo json_encode(array('status' => $status, 'msg' => $msg, 'filename' => $origname, 'path' => $path));
	}
}
?>