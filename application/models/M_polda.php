<?php

defined('BASEPATH') OR exit ('no direct script access allowed');

class M_polda extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function getDataKegiatanPolres(){
        // $query = $this->db->query('SELECT no_induk,kode_kegiatan,program_kegiatan,SUM(anggaran_terpakai) as total FROM tbl_kegiatan_polres GROUP BY kode_kegiatan');
        // return $query->result();
        $this->db->select('no_induk');
        $this->db->select('kode_kegiatan');
        $this->db->select('program_kegiatan');
        $this->db->select('SUM(anggaran_terpakai) as total');
        $this->db->from('tbl_kegiatan_polres');
        $this->db->group_by('kode_kegiatan');
        $query = $this->db->get();
        return $query->result();
    }
}