<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Login extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('m_login');
        }
        public function index(){
            $this->load->view('login/login');
        }
		public function logout(){
			$this->session->sess_destroy();
			redirect(base_url('login'));
        }
        public function cek_login(){
            $username = $this->input->post('login');
		    $password = $this->input->post('password');
		    $where = array(
			    'username' => $username,
			    'password' => md5($password),
				'status'=>'Aktif'
			);
		    $cek = $this->m_login->cek_login("user",$where)->num_rows();
		    if($cek > 0){
			    $data_session = array(
				    'nama' => $username,
				    'status' => "login"
				);
			    $this->session->set_userdata($data_session);
			    redirect(base_url("beranda"));
		    }else{
			    $this->session->set_flashdata('message_login_error', 'Login Gagal, pastikan username dan passwrod benar!');
		    }
            $this->load->view('login/login');
        }
    }