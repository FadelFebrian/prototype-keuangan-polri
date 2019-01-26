<?php 

defined('BASEPATH') OR exit ('no direct script access allowed');

class M_common extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function getAllDataPolda(){
        $query = $this->db->get('polda');
        return $query->result();
    }
    public function getAllDataPolres(){
        $query = $this->db->get('polres');
        return $query->result();
    }
    public function getAllDataPolsek(){
        $query = $this->db->get('polsek');
        return $query->result();
    }
    public function getAllDataLaporan(){
        $this->db->select('tbl_program.id_program');
        $this->db->select('tbl_program.kode_program');
        $this->db->select('tbl_program.program');
        $this->db->select('tbl_kegiatan.kode_kegiatan');
        $this->db->select('SUM(tbl_kegiatan.amount_kegiatan) as total_amount');
        $this->db->from('tbl_program');
        $this->db->join('tbl_kegiatan','tbl_program.id_program=tbl_kegiatan.id_program');
        $this->db->group_by('tbl_kegiatan.kode_kegiatan');
        $query = $this->db->get();
        return $query->result();
    }
    public function getAllDataLaporanByYear($val){
        $this->db->select('tbl_program.id_program');
        $this->db->select('tbl_program.kode_program');
        $this->db->select('tbl_program.program');
        $this->db->select('tbl_kegiatan.kode_kegiatan');
        $this->db->select('SUM(tbl_kegiatan.amount_kegiatan) as total_amount');
        // $this->db->select(' as tahun','FALSE');
        $this->db->from('tbl_program');
        $this->db->join('tbl_kegiatan','tbl_program.id_program=tbl_kegiatan.id_program');
        $this->db->where('SUBSTR(tbl_kegiatan.created,1,4)',$val);
        $this->db->group_by('tbl_kegiatan.kode_kegiatan');
        $query = $this->db->get();
        return $query->result();
    }
    public function getAllDataKegiatan(){
        $this->db->select('tbl_kegiatan.id_kegiatan');
        $this->db->select('tbl_program.kode_program');
        $this->db->select('tbl_program.program');
        $this->db->select('tbl_kegiatan.kode_kegiatan');
        $this->db->select('tbl_kegiatan.nama_kegiatan');
        $this->db->select('tbl_kegiatan.amount_kegiatan');
        $this->db->from('tbl_kegiatan');
        $this->db->join('tbl_program','tbl_kegiatan.id_program=tbl_program.id_program');
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllDataOutput(){
        $this->db->select('tbl_output.id_output');
        $this->db->select('tbl_output.kode_output');
        $this->db->select('tbl_output.nama_output');
        $this->db->select('SUM(tbl_kegiatan_polres.amount_pelaksanaan) as total_amount');
        $this->db->from('tbl_output');
        $this->db->join('tbl_kegiatan_polres','tbl_output.id_output=tbl_kegiatan_polres.id_output');
        $query= $this->db->get();
        return $query->result();
    }

    public function getKodeKegiatanDistinct(){
        $this->db->select('tbl_kegiatan.id_kegiatan');
        $this->db->select('tbl_kegiatan.kode_kegiatan');
        $this->db->distinct();
        $this->db->from('tbl_kegiatan');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getYear(){
        $this->db->select('YEAR(tbl_kegiatan.created) as tahun');
        $this->db->distinct();
        $this->db->from('tbl_kegiatan');
        $query = $this->db->get();
        return $query->result();
    }

    public function getKodeProgramDistinct(){
        $this->db->select('id_program');
        $this->db->select('kode_program');
        $this->db->distinct();
        $query = $this->db->get('tbl_program');
        return $query->result();
    }
    public function getKodeOutputDistinct(){
        $this->db->select('id_output');
        $this->db->select('kode_output');
        $this->db->distinct();
        $query = $this->db->get('tbl_output');
        return $query->result();
    }
    public function getNoKontrakDistinct(){
        $this->db->select('id_pelaksanaan');
        $this->db->select('no_kontrak');
        $this->db->distinct();
        $query = $this->db->get('tbl_kegiatan_polres');
        return $query->result();
    }
    
    public function getAmountPelaksanaan(){
        $this->db->select('COUNT(tbl_program.kode_program) as total_kode_program' );
        $this->db->select('COUNT(tbl_program.program) as total_program');
        $this->db->select('SUM(tbl_kegiatan_polres.amount_pelaksanaan) as total_amount');
        // $this->db->distinct();
        $this->db->from('tbl_kegiatan_polres');
        $this->db->join('tbl_program','tbl_kegiatan_polres.id_program=tbl_program.id_program');
        $query= $this->db->get();
        return $query->row();
    }

    public function getAmountBudget(){
        $this->db->select('COUNT(tbl_program.kode_program) as total_kode_program');
        $this->db->select('COUNT(tbl_program.program)as total_program');
        $this->db->select('SUM(tbl_kegiatan.amount_kegiatan) as total_amount');
        $this->db->from('tbl_program');
        $this->db->join('tbl_kegiatan','tbl_program.id_program=tbl_kegiatan.id_program');
        $query= $this->db->get();
        return $query->row();
    }




    public function tambahDataPolda(){
        $data = array(
            'nama'=>$this->input->post('nama',TRUE),
            'wilayah_hukum'=>$this->input->post('wilayah_hukum',TRUE),
            'tipe_polda'=>$this->input->post('tipe_polda',TRUE)
        );
        $query= $this->db->insert('polda',$data);
        return $query; 
    }
    public function getDataPoldaById($id){
        $query= $this->db->get_where('polda',array('id'=>$id));
        return $query->row();
    }
    public function updateDataPolda(){
        $id = $this->input->post('id',TRUE);
        $nama = $this->input->post('nama',TRUE);
        $wilayah_hukum = $this->input->post('wilayah_hukum',TRUE);
        $tipe_polda = $this->input->post('tipe_polda',TRUE);


        $data = array(
            'id' => $id,
            'nama'=>$nama,
            'wilayah_hukum'=>$wilayah_hukum,
            'tipe_polda'=> $tipe_polda
        );
        $this->db->where('id',$id);
        $query = $this->db->update('polda',$data);
        return $query;
    }
    public function deletePoldaById($id){
        // $this->input->post('id');
        $this->db->where('id',$id);
        $query = $this->db->delete('polda');
        return $query;
    }
    public function tambahDataPolres(){
        $data = array(
            'nama'=>$this->input->post('nama',TRUE),
            'wilayah_hukum'=>$this->input->post('wilayah_hukum',TRUE),
            'tipe_polres'=>$this->input->post('tipe_polres',TRUE)
        );
        $query= $this->db->insert('polres',$data);
        return $query; 
    }
    public function getDataPolresById($id){
        $query= $this->db->get_where('polres',array('id'=>$id));
        return $query->row();
    }
    public function updateDataPolres(){
        $id = $this->input->post('id',TRUE);
        $nama = $this->input->post('nama',TRUE);
        $wilayah_hukum = $this->input->post('wilayah_hukum',TRUE);
        $tipe_polres = $this->input->post('tipe_polres',TRUE);


        $data = array(
            'id' => $id,
            'nama'=>$nama,
            'wilayah_hukum'=>$wilayah_hukum,
            'tipe_polres'=> $tipe_polres
        );
        $this->db->where('id',$id);
        $query = $this->db->update('polres',$data);
        return $query;
    }
    public function deletePolresById($id){
        // $this->input->post('id');
        $this->db->where('id',$id);
        $query = $this->db->delete('polres');
        return $query;
    }
    public function tambahDataPolsek(){
        $data = array(
            'nama'=>$this->input->post('nama',TRUE),
            'wilayah_hukum'=>$this->input->post('wilayah_hukum',TRUE),
            'tipe_polsek'=>$this->input->post('tipe_polsek',TRUE)
        );
        $query= $this->db->insert('polsek',$data);
        return $query; 
    }
    public function getDataPolsekById($id){
        $query= $this->db->get_where('polsek',array('id'=>$id));
        return $query->row();
    }
    public function updateDataPolsek(){
        $id = $this->input->post('id',TRUE);
        $nama = $this->input->post('nama',TRUE);
        $wilayah_hukum = $this->input->post('wilayah_hukum',TRUE);
        $tipe_polsek = $this->input->post('tipe_polsek',TRUE);


        $data = array(
            'id' => $id,
            'nama'=>$nama,
            'wilayah_hukum'=>$wilayah_hukum,
            'tipe_polsek'=> $tipe_polsek
        );
        $this->db->where('id',$id);
        $query = $this->db->update('polsek',$data);
        return $query;
    }
    public function deletePolsekById($id){
        // $this->input->post('id');
        $this->db->where('id',$id);
        $query = $this->db->delete('polsek');
        return $query;
    }

    public function tambahDataLaporanProgram(){
        $data = array(
            'id_program'=>$this->input->post('kode_program',TRUE),
            'program' =>$this->input->post('program',TRUE)
        );
        $query= $this->db->insert('tbl_program',$data);
        return $query; 
    }
    public function getDataLaporanProgramById($id_program){
        $query= $this->db->get_where('tbl_program',array('id_program'=>$id_program));
        return $query->row();
    }
    public function updateDataLaporanProgram(){
        $id_program = $this->input->post('id_program',TRUE);
        $kode_program = $this->input->post('kode_program',TRUE);
        $program = $this->input->post('program',TRUE); 
        $amount = $this->input->post('amount',TRUE);


        $data = array(
            'id_program' => $id_program,
            'kode_program'=>$kode_program,
            'program'=>$program,
            'amount' =>$amount
        );
        $this->db->where('id_program',$id_program);
        $query = $this->db->update('tbl_program',$data);
        return $query;
    }
    public function deleteLaporanProgramById($id_program){
        // $this->input->post('id_program');
        $this->db->where('id_program',$id_program);
        $query = $this->db->delete('tbl_program');
        return $query;
    }

    public function tambahDataLaporanKegiatan(){
        $data = array(
            'id_program'=>$this->input->post('kode_program',TRUE),
            'kode_kegiatan' =>$this->input->post('kode_kegiatan',TRUE),
            'nama_kegiatan' =>$this->input->post('nama_kegiatan',TRUE),
            'amount_kegiatan'=>$this->input->post('amount_kegiatan',TRUE)
        );
        $query= $this->db->insert('tbl_kegiatan',$data);
        return $query; 
    }
    public function getDataLaporanKegiatanById($id_kegiatan){
        $query= $this->db->get_where('tbl_kegiatan',array('id_kegiatan'=>$id_kegiatan));
        return $query->row();
    }
    public function updateDataLaporanKegiatan(){
        $id_kegiatan = $this->input->post('id_kegiatan',TRUE);
        $kode_program = $this->input->post('kode_program',TRUE);
        
        // $program = $this->input->post('program',TRUE);
        $kode_kegiatan = $this->input->post('kode_kegiatan',TRUE);
        $nama_kegiatan = $this->input->post('nama_kegiatan',TRUE); 
        $amount_kegiatan = $this->input->post('amount_kegiatan',TRUE);


        $data = array(
            'id_kegiatan' => $id_kegiatan,
            'id_program'=>$kode_program,
            'kode_kegiatan'=>$kode_kegiatan,
            'nama_kegiatan'=>$nama_kegiatan,
            'amount_kegiatan' =>$amount_kegiatan
        );
        $this->db->where('id_kegiatan',$id_kegiatan);
        $query = $this->db->update('tbl_kegiatan',$data);
        return $query;
    }
    public function deleteLaporanKegiatanById($id_kegiatan){
        // $this->input->post('id');
        $this->db->where('id_kegiatan',$id_kegiatan);
        $query = $this->db->delete('tbl_kegiatan');
        return $query;
    }

    public function getDataNamaProgram($val){
        // $kode_kegiatan = $this->input->get('kode_kegiatan');
        $this->db->select('program');
        // $this->db->select('amount');
        $this->db->from('tbl_program');
        $this->db->where('id_program',$val);
        
        $query = $this->db->get();
        return $query->result();
    }

    public function getNamaKegiatanById($val){
        $this->db->select('nama_kegiatan');
        $this->db->from('tbl_kegiatan');
        $this->db->where('id_kegiatan',$val);
        $query = $this->db->get();
        return $query->result();
    }
    public function getNamaOutputById($val){
        $this->db->select('nama_output');
        $this->db->from('tbl_output');
        $this->db->where('id_output',$val);
        $query = $this->db->get();
        return $query->result();
    }
    public function getNamaUraianById($val){
        $this->db->select('uraian');
        $this->db->from('tbl_kegiatan_polres');
        $this->db->where('id_pelaksanaan',$val);
        $query = $this->db->get();
        return $query->result();
    }
    public function tambahDataLaporanOutput(){
        $data = array(
            'id_kegiatan'=>$this->input->post('kode_kegiatan',TRUE),
            // 'id_pelaksanaan'=>$this->input->post('no_kontrak',TRUE),
            'kode_output' =>$this->input->post('kode_output',TRUE),
            'nama_output' =>$this->input->post('nama_output',TRUE),
            // 'amount_output'=>$this->input->post('amount_output',TRUE)
        );
        $query= $this->db->insert('tbl_output',$data);
        return $query; 
    }
    public function getDataLaporanOutputById($id_output){
        $query= $this->db->get_where('tbl_output',array('id_output'=>$id_output));
        return $query->row();
    }
    public function updateDataLaporanOutput(){
        $id_output = $this->input->post('id_output',TRUE);
        $kode_kegiatan = $this->input->post('kode_kegiatan',TRUE);
        // $nama_kegiatan = $this->input->post('nama_kegiatan',TRUE);
        $kode_output = $this->input->post('kode_output',TRUE);
        $nama_output = $this->input->post('nama_output',TRUE); 
        $amount_output = $this->input->post('amount_output',TRUE);


        $data = array(
            'id_output' => $id_output,
            'id_kegiatan'=>$kode_kegiatan,
            // 'program'=>$program,
            'kode_output'=>$kode_output,
            'nama_output'=>$nama_output,
            'amount_output' =>$amount_output
        );
        $this->db->where('id_output',$id_output);
        $query = $this->db->update('tbl_output',$data);
        return $query;
    }
    public function deleteLaporanOutputById($id_output){
        // $this->input->post('id');
        $this->db->where('id_output',$id_output);
        $query = $this->db->delete('tbl_output');
        return $query;
    }
}