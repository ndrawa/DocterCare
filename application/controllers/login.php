<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Login_Model');
		$this->load->model('M_Pasien');
        $this->load->model('dokter_model');
	}

	public function index()
	{
		$this->load->view('login/index');
	}

	function auth(){
        if ($this->session->userdata('session_username') != null) {
            $username=$this->session->userdata('session_username');
            $password=$this->session->userdata('session_password');
        }else {
            $username=$this->input->post('username');
            $password=$this->input->post('password');
        }
        $cek_dokter=$this->Login_Model->auth_dokter($username,$password);        
        $cek_pasien=$this->Login_Model->auth_pasien($username,$password);
 
        if($this->session->userdata('session_login') == 'dokter') {
            $data=$cek_dokter->row_array();
            $this->load->view('dokter/V_UtamaDokter', $data);
        } else if ($this->session->userdata('session_login') == 'pasien') {
            $data=$cek_pasien->row_array();
            //$data['judul'] = "Selamat datang ".$data['nama'];
            $data['jadwaltemu'] = $this->M_Pasien->getAllJadwalTemu();
            $this->load->view('pasien/V_UtamaPasien', $data);
        } else if ($this->session->userdata('session_login') == 'admin') {

        } else {
            if($username=='admin' && $password=='admin'){
                $this->session->set_userdata('session_login','admin');
                $this->load->view('admin/V_UtamaAdmin');
                $this->load->view('template/footer'); 
            }else{
                if($cek_dokter->num_rows() > 0){ //jika login sebagai dokter
                    $data=$cek_dokter->row_array();
                    $this->session->set_userdata('session_login','dokter');
                    $this->session->set_userdata('session_nama',$data['nama']);
                    $this->session->set_userdata('session_username',$data['username']);
                    $this->session->set_userdata('session_password',$data['password']);
                    $this->session->set_userdata('session_status','dokter');
                    $this->load->view('dokter/V_UtamaDokter', $data);
                }else if($cek_pasien->num_rows() > 0){ //jika login sebagai pasien
                    $data=$cek_pasien->row_array();
                    $this->session->set_userdata('session_login','pasien');
                    $this->session->set_userdata('session_nama',$data['nama']);
                    $this->session->set_userdata('session_username',$data['username']);
                    $this->session->set_userdata('session_status','pasien');
                    $data['jadwaltemu'] = $this->M_Pasien->getAllJadwalTemu();
                    $this->load->view('pasien/V_UtamaPasien', $data);
                }else{  // jika username dan password tidak ditemukan atau salah
                    $url=base_url();
                    echo $this->session->set_flashdata('message','Username or Password incorrect.');
                    redirect($url);
                }
            } 
        }
    }

    function logout(){
        $this->session->sess_destroy();
        $url=base_url('');
        redirect($url);
    }

}