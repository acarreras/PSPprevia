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
			
			if($bapartat11fet == true && $bapartat12fet == true && $bapartat131fet == true && $bapartat132fet == true && $bapartat133fet == true){
				$data['bsala1feta'] = true;
			}
			else{
				$data['bsala1feta'] = false;
			}
			
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

