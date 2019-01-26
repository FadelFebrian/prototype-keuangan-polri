<?php 

defined('BASEPATH') OR exit ('no direct script access allowed');

class C_polsek extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('session','form_validation');
        $this->load->database();

        if ($this->session->userdata('jenis_user')!="polsek"){
            redirect('C_login/viewLogin');
        }

    }
    public function index(){
        if (empty($this->session->userdata('jenis_user'))){
            $this->load->view('page/login');
        }
        $data['title'] = "Polsek";
        $this->load->view('template/header',$data);
        $this->load->view('polsek/v_index_polsek');
    }    

    public function viewKegiatan(){
        $data['title'] = 'Daftar Kegiatan';
        $this->load->view('template/header',$data);
        $this->load->view('polsek/v_kegiatan_polsek');
    }
        
}