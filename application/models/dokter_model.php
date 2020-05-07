<?php
class dokter_model extends CI_Model{
 
    function dokter_data(){
    	$hasil=$this->db->get('dokter');
        return $hasil->result();
    }
 
    function save_data(){
        $data = array(
                'nama' => $this->input->post('nama'),
                'jeniskelamin' => $this->input->post('jeniskelamin'),
                'alamat' => $this->input->post('alamat'),
                'spesialis'=> $this->input->post('spesialis'),
                'email' => $this->input->post('email'),
                'telp' => $this->input->post('telp'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
            );
        $result=$this->db->insert('dokter',$data);
        return $result;
    }
 
    function update_data(){
        $nama=$this->input->post('nama');
        $jeniskelamin=$this->input->post('jeniskelamin');
        $alamat=$this->input->post('alamat');
        $spesialis=$this->input->post('spesialis');
        $email=$this->input->post('email');
        $telp=$this->input->post('telp');
 
        $this->db->set('nama', $nama);
        $this->db->set('jeniskelamin', $jeniskelamin);
        $this->db->set('alamat', $alamat);
        $this->db->set('spesialis', $spesialis);
        $this->db->set('email', $email);
        $this->db->set('telp', $telp);
        $this->db->where('username',$this->session->userdata('session_username'));
        $result=$this->db->update('dokter');
        return $result;
    }

/*    function getjadwaltemuwhereusername($username){
        return $query=$this->db->query("SELECT * FROM jadwaltemu WHERE Username_Dokter='$username'");
    }

    function getjadwalkosongwhereusername($username){
        return $query=$this->db->query("SELECT * FROM jadwal_kosong WHERE Username_Dokter='$username'");
    }*/

    function delete_data(){
        $username = $this->session->userdata('session_username');
  /*      $cek_jadwaltemu = $this->getjadwaltemuwhereusername($username);
        $cek_jadwalkosong = $this->getjadwalkosongwhereusername($username);
        if(array_filter($cek_jadwaltemu) AND array_filter($cek_jadwalkosong)){
            $query = "DELETE dokter,jadwal_kosong, jadwaltemu
                      FROM dokter, jadwal_kosong, jadwaltemu
                      WHERE dokter.username=jadwaltemu.Username_Dokter
                      AND dokter.username=jadwal_kosong.Username_Dokter
                      AND dokter.username= ?";
        } elseif(!array_filter($cek_jadwaltemu) AND array_filter($cek_jadwalkosong)) {
            $query = "DELETE dokter,jadwal_kosong
                      FROM dokter, jadwal_kosong
                      WHERE dokter.username=jadwal_kosong.Username_Dokter
                      AND dokter.username= ?";
        } else {
            $query = "DELETE FROM dokter
                      WHERE username= ?";
        }*/

        $query = "DELETE FROM jadwal_kosong WHERE Username_Dokter= ?";
        $this->db->query($query, array($username));
        $query = "DELETE FROM jadwaltemu WHERE Username_Dokter= ?";
        $this->db->query($query, array($username));
        $query = "DELETE FROM dokter WHERE username= ?";
        return $this->db->query($query, array($username));
    }
     
    public function get_all_dokter() {
		$this->db->from('dokter');
		$query = $this->db->get();
		return $query->result();
	}

    public function get_by_username($username) {
        $this->db->where('username', $username);
        $query = $this->db->get();
        return $query->result_array();
    }
}