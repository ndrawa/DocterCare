<?php

class pasien_model extends CI_Model {

	var $table = 'pasien';

	public function pasien_add($data) {
		$this->db->insert($this->table, $data);
		return $this->db->insert_nama();
	}


	public function get_all_pasien() {
		$this->db->from('pasien');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_by_username($username) {
		$this->db->where('username', $username);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function pasien_update($data) {
        $username = $this->session->userdata('session_username');
        $this->db->where('username',$username);
		$this->db->update($data);
		return $this->db->affeccted_rows();

	}

	function pasien_data(){
        $hasil=$this->db->get('pasien');
        return $hasil->result();
    }
 
    function save_data(){
        $data = array(
                'nama' => $this->input->post('nama'),
                'jeniskelamin' => $this->input->post('jeniskelamin'),
                'alamat' => $this->input->post('alamat'),
                'email' => $this->input->post('email'),
                'telp' => $this->input->post('telp'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),

            
            );
        $result=$this->db->insert('pasien',$data);
        return $result;
    }
 
    function update_data(){
        $nama=$this->input->post('nama');
        $jeniskelamin=$this->input->post('jeniskelamin');
        $alamat=$this->input->post('alamat');
        $email=$this->input->post('email');
        $telp=$this->input->post('telp');
 
        $this->db->set('nama', $nama);
        $this->db->set('jeniskelamin', $jeniskelamin);
        $this->db->set('alamat', $alamat);
        $this->db->set('email', $email);
        $this->db->set('telp', $telp);
        $this->db->where('username',$this->session->userdata('session_username'));	
        $result=$this->db->update('pasien');
        return $result;
    }
 
    function delete_data(){
        $username = $this->session->userdata('session_username');

        $empty=$this->db->query("UPDATE jadwal_kosong
                                JOIN jadwaltemu ON jadwal_kosong.Username_Dokter = jadwaltemu.Username_Dokter
                                SET empty = FALSE
                                WHERE idjadwal = jadwaltemu.id");

        $query = "DELETE FROM pasien WHERE username= ?";
        $this->db->query($query, array($username));
        $query = "DELETE FROM jadwaltemu WHERE Username_Pasien= ?";
        return $this->db->query($query, array($username));
    }
	
} 