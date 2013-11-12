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

		if($this->session->userdata('logged_in')){
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
			
			$data['bapartat11fet'] = $this->respostes->bapartatJaFet($session_data['username'], 6,11);
			$data['bapartat12fet'] = $this->respostes->bapartatJaFet($session_data['username'], 6,12);
			$data['bapartat13fet'] = $this->respostes->bapartatJaFet($session_data['username'], 6,13);
			$data['bapartat21fet'] = $this->respostes->bapartatJaFet($session_data['username'], 6,21);
			$data['bapartat22fet'] = $this->respostes->bapartatJaFet($session_data['username'], 6,22);
			$data['bapartat23fet'] = $this->respostes->bapartatJaFet($session_data['username'], 6,23);
			
			$data['sofelicitatpropi'] = $this->respostes->getLaMevaRespostaText($session_data['username'], 6,111);
			$data['sofelicitatpropifilename'] = $this->respostes->getLaMevaRespostaFitxer($session_data['username'], 6,11);
			
			$data['imgfelicitatpropi'] = $this->respostes->getLaMevaRespostaFitxer($session_data['username'], 6,12);
			
			$data['felicitattextpropi'] = $this->respostes->getLaMevaRespostaText($session_data['username'], 6,13);
			
			$data['sodolorpropi'] = $this->respostes->getLaMevaRespostaText($session_data['username'], 6,211);
			$data['sodolorpropifilename'] = $this->respostes->getLaMevaRespostaFitxer($session_data['username'], 6,21);
			
			$data['imgdolorpropi'] = $this->respostes->getLaMevaRespostaFitxer($session_data['username'], 6,22);
			
			$data['dolortextpropi'] = $this->respostes->getLaMevaRespostaText($session_data['username'], 6,23);
			
			$this->load->view('saladeldolorilafelicitat_view', $data);
		}
		else{
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}
	
	function salaVista(){
		$session_data = $this->session->userdata('logged_in');
		$this->respostes->guardarText($this->input->post('faketext'), $session_data['username'], 6, 0);
	}
	
	public function uploadFileSoFelicitat(){
		$session_data = $this->session->userdata('logged_in');
		
		$status = "";
		$msg = "";
		$file_element_name = 'userfilesofelicitat';
		$filename = "";
		$origname = "";

		$config['upload_path'] = './files/';
		$config['allowed_types'] = 'mp3';
		$config['max_size']  = 1024 * 8;
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($file_element_name)){
			$status = "error";
			$msg = $this->upload->display_errors('', '');
		}
		else{
			$data = $this->upload->data();
			$filename = $data['file_name']; // ok
			$origname  = $data['orig_name'];
			$status = "success";
			$msg = "file successfully uploaded";
			$this->respostes->guardarText($origname, $session_data['username'], 6, 111);
			$this->respostes->guardaFilename($filename, $session_data['username'], 6, 11);
		}
		@unlink($_FILES[$file_element_name]);
		echo json_encode(array('status' => $status, 'msg' => $msg, 'filename' => $origname, 'file' => $filename));
	}
	
	public function uploadFileSoDolor(){
		$session_data = $this->session->userdata('logged_in');
		
		$status = "";
		$msg = "";
		$file_element_name = 'userfilesodolor';
		$filename = "";
		$origname = "";

		$config['upload_path'] = './files/';
		$config['allowed_types'] = 'mp3';
		$config['max_size']  = 1024 * 8;
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($file_element_name)){
			$status = "error";
			$msg = $this->upload->display_errors('', '');
		}
		else{
			$data = $this->upload->data();
			$filename = $data['file_name']; // ok
			$origname  = $data['orig_name'];
			$status = "success";
			$msg = "file successfully uploaded";
			$this->respostes->guardarText($origname, $session_data['username'], 6, 211);
			$this->respostes->guardaFilename($filename, $session_data['username'], 6, 21);
		}
		@unlink($_FILES[$file_element_name]);
		echo json_encode(array('status' => $status, 'msg' => $msg, 'filename' => $origname, 'file' => $filename));
	}
	
	public function uploadFileImgFelicitat(){
		$session_data = $this->session->userdata('logged_in');
		
		$status = "";
		$msg = "";
		$file_element_name = 'userfileimgfelicitat';
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
			$this->respostes->guardarText($origname, $session_data['username'], 6, 121);
			$this->respostes->guardaFilename($filename, $session_data['username'], 6, 12);
		}
		@unlink($_FILES[$file_element_name]);
		echo json_encode(array('status' => $status, 'msg' => $msg, 'filename' => $origname, 'path' => $filename));
	}
	
	public function uploadFileImgDolor(){
		$session_data = $this->session->userdata('logged_in');
		
		$status = "";
		$msg = "";
		$file_element_name = 'userfileimgdolor';
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
			$this->respostes->guardarText($origname, $session_data['username'], 6, 221);
			$this->respostes->guardaFilename($filename, $session_data['username'], 6, 22);
		}
		@unlink($_FILES[$file_element_name]);
		echo json_encode(array('status' => $status, 'msg' => $msg, 'filename' => $origname, 'path' => $filename));
	}
	
	function guardarTextFelicitat(){
		$session_data = $this->session->userdata('logged_in');
		$this->respostes->guardarText($this->input->post('titol'), $session_data['username'], 6, 13);
	}
	
	function guardarTextDolor(){
		$session_data = $this->session->userdata('logged_in');
		$this->respostes->guardarText($this->input->post('titol'), $session_data['username'], 6, 23);
	}
}
?>