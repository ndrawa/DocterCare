<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class register extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Register_Model');
	}
	
	public function index()
	{
		$this->load->view('register/index');
	}
	
	public function register(){
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$repassword = $this->input->post('re-password');
		$kategori = $this->input->post('kategori');

		$cek_dokter = $this->Register_Model->cek_dokter($username);
		$cek_pasien = $this->Register_Model->cek_pasien($username);
		if ($password != $repassword){
			echo $this->session->set_flashdata('message','Password not match.');
		} elseif (($cek_dokter->num_rows() == 0) AND ($cek_pasien->num_rows() == 0)){
			if ($kategori == 'Dokter'){
				$data = array(
					'nama' => $nama,
					'username' => $username,
					'password' => md5($password)	
				);
				$this->db->insert('dokter', $data);
			} else {
				$data = array(
					'nama' => $nama,
					'username' => $username,
					'password' => md5($password)	
				);
				$this->db->insert('pasien', $data);
			}
			echo $this->session->set_flashdata('message','Register successful.');
		} else {
			echo $this->session->set_flashdata('message','Username already taken.');
		}
		redirect('/register');
	}
}