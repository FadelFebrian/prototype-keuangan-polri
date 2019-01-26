<?php 

defined('BASEPATH') OR exit('no direct script access allowed');

class M_auth extends CI_Model{

    public function cekLogin($email,$password){
        $query = $this->db->get_where('user',array('email'=>$email,
                                           'password'=>$password)); 
        return $query;
    }
}