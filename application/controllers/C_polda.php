<?php 

defined('BASEPATH') OR exit ('no direct script access allowed');

class C_polda extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('session','form_validation');
        $this->load->database();
        $this->load->model('M_polda');

        if ($this->session->userdata('jenis_user')!="polda"){
            redirect('C_login/viewLogin');
        }
    }

        public function index(){
            if (empty($this->session->userdata('jenis_user'))){
                $this->load->view('page/login');
            }
            $data['title'] = "Polda";
            $this->load->view('template/header',$data);
            $this->load->view('polda/v_index_polda');
        }

        public function viewKegiatan(){
            $data['title'] = 'Monitoring Kegiatan Polres';
            $data['total'] = $this->M_polda->getDataKegiatanPolres();
            $this->load->view('template/header',$data);
            $this->load->view('polda/v_kegiatan_polda',$data);
        }

}   
