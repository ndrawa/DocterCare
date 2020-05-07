<?php

class dokter extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('dokter_model');
    }

    function index(){
        $data['dokter'] = $this->dokter_model->get_all_dokter();
        $this->load->view('dokter/V_KelolaDokter', $data);
    }

    public function get_1dokter_data() {
        $username = $this->sesison->userdata('session_username');
        $result = $this->dokter_model->get_by_username($username);
        echo json_encode($result);
    }
 
    function akun_data(){
        $data=$this->dokter_model->dokter_data();
        echo json_encode($data);
    }
 
    function save(){
        $data=$this->dokter_model->save_data();
        echo json_encode($data);
    }
 
    function update(){
        $data=$this->dokter_model->update_data();
        echo json_encode($data);
    }
 
    function delete(){
        $data=$this->dokter_model->delete_data();
        echo json_encode($data);
    }
 
}