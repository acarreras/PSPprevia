<?php
Class Apartats extends CI_Model{
	function getApartatTitol($id){
		$query = $this->db->query("SELECT titol FROM apartats WHERE id = ".$id);
		
		if($query->num_rows() > 0){
			$result = $query->result();
			return $result[0]->titol;
		}
	}
}
?>

