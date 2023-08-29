<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Koperasi_pusat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Koperasi_pusat_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'koperasi_pusat/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'koperasi_pusat/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'koperasi_pusat/index?q=';
            $config['first_url'] = base_url() . 'koperasi_pusat/index?q=';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Koperasi_pusat_model->total_rows($q);
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        $koperasi_pusat = $this->Koperasi_pusat_model->get_limit_data2($config['per_page'], $start, $q);
        $config['first_link']       = 'Awal';
        $config['last_link']        = 'Akhir';
        $config['next_link']        = 'Berikutnya';
        $config['prev_link']        = 'Sebelumnya';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'koperasi_pusat_data' => $koperasi_pusat,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('koperasi_pusat_list', $data);
        $this->load->view('template/footer');
    }

    public function read($id) 
    {
        $row = $this->Koperasi_pusat_model->get_by_id($id);
        if ($row) {
            $data = array(
		'niki' => $row->niki,
		'nisat' => $row->nisat,
		'nama_koperasi_pusat' => $row->nama_koperasi_pusat,
		'nama_depan' => $row->nama_depan,
		'nama_belakang' => $row->nama_belakang,
		'kode_propinsi' => $row->kode_propinsi,
		'no_hp_wa' => $row->no_hp_wa,
	    );
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('koperasi_pusat_read', $data);
            $this->load->view('template/footer');
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan!');
            redirect(site_url('koperasi_pusat'));
        }
    }

    public function create() 
    {
        $lastnis = $this->Koperasi_pusat_model->total_rows();
        $lastnis=$lastnis+1;
        $lastnis=str_pad($lastnis, 6, '0', STR_PAD_LEFT);
        $propinsi=$this->Koperasi_pusat_model->get_propinsi();
        $niki=$this->Koperasi_pusat_model->get_niki();
        $data = array(
            'lastnis'=> $lastnis,
            'propinsi'=>$propinsi,
            'nki'=>$niki,
            'button' => 'Tambah',
            'action' => site_url('koperasi_pusat/create_action'),
	    'niki' => set_value('niki'),
	    'nisat' => set_value('nisat'),
	    'nama_koperasi_pusat' => set_value('nama_koperasi_pusat'),
	    'nama_depan' => set_value('nama_depan'),
	    'nama_belakang' => set_value('nama_belakang'),
	    'kode_propinsi' => set_value('kode_propinsi'),
	    'no_hp_wa' => set_value('no_hp_wa'),
	);
    //print_r($propinsi);
    //exit();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('koperasi_pusat_form', $data);
        $this->load->view('template/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'niki' => $this->input->post('niki',TRUE),
        'nisat' => $this->input->post('nisat',TRUE),
		'nama_koperasi_pusat' => $this->input->post('nama_koperasi_pusat',TRUE),
		'nama_depan' => $this->input->post('nama_depan',TRUE),
		'nama_belakang' => $this->input->post('nama_belakang',TRUE),
		'kode_propinsi' => $this->input->post('kode_propinsi',TRUE),
		'no_hp_wa' => $this->input->post('no_hp_wa',TRUE),
	    );

            $this->Koperasi_pusat_model->insert($data);
            $this->session->set_flashdata('message', 'Tambah Data Berhasil');
            redirect(site_url('koperasi_pusat'));
        }
    }
    
    public function update($id) 
    {
        $lastnis = $this->Koperasi_pusat_model->total_rows();
        $lastnis=$lastnis+1;
        $lastnis=str_pad($lastnis, 6, '0', STR_PAD_LEFT);
        $propinsi=$this->Koperasi_pusat_model->get_propinsi();
        $niki=$this->Koperasi_pusat_model->get_niki();

        $row = $this->Koperasi_pusat_model->get_by_id($id);

        if ($row) {
            $data = array(
                'lastnis'=> $lastnis,
            'propinsi'=>$propinsi,
            'nki'=>$niki,
            
                'button' => 'Rubah',
                'action' => site_url('koperasi_pusat/update_action'),
		'niki' => set_value('niki', $row->niki),
		'nisat' => set_value('nisat', $row->nisat),
		'nama_koperasi_pusat' => set_value('nama_koperasi_pusat', $row->nama_koperasi_pusat),
		'nama_depan' => set_value('nama_depan', $row->nama_depan),
		'nama_belakang' => set_value('nama_belakang', $row->nama_belakang),
		'kode_propinsi' => set_value('kode_propinsi', $row->kode_propinsi),
		'no_hp_wa' => set_value('no_hp_wa', $row->no_hp_wa),
	    );
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('koperasi_pusat_form', $data);
            $this->load->view('template/footer');
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan!');
            redirect(site_url('koperasi_pusat'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('nisat', TRUE));
        } else {
            $data = array(
		'niki' => $this->input->post('niki',TRUE),
		'nama_koperasi_pusat' => $this->input->post('nama_koperasi_pusat',TRUE),
		'nama_depan' => $this->input->post('nama_depan',TRUE),
		'nama_belakang' => $this->input->post('nama_belakang',TRUE),
		'kode_propinsi' => $this->input->post('kode_propinsi',TRUE),
		'no_hp_wa' => $this->input->post('no_hp_wa',TRUE),
	    );

            $this->Koperasi_pusat_model->update($this->input->post('nisat', TRUE), $data);
            $this->session->set_flashdata('message', 'Perubahan Data Berhasil');
            redirect(site_url('koperasi_pusat'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Koperasi_pusat_model->get_by_id($id);

        if ($row) {
            $this->Koperasi_pusat_model->delete($id);
            $this->session->set_flashdata('message', 'Hapus Data Berhasil');
            redirect(site_url('koperasi_pusat'));
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan!');
            redirect(site_url('koperasi_pusat'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('niki', 'niki', 'trim|required');
	$this->form_validation->set_rules('nama_koperasi_pusat', 'nama koperasi pusat', 'trim|required');
	$this->form_validation->set_rules('nama_depan', 'nama depan', 'trim|required');
	$this->form_validation->set_rules('nama_belakang', 'nama belakang', 'trim|required');
	$this->form_validation->set_rules('kode_propinsi', 'kode propinsi', 'trim|required');
	$this->form_validation->set_rules('no_hp_wa', 'no hp wa', 'trim|required');

	$this->form_validation->set_rules('nisat', 'nisat', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "koperasi_pusat.xls";
        $judul = "koperasi_pusat";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Niki");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Koperasi Pusat");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Depan");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Belakang");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Propinsi");
	xlsWriteLabel($tablehead, $kolomhead++, "No Hp Wa");

	foreach ($this->Koperasi_pusat_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->niki);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_koperasi_pusat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_depan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_belakang);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kode_propinsi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->no_hp_wa);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Koperasi_pusat.php */
/* Location: ./application/controllers/Koperasi_pusat.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator and Modified by didi.ysf@gmail.com 2023-01-17 21:01:16 */
/* http://harviacode.com */