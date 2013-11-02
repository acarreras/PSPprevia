<?php
Class Respostes extends CI_Model{
	
	function bapartatJaFet($username, $sala, $apartat) {
		$query = $this->db->query("SELECT id FROM users WHERE username = '".$username."'");
		if($query->num_rows() > 0){
			$result = $query->result();
			$userid = $result[0]->id;
			
			$query2 = $this->db->query("SELECT COUNT(1) FROM respostes WHERE userid = ".$userid." AND salaid = ".$sala." AND apartatid = ".$apartat);
			if($query2->num_rows() > 0){
				$result2 = $query2->result();
				// TODO: convertir això en número -> si és 0 no ha contestat si és 1 ja s'ha contestat
				$num = $result2[0];
				if($num == 1){
					return true;
				}
			}
		}
		return false;
	}
	
	function guardarText($titol, $username, $sala, $apartat){
		$query = $this->db->query("SELECT id FROM users WHERE username = '".$username."'");
		if($query->num_rows() > 0){
			$result = $query->result();
			$userid = $result[0]->id;
			$data = array(
				'salaid' => $sala,
				'apartatid' => $apartat,
				'userid' => $userid,
				'respostatext' => $titol
			);
			$this->db->insert('respostes', $data);
		}
	}
	
	function getUltimsTexts($sala, $apartat) {
		$query = $this->db->query("SELECT * FROM respostes WHERE respostatext IS NOT NULL AND salaid = ".$sala." AND apartatid = ".$apartat." ORDER BY TIMESTAMP DESC LIMIT 3");
		if ($query->num_rows() > 0) {
			$result = $query->result();
			return $result;
		}
	}
	
	function getLaMevaRespostaText($username, $sala, $apartat) {
		$str = '';
		$query = $this->db->query("SELECT id FROM users WHERE username = '".$username."'");
		if($query->num_rows() > 0){
			$result = $query->result();
			$userid = $result[0]->id;
			
			$query2 = $this->db->query("SELECT respostatext FROM respostes WHERE userid = ".$userid." AND salaid = ".$sala." AND apartatid = ".$apartat);
			if ($query2->num_rows() > 0) {
				$result2 = $query2->result();
				$str = $result2[0]->respostatext;
			}
		}
		return $str;
	}
	
	function getAltresRespostaText($username, $sala, $apartat){
		$str = '';
		$query = $this->db->query("SELECT id FROM users WHERE username = '".$username."'");
		if($query->num_rows() > 0){
			$result = $query->result();
			$userid = $result[0]->id;
			
			$query2 = $this->db->query("SELECT * FROM respostes WHERE respostatext IS NOT NULL AND userid != ".$userid." AND salaid = ".$sala." AND apartatid = ".$apartat." ORDER BY TIMESTAMP DESC LIMIT 3");
			if ($query2->num_rows() > 0) {
				$results = $query2->result();
				foreach ($results as  $row) {
					$str .= $row->respostatext;
					$str .= "<br/>";
				}
			}
		}
		return $str;
	}
	
	function guardarEtiquetes($etiqueta1, $etiqueta2, $etiqueta3, $username, $sala, $apartat){
		$query = $this->db->query("SELECT id FROM users WHERE username = '".$username."'");
		if($query->num_rows() > 0){
			$result = $query->result();
			$userid = $result[0]->id;
			
			// TODO: aquest valor ha de ser en funció de l'etiqueta, la primera es guarda un 1, la segona 2 i la tercera 3
			$num = 342;
			
			$data = array(
				'salaid' => $sala,
				'apartatid' => $apartat,
				'userid' => $userid,
				'respostanumber' => $num
			);
			$this->db->insert('respostes', $data);
		}
	}
	
	function getLaMevaRespostaEtiqueta($username, $sala, $apartat){
		$str = '';
		$query = $this->db->query("SELECT id FROM users WHERE username = '".$username."'");
		if($query->num_rows() > 0){
			$result = $query->result();
			$userid = $result[0]->id;
			
			$query2 = $this->db->query("SELECT respostanumber FROM respostes WHERE userid = ".$userid." AND salaid = ".$sala." AND apartatid = ".$apartat);
			if ($query2->num_rows() > 0) {
				$result2 = $query2->result();
				$str = $result2[0]->respostanum;
				// TODO: posar les etiquetes segons el  num
				/*
				if($str == 1){
					$str = "entusiasme";
				}
				else if($str == 2){
					$str = "amistat";
				}
				else if($str == 3){
					$str = "familiar";
				}
				*/
			}
		}
		return $str;
	}
	
	function getPercentatgeEtiqueta1(){
		$query = $this->db->query("SELECT COUNT(1) FROM respostes WHERE respostanumber = 1");
		$num = 0;
		if($query->num_rows() > 0){
			$result = $query->result();
			// TODO: convertir això en número
			$num = $result[0];
		}
		return $num;
	}
	
	// TODO: fer getPercentatgeEtiqueta2 i getPercentatgeEtiqueta3 identics a l'anterior

	
	function getNomSo($sala, $apartat) {
		// l'usuari amb userid = 0  s'acaba de convertir en el MASTER que té les respostes correctes :-)
		$query = $this->db->query("SELECT respostatext FROM respostes WHERE userid = 0 AND salaid = ".$sala." AND apartatid = ".$apartat);
		if ($query->num_rows() > 0) {
			$result = $query->result();
			$str = $result[0]->respostatext;
		}
		return $str;
	}
}
?>

