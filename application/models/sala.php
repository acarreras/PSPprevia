<?php
Class Sala extends CI_Model{
	function getSalaById($id){
		$query = $this->db->query("SELECT titol, salanext, salaprev FROM sales WHERE id = ".$id);
		
		if($query->num_rows() > 0){
			return $query->result();
		}
	}
}
?>

