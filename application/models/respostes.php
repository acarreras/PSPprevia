<?php
Class Respostes extends CI_Model{
	
	function bapartatJaFet($username, $sala, $apartat) {
		$query = $this->db->query("SELECT id FROM users WHERE username = '".$username."'");
		if($query->num_rows() > 0){
			$result = $query->result();
			$userid = $result[0]->id;
			
			$query2 = $this->db->query("SELECT COUNT(1) as number FROM respostes WHERE userid = ".$userid." AND salaid = ".$sala." AND apartatid = ".$apartat);
			if($query2->num_rows() > 0){
				$result2 = $query2->result();
				$num = $result2[0]->number;
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
	
	function getAltresRespostaFitxerUltim($username, $sala, $apartat){
		$str = '';
		$query = $this->db->query("SELECT id FROM users WHERE username = '".$username."'");
		if($query->num_rows() > 0){
			$result = $query->result();
			$userid = $result[0]->id;
			
			$query2 = $this->db->query("SELECT * FROM respostes WHERE respostafitxer IS NOT NULL AND userid != ".$userid." AND salaid = ".$sala." AND apartatid = ".$apartat." ORDER BY TIMESTAMP DESC LIMIT 1");
			if ($query2->num_rows() > 0) {
				$result2 = $query2->result();
				$str = $result2[0]->respostafitxer;
			}
		}
		return $str;
	}
	
	function getAltresRespostaFitxerPenultim($username, $sala, $apartat){
		$str = '';
		$query = $this->db->query("SELECT id FROM users WHERE username = '".$username."'");
		if($query->num_rows() > 0){
			$result = $query->result();
			$userid = $result[0]->id;
			
			$query2 = $this->db->query("SELECT * FROM respostes WHERE respostafitxer IS NOT NULL AND userid != ".$userid." AND salaid = ".$sala." AND apartatid = ".$apartat." ORDER BY TIMESTAMP DESC LIMIT 2");
			if ($query2->num_rows() > 1) {
				$result2 = $query2->result();
				$str = $result2[1]->respostafitxer;
			}
		}
		return $str;
	}
	
	function getAltresRespostaFitxerAvantPenultim($username, $sala, $apartat){
		$str = '';
		$query = $this->db->query("SELECT id FROM users WHERE username = '".$username."'");
		if($query->num_rows() > 0){
			$result = $query->result();
			$userid = $result[0]->id;
			
			$query2 = $this->db->query("SELECT * FROM respostes WHERE respostafitxer IS NOT NULL AND userid != ".$userid." AND salaid = ".$sala." AND apartatid = ".$apartat." ORDER BY TIMESTAMP DESC LIMIT 3");
			if ($query2->num_rows() > 2) {
				$result2 = $query2->result();
				$str = $result2[2]->respostafitxer;
			}
		}
		return $str;
	}
	
	function guardarEtiquetes($valor, $username, $sala, $apartat){
		$query = $this->db->query("SELECT id FROM users WHERE username = '".$username."'");
		if($query->num_rows() > 0){
			$result = $query->result();
			$userid = $result[0]->id;
			
			$data = array(
				'salaid' => $sala,
				'apartatid' => $apartat,
				'userid' => $userid,
				'respostanumber' => $valor
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
				$str = $result2[0]->respostanumber;
			}
		}
		return $str;
	}
	
	function getPercentatgeEtiqueta($number, $sala, $apartat){
		$query = $this->db->query("SELECT COUNT(1) as number FROM respostes WHERE respostanumber = ".$number." AND salaid = ".$sala." AND apartatid = ".$apartat);
		$num = 0;
		if($query->num_rows() > 0){
			$result = $query->result();
			$num = $result[0]->number;
		}
		return $num;
	}
	
	function getNomSo($sala, $apartat) {
		// l'usuari amb userid = 0  s'acaba de convertir en el MASTER que té les respostes correctes :-)
		$query = $this->db->query("SELECT respostatext FROM respostes WHERE userid = 0 AND salaid = ".$sala." AND apartatid = ".$apartat);
		if ($query->num_rows() > 0) {
			$result = $query->result();
			$str = $result[0]->respostatext;
		}
		return $str;
	}
	
	function guardaFilename($filename, $username, $sala, $apartat){
		$query = $this->db->query("SELECT id FROM users WHERE username = '".$username."'");
		if($query->num_rows() > 0){
			$result = $query->result();
			$userid = $result[0]->id;
			$data = array(
				'salaid' => $sala,
				'apartatid' => $apartat,
				'userid' => $userid,
				'respostafitxer' => $filename
			);
			$this->db->insert('respostes', $data);
		}
	}
	
	function getLaMevaRespostaFitxer($username, $sala, $apartat) {
		$str = '';
		$query = $this->db->query("SELECT id FROM users WHERE username = '".$username."'");
		if($query->num_rows() > 0){
			$result = $query->result();
			$userid = $result[0]->id;
			
			$query2 = $this->db->query("SELECT respostafitxer FROM respostes WHERE userid = ".$userid." AND salaid = ".$sala." AND apartatid = ".$apartat);
			if ($query2->num_rows() > 0) {
				$result2 = $query2->result();
				$str = $result2[0]->respostafitxer;
			}
		}
		return $str;
	}
	
	function getAltresRespostaTextUltim($username, $sala, $apartat){
		$str = '';
		$query = $this->db->query("SELECT id FROM users WHERE username = '".$username."'");
		if($query->num_rows() > 0){
			$result = $query->result();
			$userid = $result[0]->id;
			
			$query2 = $this->db->query("SELECT * FROM respostes WHERE respostatext IS NOT NULL AND userid != ".$userid." AND salaid = ".$sala." AND apartatid = ".$apartat." ORDER BY TIMESTAMP DESC LIMIT 1");
			if ($query2->num_rows() > 0) {
				$result2 = $query2->result();
				$str = $result2[0]->respostatext;
			}
		}
		return $str;
	}
	
	function getAltresRespostaTextPenultim($username, $sala, $apartat){
		$str = '';
		$query = $this->db->query("SELECT id FROM users WHERE username = '".$username."'");
		if($query->num_rows() > 0){
			$result = $query->result();
			$userid = $result[0]->id;
			
			$query2 = $this->db->query("SELECT * FROM respostes WHERE respostatext IS NOT NULL AND userid != ".$userid." AND salaid = ".$sala." AND apartatid = ".$apartat." ORDER BY TIMESTAMP DESC LIMIT 2");
			if ($query2->num_rows() > 1) {
				$result2 = $query2->result();
				$str = $result2[1]->respostatext;
			}
		}
		return $str;
	}
	
	function getAltresRespostaTextAvantPenultim($username, $sala, $apartat){
		$str = '';
		$query = $this->db->query("SELECT id FROM users WHERE username = '".$username."'");
		if($query->num_rows() > 0){
			$result = $query->result();
			$userid = $result[0]->id;
			
			$query2 = $this->db->query("SELECT * FROM respostes WHERE respostatext IS NOT NULL AND userid != ".$userid." AND salaid = ".$sala." AND apartatid = ".$apartat." ORDER BY TIMESTAMP DESC LIMIT 3");
			if ($query2->num_rows() > 2) {
				$result2 = $query2->result();
				$str = $result2[2]->respostatext;
			}
		}
		return $str;
	}
	
	function guardarValor($valor, $username, $sala, $apartat){
		$query = $this->db->query("SELECT id FROM users WHERE username = '".$username."'");
		if($query->num_rows() > 0){
			$result = $query->result();
			$userid = $result[0]->id;
			
			$data = array(
				'salaid' => $sala,
				'apartatid' => $apartat,
				'userid' => $userid,
				'respostanumber' => $valor
			);
			$this->db->insert('respostes', $data);
		}
	}
}
?>

