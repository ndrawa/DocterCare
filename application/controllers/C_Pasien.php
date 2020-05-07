<?php
class C_Pasien extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Pasien');
		$this->load->model('M_Dokter');
		$this->load->model('pasien_model');
		$this->load->model('dokter_model');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$data['judul'] = 'Selamat datang Pasien';
		$data['jadwaltemu'] = $this->M_Pasien->getAllJadwalTemu();
		$this->load->view('template/navbar', $data);
		$this->load->view('pasien/V_UtamaPasien', $data);
		$this->load->view('template/footer');
	}

	public function V_LihatJadwalTemu()
	{
		$data['jadwaltemu'] = $this->M_Pasien->JadwalTemu_list();
		$this->load->view('Pasien/V_LihatJadwalTemu', $data);
	}
	
	public function V_tambah()
	{
		$this->form_validation->set_rules('Penyakit','warning','required');
		$this->form_validation->set_rules('idjadwal','warning','required');
		if ($this->form_validation->run() == false){
			$this->load->view('pasien/V_tambah');
		}else{
			$this->M_Pasien->tambahJadwalTemu();
			$this->session->set_flashdata('flash','added success');
			$this->V_LihatJadwalTemu();
		}
	}

	public function V_hapus()
	{
		$data['jadwaltemu'] = $this->M_Pasien->getAllJadwalTemu();
		$data['pasien'] = $this->pasien_model->get_all_pasien();
		$data['dokter'] = $this->dokter_model->get_all_dokter();
		$this->load->view('Pasien/V_hapus', $data);
		$this->session->set_flashdata('flash','dihapus');
	}

	public function V_ubah()
	{
		$this->form_validation->set_rules('Penyakit','warning','required');
		if ($this->form_validation->run() == false){
			$this->load->view('pasien/V_ubah');
		}else{
			$this->M_Pasien->ubahJadwalTemu();
			$this->session->set_flashdata('flash','added success');
			$this->V_LihatJadwalTemu();
		}
	}

	public function update(){
		$data=$this->M_Pasien->ubahJadwalTemu();
        echo json_encode($data);
	}

	//===============untuk tambah jadwal
	public function getJadwalKosong(){
		include 'connect.php';
		$id=$this->session->userdata('session_nama');
    	$queryResult = mysqli_query($connect,"SELECT idjadwal, Username_Dokter, nama, jam, tanggal from jadwal_kosong join dokter on jadwal_kosong.Username_Dokter = dokter.username WHERE empty = 0");
		$result 	 = array();
		while($fethData=$queryResult->fetch_assoc()){
			$result[]=$fethData;
		}
		echo json_encode($result);
	}

	public function fetchJadwalKosong(){
		include 'connect.php';

		$idjadwal =$_POST["idjadwal"];
		$result = array();
		$queryResult = mysqli_query($connect,"SELECT idjadwal, Username_Dokter, nama, jam, tanggal from jadwal_kosong join dokter on jadwal_kosong.Username_Dokter = dokter.username WHERE idjadwal=".$idjadwal);
		$fetchData = $queryResult->fetch_assoc();

		$result=$fetchData;
		echo json_encode($result);
	}

	//================untuk edit jadwal
	public function getJadwalTemu() {
		include 'connect.php';
		$id=$this->session->userdata('session_username');
    	$queryResult = mysqli_query($connect,"SELECT id,Username_Dokter,Username_Pasien,jam, Tanggal, Penyakit, nama FROM jadwaltemu join dokter on dokter.username = jadwaltemu.Username_Dokter WHERE Username_Pasien='$id'");
		$result 	 = array();
		while($fethData=$queryResult->fetch_assoc()){
			$result[]=$fethData;
		}
		echo json_encode($result);
	}

	public function fetchJadwalTemu(){
		include 'connect.php';

		$id =$_POST["id"];
		$result = array();
		$queryResult = mysqli_query($connect,"SELECT id,Username_Dokter,jam, Tanggal, Penyakit, nama FROM jadwaltemu join dokter on dokter.username = jadwaltemu.Username_Dokter WHERE id=".$id);
		$fetchData = $queryResult->fetch_assoc();

		$result=$fetchData;
		echo json_encode($result);
	}

	//=================untuk delete jadwal
	public function doDelete($id){
		$result = $this->M_Pasien->hapusJadwalTemu($id);
		$this->V_hapus();
	}
}
