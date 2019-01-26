<?php 

defined('BASEPATH') OR exit ('no direct script access allowed');

class C_pusat extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('session','form_validation');
        $this->load->database();
        $this->load->model('M_common');

        if ($this->session->userdata('jenis_user')!='pusat'){
            redirect('C_login/viewLogin');
        }
        
    }
    public function index(){
        if (empty($this->session->userdata('jenis_user'))){
            redirect('C_login/viewLogin');
        }
        $data['title'] = "Index";
        $data['budget'] = $this->M_common->getAmountBudget();
        $data['pelaksanaan'] = $this->M_common->getAmountPelaksanaan();
        $this->load->view('template/header',$data);
        $this->load->view('pusat/v_index');
    }
    public function getPolda(){
        $data['title'] = 'Daftar Polda';
        $data['polda'] = $this->M_common->getAllDataPolda();
        $this->load->view('template/header',$data);
        $this->load->view('polda/v_daftar_polda',$data);
        
    }
    public function getPolres(){
        $data['title'] = 'Daftar Polres';
        $data['polres'] = $this->M_common->getAllDataPolres();
        $this->load->view('template/header',$data);
        $this->load->view('polres/v_daftar_polres',$data);
    }
    public function getPolsek(){
        $data['title'] = 'Daftar Polsek';
        $data['polsek'] = $this->M_common->getAllDataPolsek();
        $this->load->view('template/header',$data);
        $this->load->view('polsek/v_daftar_polsek',$data);
    }
    public function getLaporanProgram(){
        $data['title'] = 'Daftar Program';
        // echo $_POST['cari'];die;
        if (isset($_POST['tahun'])){
            $data['laporan']= $this->M_common->getAllDataLaporanByYear($this->input->post('tahun'));
        }
        else{
            $data['laporan'] = $this->M_common->getAllDataLaporan();
        }
        $data['tahun'] = $this->M_common->getYear();
        $this->load->view('template/header',$data);
        $this->load->view('laporan/v_daftar_laporan',$data);
    }

    public function getLaporanKegiatan(){
        $data['title'] = 'Daftar Kegiatan';
        $data['kegiatan'] = $this->M_common->getAllDataKegiatan();
        $data['kode_program'] = $this->M_common->getKodeProgramDistinct();
        $data['kode_output'] = $this->M_common->getKodeOutputDistinct();
        $this->load->view('template/header',$data);
        $this->load->view('laporan/v_daftar_kegiatan',$data);
    }

    public function getLaporanOutput(){
        $data['title'] = 'Daftar Output';
        $data['output'] = $this->M_common->getAllDataOutput();
        $data['kode_kegiatan'] = $this->M_common->getKodeKegiatanDistinct();
        $this->load->view('template/header',$data);
        $this->load->view('laporan/v_daftar_output',$data);
    }
    
    public function getNamaKegiatan(){
        $data = $this->M_common->getNamaKegiatanById($this->input->post('kode_kegiatan'));
        echo json_encode($data);
    }
    public function getNamaOutput(){
        $data = $this->M_common->getNamaOutputById($this->input->post('kode_output'));
        echo json_encode($data);
    }
    public function getNamaUraian(){
        $data = $this->M_common->getNamaUraianById($this->input->post('no_kontrak'));
        echo json_encode($data);
    }

    public function tambahPolda(){
        $this->form_validation->set_rules('nama','Nama','required|trim');
        $this->form_validation->set_rules('wilayah_hukum','Wilayah_Hukum','required|trim');
        $this->form_validation->set_rules('tipe_polda','Tipe','required|trim');

        if ($this->form_validation->run()==FALSE){
            $errors = validation_errors();
            echo json_encode(array('error'=>$errors));
        }
        else{
            $data = $this->M_common->tambahDataPolda();
            echo json_encode($data);
            // redirect('C_pusat/getPolda');
            
        }
    }
    public function editPolda($id){
        $data = $this->M_common->getDataPoldaById($id);
        echo json_encode($data);
    }
    public function updatePolda(){
        $data = $this->M_common->updateDataPolda();
        echo json_encode($data);
    }
    public function deletePolda($id){
        $data = $this->M_common->deletePoldaById($id);
        echo json_encode($data);
    }
    public function tambahPolres(){
        $this->form_validation->set_rules('nama','Nama','required|trim');
        $this->form_validation->set_rules('wilayah_hukum','Wilayah_Hukum','required|trim');
        $this->form_validation->set_rules('tipe_polres','Tipe','required|trim');

        if ($this->form_validation->run()==FALSE){
            $errors = validation_errors();
            echo json_encode(array('error'=>$errors));
        }
        else{
            $data = $this->M_common->tambahDataPolres();
            echo json_encode($data);
            // redirect('C_pusat/getPolres');
            
        }
    }
    public function editPolres($id){
        $data = $this->M_common->getDataPolresById($id);
        echo json_encode($data);
    }
    public function updatePolres(){
        $data = $this->M_common->updateDataPolres();
        echo json_encode($data);
    }
    public function deletePolres($id){
        $data = $this->M_common->deletePolresById($id);
        echo json_encode($data);
    }

    public function tambahPolsek(){
        $this->form_validation->set_rules('nama','Nama','required|trim');
        $this->form_validation->set_rules('wilayah_hukum','Wilayah_Hukum','required|trim');
        $this->form_validation->set_rules('tipe_polsek','Tipe','required|trim');

        if ($this->form_validation->run()==FALSE){
            $errors = validation_errors();
            echo json_encode(array('error'=>$errors));
        }
        else{
            $data = $this->M_common->tambahDataPolsek();
            echo json_encode($data);
            // redirect('C_pusat/getPolsek');
            
        }
    }
    public function editPolsek($id){
        $data = $this->M_common->getDataPolsekById($id);
        echo json_encode($data);
    }
    public function updatePolsek(){
        $data = $this->M_common->updateDataPolsek();
        echo json_encode($data);
    }
    public function deletePolsek($id){
        $data = $this->M_common->deletePolsekById($id);
        echo json_encode($data);
    }

    public function tambahLaporanProgram(){
        $this->form_validation->set_rules('kode_program','Kode Program','required|trim');
        $this->form_validation->set_rules('program','Program','required|trim');

        if ($this->form_validation->run()==FALSE){
            $errors = validation_errors();
            echo json_encode(array('error'=>$errors));
        }
        else{
            $data = $this->M_common->tambahDataLaporanProgram();
            echo json_encode($data);
            // redirect('C_pusat/getLaporan');
            
        }
    }
    public function editLaporanProgram($id){
        $data = $this->M_common->getDataLaporanProgramById($id);
        echo json_encode($data);
    }
    public function updateLaporanProgram(){
        $data = $this->M_common->updateDataLaporanProgram();
        echo json_encode($data);
    }
    public function deleteLaporanProgram($id){
        $data = $this->M_common->deleteLaporanProgramById($id);
        echo json_encode($data);
    }
    public function tambahLaporanKegiatan(){
        $this->form_validation->set_rules('kode_program','Kode Program','required|trim');
        $this->form_validation->set_rules('program','Program','required|trim');
        $this->form_validation->set_rules('kode_kegiatan','Kode Kegiatan','required|trim');
        $this->form_validation->set_rules('nama_kegiatan','Nama Kegiatan','required|trim');
        $this->form_validation->set_rules('amount_kegiatan','amount_kegiatan','required|trim');
        if ($this->form_validation->run()==FALSE){
            $errors = validation_errors();
            echo json_encode(array('error'=>$errors));
        }
        else{
            $data = $this->M_common->tambahDataLaporanKegiatan();
            echo json_encode($data);
            // redirect('C_pusat/getLaporan');
            
        }
    }
    public function editLaporanKegiatan($id_kegiatan){
        $data = $this->M_common->getDataLaporanKegiatanById($id_kegiatan);
        echo json_encode($data);
    }
    public function updateLaporanKegiatan(){
        $data = $this->M_common->updateDataLaporanKegiatan();
        echo json_encode($data);
    }
    public function deleteLaporanKegiatan($id_kegiatan){
        $data = $this->M_common->deleteLaporanKegiatanById($id_kegiatan);
        echo json_encode($data);
    }

    public function getNamaProgram(){
        $data = $this->M_common->getDataNamaProgram($this->input->post('kode_program'));
        echo json_encode($data);
    }
    public function tambahLaporanOutput(){
        $this->form_validation->set_rules('kode_kegiatan','Kode Kegiatan','required|trim');
        $this->form_validation->set_rules('nama_kegiatan','Nama Kegiatan','required|trim');
        $this->form_validation->set_rules('kode_output','Kode Output','required|trim');
        $this->form_validation->set_rules('nama_output','Nama Ouput','required|trim');
        // $this->form_validation->set_rules('amount_output','Amount_Output','required|trim');

        if ($this->form_validation->run()==FALSE){
            $errors = validation_errors();
            echo json_encode(array('error'=>$errors));
        }
        else{
            $data = $this->M_common->tambahDataLaporanOutput();
            echo json_encode($data);
            // redirect('C_pusat/getLaporan');
            
        }
    }
    public function editLaporanOutput($id_output){
        $data = $this->M_common->getDataLaporanOutputById($id_output);
        echo json_encode($data);
    }
    public function updateLaporanOutput(){
        $data = $this->M_common->updateDataLaporanOutput();
        echo json_encode($data);
    }
    public function deleteLaporanOutput($id_output){
        $data = $this->M_common->deleteLaporanProgramById($id_output);
        echo json_encode($data);
    }
}