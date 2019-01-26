<?php

defined('BASEPATH') OR exit ('no direct script access allowed');

class M_polres extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();

    }

    public function getAllDataPelaksanaan(){
        $this->db->select('tbl_kegiatan_polres.id_pelaksanaan');
        $this->db->select('tbl_program.kode_program');
        $this->db->select('tbl_program.program');
        $this->db->select('tbl_kegiatan.kode_kegiatan');
        $this->db->select('tbl_kegiatan.nama_kegiatan');
        $this->db->select('tbl_output.kode_output');
        $this->db->select('tbl_output.nama_output');
        $this->db->select('tbl_kegiatan_polres.no_kontrak');
        $this->db->select('tbl_kegiatan_polres.uraian');
        $this->db->select('tbl_kegiatan_polres.amount_pelaksanaan');
        $this->db->select('tbl_kegiatan_polres.bukti_transaksi');
        $this->db->from('tbl_kegiatan_polres');
        $this->db->join('tbl_program','tbl_kegiatan_polres.id_program=tbl_program.id_program');
        $this->db->join('tbl_kegiatan','tbl_kegiatan_polres.id_kegiatan=tbl_kegiatan.id_kegiatan');
        $this->db->join('tbl_output','tbl_kegiatan_polres.id_output=tbl_output.id_output');

        $query = $this->db->get();
        return $query->result();
    }

    public function getKodeProgram(){
        $this->db->select('id_program');
        $this->db->select('kode_program');
        $this->db->distinct();
        // $this->db->from('kode');
        // $this->db->order_by('no_induk','kode_kegiatan');
        $query = $this->db->get('tbl_program');
        return $query->result();
    }
    public function getKodeKegiatan(){
        $this->db->select('id_kegiatan');
        $this->db->select('kode_kegiatan');
        $this->db->distinct();
        $this->db->from('tbl_kegiatan');
        $query= $this->db->get();
        return $query->result();
    }
    public function getKodeOutput(){
        $this->db->select('id_output');
        $this->db->select('kode_output');
        $this->db->distinct();
        $this->db->from('tbl_output');
        $query= $this->db->get();
        return $query->result();
    }

    public function getDataProgram($val){
        $this->db->select('tbl_program.id_program');
        $this->db->select('tbl_program.program');
        $this->db->from('tbl_program');
        $this->db->where('tbl_program.id_program',$val);
        $query = $this->db->get();
        return $query->result();
    }
    public function getDataKegiatan($val){
        $this->db->select('id_kegiatan');
        $this->db->select('nama_kegiatan');
        $this->db->from('tbl_kegiatan');
        $this->db->where('id_kegiatan',$val);
        $query = $this->db->get();
        return $query->result();
    }
    public function getDataOutput($val){
        $this->db->select('id_output');
        $this->db->select('nama_output');
        $this->db->from('tbl_output');
        $this->db->where('id_output',$val);
        $query = $this->db->get();
        return $query->result();
    }
    // public function getAllDataProgram(){
    //     $this->db->select('tbl_program.kode_program');
    //     $this->db->select('tbl_program.program');
    //     $this->db->select('SUM(tbl_kegiatan_polres.amount_pelaksanaan) as total_amount');
    //     $this->db->from('tbl_kegiatan_polres');
    //     $this->db->join('tbl_program','tbl_kegiatan_polres.id_program=tbl_program.id_program');
    //     $this->db->group_by('tbl_program.kode_program');
    //     $query= $this->db->get();
    //     return $query->result();
    // }
    // public function getAllDataKegiatan(){
    //     $this->db->select('tbl_kegiatan.kode_kegiatan');
    //     $this->db->select('tbl_kegiatan.nama_kegiatan');
    //     $this->db->select('SUM(tbl_kegiatan_polres.amount_pelaksanaan) as total_amount');
    //     $this->db->from('tbl_kegiatan_polres');
    //     $this->db->join('tbl_kegiatan','tbl_kegiatan_polres.id_kegiatan=tbl_kegiatan.id_kegiatan');
    //     $this->db->group_by('tbl_kegiatan.kode_kegiatan');
    //     $query = $this->db->get();
    //     return $query->result();
    // }
    
    public function tambahDataKegiatan($data){
        $query = $this->db->insert('tbl_kegiatan_polres',$data);
        return $query;
    }
    
    public function getDataKegiatanById($id_pelaksanaan){
        $query= $this->db->get_where('tbl_kegiatan_polres',array('id_pelaksanaan'=>$id_pelaksanaan));
        return $query->row();
    }

    public function updateDataKegiatan($id_pelaksanaan,$data){
        // $this->input->post('id');
        $this->db->where('id_pelaksanaan',$id_pelaksanaan);
        $query = $this->db->update('tbl_kegiatan_polres',$data);
        // var_dump($query);die;
        return $query;
    }

    public function deleteKegiatanById($id_pelaksanaan){
        $this->db->where('id_pelaksanaan',$id_pelaksanaan);
        $this->db->delete('tbl_kegiatan_polres');
    }
}