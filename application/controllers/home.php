<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('respostes','',TRUE);
	}

	function index(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			
			// sala 1
			$bapartat11fet = $this->respostes->bapartatJaFet($session_data['username'], 1,1);
			$bapartat12fet = $this->respostes->bapartatJaFet($session_data['username'], 1,2);
			$bapartat131fet = $this->respostes->bapartatJaFet($session_data['username'], 1,31);
			$bapartat132fet = $this->respostes->bapartatJaFet($session_data['username'], 1,32);
			$bapartat133fet = $this->respostes->bapartatJaFet($session_data['username'], 1,33);
			
			if($bapartat11fet == true && $bapartat12fet == true && 
				$bapartat131fet == true && $bapartat132fet == true && 
				$bapartat133fet == true){
					$data['bsala1feta'] = true;
			}
			else{
					$data['bsala1feta'] = false;
			}
			if($bapartat11fet == true || $bapartat12fet == true || 
				$bapartat131fet == true || $bapartat132fet == true || 
				$bapartat133fet == true){
					$bS1xEG = true;
			}
			else{
					$bS1xEG = false;
			}
			
			// sala 2
			$bapartat211fet = $this->respostes->bapartatJaFet($session_data['username'], 2,11);
			$bapartat212fet = $this->respostes->bapartatJaFet($session_data['username'], 2,12);
			$bapartat213fet = $this->respostes->bapartatJaFet($session_data['username'], 2,13);
			$bapartat214fet = $this->respostes->bapartatJaFet($session_data['username'], 2,14);
			$bapartat221fet = $this->respostes->bapartatJaFet($session_data['username'], 2,21);
			$bapartat222fet = $this->respostes->bapartatJaFet($session_data['username'], 2,22);
			$bapartat2211fet = $this->respostes->bapartatJaFet($session_data['username'], 2,211);
			$bapartat2221fet = $this->respostes->bapartatJaFet($session_data['username'], 2,221);
			$bapartat23fet = $this->respostes->bapartatJaFet($session_data['username'], 2,3);
			$bapartat24fet = $this->respostes->bapartatJaFet($session_data['username'], 2,4);
			
			if($bapartat211fet == true && $bapartat212fet == true && 
				$bapartat213fet == true && $bapartat214fet == true && 
				$bapartat221fet == true && $bapartat222fet == true && 
				$bapartat2211fet == true && $bapartat2221fet == true && 
				$bapartat23fet == true && $bapartat24fet == true){
					$data['bsala2feta'] = true;
			}
			else{
					$data['bsala2feta'] = false;
			}
			if($bapartat211fet == true || $bapartat212fet == true || 
				$bapartat213fet == true || $bapartat214fet == true || 
				$bapartat221fet == true || $bapartat222fet == true || 
				$bapartat2211fet == true || $bapartat2221fet == true || 
				$bapartat23fet == true || $bapartat24fet == true){
					$bS2xEG = true;
			}
			else{
					$bS2xEG = false;
			}
			
			// sala 3
			$bapartat31fet = $this->respostes->bapartatJaFet($session_data['username'], 3,1);
			$bapartat311fet = $this->respostes->bapartatJaFet($session_data['username'], 3,2);
			$bapartat32fet = $this->respostes->bapartatJaFet($session_data['username'], 3,11);
			
			if($bapartat31fet == true && $bapartat311fet == true && 
				$bapartat32fet == true){
					$data['bsala3feta'] = true;
			}
			else{
					$data['bsala3feta'] = false;
			}
			if($bapartat31fet == true || $bapartat311fet == true || 
				$bapartat32fet == true){
					$bS3xEG = true;
			}
			else{
					$bS3xEG = false;
			}
			
			// sala 4
			$bapartat41fet = $this->respostes->bapartatJaFet($session_data['username'], 4,1);
			$bapartat42fet = $this->respostes->bapartatJaFet($session_data['username'], 4,2);
			$bapartat43fet = $this->respostes->bapartatJaFet($session_data['username'], 4,3);
			$bapartat421fet = $this->respostes->bapartatJaFet($session_data['username'], 4,21);
			$bapartat422fet = $this->respostes->bapartatJaFet($session_data['username'], 4,22);
			
			
			if($bapartat41fet == true && $bapartat42fet == true && 
				$bapartat43fet == true && $bapartat421fet == true && 
				$bapartat221fet == true && $bapartat222fet == true && 
				$bapartat422fet == true){
					$data['bsala4feta'] = true;
			}
			else{
					$data['bsala4feta'] = false;
			}
			if($bapartat41fet == true || $bapartat42fet == true || 
				$bapartat43fet == true || $bapartat421fet == true || 
				$bapartat221fet == true || $bapartat222fet == true || 
				$bapartat422fet == true){
					$bS4xEG = true;
			}
			else{
					$bS4xEG = false;
			}
			
			// sala 7
			$bapartat71fet = $this->respostes->bapartatJaFet($session_data['username'], 7,1);
			
			if($bapartat71fet == true){
					$data['bsala7feta'] = true;
			}
			else{
					$data['bsala7feta'] = false;
			}
			
			// exposicio global
			if($bS1xEG == true && $bS2xEG == true && 
				$bS3xEG == true && $bS4xEG == true){
					$data['bexpoglobal'] = true;
			}
			else{
					$data['bexpoglobal'] = false;
			}
			
			// sales vistes o no: fem un apartat fake 0 que estarà ple de text dades fake
			$data['bbibliotecavista'] = $this->respostes->bapartatJaFet($session_data['username'], 5, 0); // biblioteca
			$data['bdolorifelicitatvista'] = $this->respostes->bapartatJaFet($session_data['username'], 6, 0);
			$data['blamevaexpovista'] = $this->respostes->bapartatJaFet($session_data['username'], 9, 0);
			$data['bexpoglobalvista'] = $this->respostes->bapartatJaFet($session_data['username'], 8, 0);
			
			$this->load->view('home_view', $data);
		}
		else{
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}

	function logout(){
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('home', 'refresh');
	}

}

?>

