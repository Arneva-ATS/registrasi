<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_beranda');
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$data['induk']= $this->m_beranda->hitdata("koperasi_induk");
		$data['primer'] = $this->m_beranda->hitdata("koperasi_primer");
		$data['pusat'] = $this->m_beranda->hitdata("koperasi_pusat");
		$data['anggota'] = $this->m_beranda->hitdata("anggota");
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
		$this->load->view('beranda',$data);
        $this->load->view('template/footer');
	}
}
