<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author Acer
 */
class Login extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();  
    }
    function index(){
        $data['judul']='Login';
        $data['action']=  site_url('login/do_login');
        $this->load->view('login_view', $data);
    }
    function main_page(){
        echo 'this is main page';
    }
    function do_login(){
        $this->load->model('user_verifikasi','verifikasi');
        $user_id = $this->input->post('user_id');
        $password = $this->input->post('password');
        
        $query=  $this->verifikasi->cek_user($user_id, $password);
        
        if($query->num_rows()>0){
            redirect('Login/main_page');
        }else{
            $this->session->set_flashdata('login_error',TRUE);
            redirect('login');
        }
    }
    function logout(){
        
    }
}
