<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Gaada extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->helper('url');
        }
        public function index(){
            $this->output->set_status_header('404');
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/gaada');
            $this->load->view('template/footer');
        }
    }
?>