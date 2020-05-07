<?php
	class Register_Model extends CI_Model {
		function cek_dokter($username){
			$query=$this->db->query("SELECT * FROM dokter WHERE username='$username'");
			return $query;
		}

		function cek_pasien($username){
			$query=$this->db->query("SELECT * FROM pasien WHERE username='$username'");
			return $query;
		}
	}
?>