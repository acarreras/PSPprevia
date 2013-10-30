<?php
Class Register extends CI_Model{
 
	function create_user(){
        $data = array('username' => $this->input->post('username'),'password' => MD5($this->input->post('password')),
					  'galeria' => $this->input->post('galeria') );
        $this->db->insert('users', $data);
        return null;
    }
}
?>

