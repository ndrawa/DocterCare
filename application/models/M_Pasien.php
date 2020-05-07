<?php
class M_Pasien extends CI_model
{
	public function getAllJadwalTemu()
	{
		//use query builder to get data table "jadwaltemu"
		return $this->db->get('jadwaltemu')->result_array();
	}
	public function tambahJadwalTemu()
	{
		$data = [
			"id" 				=> $this->input->post('idjadwal'),
			"Username_Pasien" 	=> $this->session->userdata('session_username'),
			"Username_Dokter" 	=> $this->input->post('Username_Dokter', true),
			"jam" 				=> $this->input->post('jam', true),
			"Tanggal" 			=> $this->input->post('Tanggal', true),
			"Penyakit"			=> $this->input->post('Penyakit', true),
		];
		$this->db->insert('jadwaltemu',$data);

		$empty = [
			"empty" => True,
		];
		$this->db->where('Username_Dokter',$this->input->post('Username_Dokter', true));
		$this->db->where('jam',$this->input->post('jam', true));
		$this->db->where('Tanggal',$this->input->post('Tanggal', true));
		$this->db->update('jadwal_kosong',$empty);
	}
	public function hapusJadwalTemu($id)
	{
		//use query builder to delete data based on id 
		$query=$this->db->query("SELECT * FROM jadwaltemu WHERE id='$id'");
		$empty = [
			"empty" => False,
		];
		foreach ($query->result() as $dt) {
			$this->db->where('Username_Dokter', $dt->Username_Dokter, true);
			$this->db->where('jam',$dt->jam, true);
			$this->db->where('Tanggal',$dt->Tanggal, true);
			$this->db->update('jadwal_kosong',$empty);
		}
		$this->db->where('id',$id);
		$this->db->delete('jadwaltemu');
	}
	public function getJadwalTemuById($id)
	{
		//get data jadwaltemu based on id 
		$this->db->where('id',$id);
	}

	public function ubahJadwalTemu()
	{
		$data = [
			"id" => $this->input->post('id',true),
			"Username_Pasien" => $this->session->userdata('session_username'),
			"Username_Dokter" => $this->input->post('Username_Dokter'),
			"jam" => $this->input->post('jam', true),
			"Tanggal" => $this->input->post('Tanggal', true),
			"Penyakit" => $this->input->post('Penyakit', true),
		];
		$query = "UPDATE jadwaltemu SET 
									jam = '".$data['jam']."',
									Tanggal = '".$data['Tanggal']."',
									Penyakit = '".$data['Penyakit']."'
				  WHERE id = ".$data['id'];
		return $this->db->query($query);
	}
	public function cariJadwalTemu()
	{
		$keyword = $this->input->post('keyword', true);
		//use query builder class to search data jadwaltemu based on keyword "Usernama_Pasien" or "Usernmae_Dokter" or "jam" 
		$this->db->like('Username_Pasien',$keyword);
		$this->db->or_like('Username_Dokter',$keyword);
		$this->db->or_like('jam',$keyword);
		$this->db->or_like('Tanggal',$keyword);
		return $this->db->get('jadwaltemu')->result_array();
		//return data jadwaltemu that has been searched
	}

	public function JadwalTemu_list()
	{
		$result = $this->db->query("SELECT dokter.nama as namadokter, pasien.nama as namapasien, jam, Tanggal, Penyakit, Username_Pasien, Username_Dokter, pasien.telp as telppasien, pasien.email as emailpasien, dokter.telp as telpdokter, dokter.email as emaildokter
									FROM jadwaltemu 
									join dokter on dokter.username = jadwaltemu.Username_Dokter 
									join pasien on pasien.username = jadwaltemu.Username_Pasien
									where Username_Pasien = '".$this->session->userdata('session_username')."'
									or Username_Dokter = '".$this->session->userdata('session_username')."'
									");
        return $result->result_array();
	}
}