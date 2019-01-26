<?php 

defined('BASEPATH') OR exit ('no direct script access allowed');

class C_polres extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('session','form_validation');
        $this->load->database();
        $this->load->model('M_polres');
        $this->load->model('M_common');

        if ($this->session->userdata('jenis_user')!="polres"){
            redirect('C_login/viewLogin');
        }
    }
        public function index(){
            if (empty($this->session->userdata('jenis_user'))){
                $this->load->view('page/login');
            }
            $data['title'] = "Polres";
            $data['pagu'] = $this->M_common->getAmountBudget();
            $data['pelaksanaan'] = $this->M_common->getAmountPelaksanaan();
            $this->load->view('template/header',$data);
            $this->load->view('polres/v_index_polres');
        }

        public function viewProgram(){
            $data['title'] = 'List Program';
            $data['program'] = $this->M_common->getAllDataLaporan();
            $this->load->view('template/header',$data);
            $this->load->view('polres/v_program_polres',$data);
        }
        public function viewKegiatan(){
            $data['title'] = 'List Kegiatan';
            $data['kegiatan'] = $this->M_common->getAllDataKegiatan();
            $this->load->view('template/header',$data);
            $this->load->view('polres/v_kegiatan_polres',$data);
        }
        public function viewPelaksanaan(){
            $data['title'] = 'Data Kegiatan';
            $data['pelaksanaan'] = $this->M_polres->getAllDataPelaksanaan();
            $data['program'] = $this->M_polres->getKodeProgram();
            $data['kegiatan'] = $this->M_polres->getKodeKegiatan();
            $data['output'] = $this->M_polres->getKodeOutput();
            $this->load->view('template/header',$data);
            $this->load->view('polres/v_pelaksanaan_polres',$data);
        }
        public function getKodeProgram(){
            $data['kode'] = $this->M_polres->getDataProgram($this->input->post('kode_program'));
            echo json_encode($data);
        }
        public function getKodeKegiatan(){
            $data['kode'] = $this->M_polres->getDataKegiatan($this->input->post('kode_kegiatan'));
            echo json_encode($data);
        }
        public function getKodeOutput(){
            $data['output']=$this->M_polres->getDataOutput($this->input->post('kode_output'));
            echo json_encode($data);
        }
        

        public function tambahData(){
            $kode_program = $this->input->post('kode_program',TRUE);
            // $program = $this->input->post('program',TRUE);
            $kode_kegiatan = $this->input->post('kode_kegiatan',TRUE);
            $kode_output = $this->input->post('kode_output',TRUE);
            $no_kontrak = $this->input->post('no_kontrak',TRUE);
            $uraian = $this->input->post('uraian',TRUE);
            $amount_pelaksanaan = $this->input->post('amount_pelaksanaan',TRUE);
            
                
            $data = array(
                "id_program"=>$kode_program,
                // "program"=>$program,
                "id_kegiatan" =>$kode_kegiatan,
                "id_output" =>$kode_output,
                "no_kontrak" =>$no_kontrak,
                "uraian" =>$uraian,
                "amount_pelaksanaan"=>$amount_pelaksanaan
                
            );
            
            if (!empty($_FILES['bukti_transaksi']['name'])){
                $upload = $this->upload();
                $data['bukti_transaksi'] = $upload;
            }
            $insert = $this->M_polres->tambahDataKegiatan($data);
            echo json_encode(array('status'=>TRUE));

        }
        public function upload(){
            $config['upload_path'] = './assets/images/bukti_transaksi';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = '1000';
            $config['overwrite'] = TRUE;
            $config['remove_space'] = TRUE;

            $this->load->library('upload',$config);
            if (!$this->upload->do_upload('bukti_transaksi')){
                // $error = array('error' => $this->upload->display_errors());
                echo $this->upload->display_errors();
            }
            return $this->upload->data('file_name');
            
        }
        
        public function editData(){
            $id_pelaksanaan = $this->input->post('id_pelaksanaan',TRUE);
            $id_program = $this->input->post('kode_program',TRUE);
            $id_kegiatan = $this->input->post('kode_kegiatan',TRUE);
            $id_output = $this->input->post('kode_output',TRUE);
            $no_kontrak = $this->input->post('no_kontrak',TRUE);
            $uraian = $this->input->post('uraian',TRUE);
            $amount_pelaksanaan = $this->input->post('amount_pelaksanaan',TRUE);
            
                
            $data = array(
                "id_pelaksanaan"=>$id_pelaksanaan,
                "id_program"=>$id_program,
                "id_kegiatan"=>$id_kegiatan,
                "id_output"=>$id_output,
                "no_kontrak" =>$no_kontrak,
                "uraian" =>$uraian,
                "amount_pelaksanaan"=>$amount_pelaksanaan
                
            );
            // var_dump($data);die;
           
            if(!empty($_FILES['bukti_transaksi']['name'])){
                $upload = $this->upload();
                $row = $this->M_polres->getDataKegiatanById($id_pelaksanaan);
                if(file_exists('assets/images/bukti_transaksi/'.$row->bukti_transaksi) && $row->bukti_transaksi)
                unlink('assets/images/bukti_transaksi/'.$row->bukti_transaksi);   
                $data['bukti_transaksi'] = $upload;
            }
            $result = $this->M_polres->updateDataKegiatan($id_pelaksanaan,$data);
            // print_r($result);
            echo json_encode(array('status'=>true));
            
        }

        public function getDataById($id_pelaksanaan){
            $data = $this->M_polres->getDataKegiatanById($id_pelaksanaan);
            echo json_encode($data);
        }

        public function deleteKegiatan($id_pelaksanaan){
            $gambar = $this->M_polres->getDataKegiatanById($id_pelaksanaan);
            if(file_exists('assets/images/bukti_transaksi/'.$gambar->bukti_transaksi) && $gambar->bukti_transaksi)
            unlink('assets/images/bukti_transaksi/'.$gambar->bukti_transaksi);
            $this->M_polres->deleteKegiatanByid($id_pelaksanaan);
            echo json_encode(array('status'=>true));
        }
    }

        
