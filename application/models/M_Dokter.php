<?php
class M_Dokter extends CI_model
{

	// get data dropdown
    
	public function getAllJadwalKosong()
	{
		$query = "Select idjadwal, Username_Dokter, nama, jam, tanggal from jadwal_kosong join dokter on jadwal_kosong.Username_Dokter = dokter.username";
		return $this->db->query($query)->result_array();
	}

	public function getJadwalKosongByUsername() {
		$query = "Select * from jadwal_kosong join dokter on jadwal_kosong.Username_Dokter = dokter.username WHERE empty = 0";
		return $this->db->query($query)->result_array();
	}

	public function getJadwalKosongById($id)
	{
		$this->db->from('jadwal_kosong')->where('Username_Dokter',$id)->get()->result_array();
	}

	public function cariJadwalKosong()
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->or_like('Username_Dokter',$keyword);
		$this->db->or_like('jam',$keyword);
		$this->db->or_like('Tanggal',$keyword);
		return $this->db->get('jadwal_kosong')->result_array();
	}

	public function tambahJadwalKosong()
	{
		$data = [
			"Username_Dokter" => $this->session->userdata('session_username'),
			"jam" => $this->input->post('jam', true),
			"Tanggal" => $this->input->post('Tanggal', true),
		];
		$this->db->insert('jadwal_kosong',$data);
	}

	public function ubahJadwalKosong($data)
	{
		$query = "UPDATE jadwal_kosong SET 
									jam = '".$data['jam']."',
									Tanggal = '".$data['Tanggal']."'
				  WHERE idjadwal = ".$data['idjadwal'];
		return $this->db->query($query);
	}

	public function hapusJadwalKosong($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('jadwal_kosong');

	}
}