<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UploadCuaca extends CI_Controller {
    public function __construct(){
        parent:: __construct();
    }

    public function index(){
        $filexml=simplexml_load_file("assets/rssapifeed/cuacadki.xml")or die("Error: kesalahan sistem!");
        foreach($filexml->children()->children()[4] as $brs){
            $data['data']=$brs;
            //$kode=$brs->area['id'];
        }
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
		$this->load->view('cuaca', $data);
        $this->load->view('template/footer');
    }

}
?>