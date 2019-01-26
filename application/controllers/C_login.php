<?php

defined('BASEPATH') OR exit ('no direct script access allowed');

class C_login extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('session','form_validation');
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('M_auth');
    }

    public function viewLogin(){
        $data['title'] =  "Login";
        $this->load->view('template/header',$data);
        $this->load->view('page/v_login');
    }
    
    public function login(){
        $this->form_validation->set_rules('email','Email','required|valid_email|trim');
        $this->form_validation->set_rules('password','Password','required|trim');

        if ($this->form_validation->run()==FALSE){
            $this->viewLogin();

        }
        else{
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $query = $this->M_auth->cekLogin($email,$password);

            if ($query->num_rows()>0){
                foreach($query->result() as $row){
                    $this->session->set_userdata('email',$row->email);
                    $this->session->set_userdata('jenis_user',$row->jenis_user);  

                    if ($this->session->userdata('jenis_user')=='pusat'){
                        
                        redirect('C_pusat/index');
                    }
                    elseif ($this->session->userdata('jenis_user')=='polda'){
                        redirect('C_polda/index');
                    }
                    elseif ($this->session->userdata('jenis_user')=='polres'){
                        redirect('C_polres/index');
                    }
                    elseif ($this->session->userdata('jenis_user')=='polsek'){
                        redirect('C_polsek/index');
                    }
                }    
            }
            else{
                $this->session->set_flashdata('flash','Email atau Password tidak sesuai');
                $this->viewLogin();
            }
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('C_login/viewLogin');
    }
}
