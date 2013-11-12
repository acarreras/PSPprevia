<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyRegister extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function index(){
		//This method will have the credentials validation
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]|is_unique[users.username]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('mail', 'Mail', 'valid_email|is_unique[users.mail]');

		if($this->form_validation->run() == FALSE){
			 //Field validation failed
			 $this->load->view('register_view');
		}
		else{
			// If validation passes, information will be passed along to the MODEL to be processed and the account will be created.
			$this->load->model('register');
			// insert user to database
			$this->register->create_user();
			$this->session->set_flashdata('success', 'Your account has been successfully created');
			//Go to login area
			redirect('login', 'refresh');
		}

	}
}
?>
