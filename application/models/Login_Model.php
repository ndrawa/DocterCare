<?php
	class Login_Model extends CI_Model {
		function auth_dokter($username,$password){
			$query=$this->db->query("SELECT * FROM dokter WHERE username='$username' AND password=MD5('$password') LIMIT 1");
			return $query;
		}

		function auth_pasien($username, $password){
			$query=$this->db->query("SELECT * FROM pasien WHERE username='$username' AND password=MD5('$password') LIMIT 1");
			return $query;
		}
	}