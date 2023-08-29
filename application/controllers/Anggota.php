<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Anggota extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Anggota_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'anggota/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'anggota/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'anggota/index?q=';
            $config['first_url'] = base_url() . 'anggota/index?q=';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Anggota_model->total_rows($q);
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        $anggota = $this->Anggota_model->get_limit_data($config['per_page'], $start, $q);
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
            'anggota_data' => $anggota,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('anggota_list', $data);
        $this->load->view('template/footer');
    }

    public function read($id) 
    {
        $row = $this->Anggota_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_anggota' => $row->id_anggota,
		'nita' => $row->nita,
		'niki' => $row->niki,
		'nisat' => $row->nisat,
		'nirim' => $row->nirim,
		'nama' => $row->nama,
		'nama_depan' => $row->nama_depan,
		'nama_belakang' => $row->nama_belakang,
		'handphone' => $row->handphone,
	    );
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('anggota_read', $data);
            $this->load->view('template/footer');
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan!');
            redirect(site_url('anggota'));
        }
    }

    public function create() 
    {
        $lastnis = $this->Anggota_model->total_rows();
        $lastnis=$lastnis+1;
        $lastnis=str_pad($lastnis, 18, '0', STR_PAD_LEFT);
        $niki=$this->Anggota_model->get_niki();
        $nisat=$this->Anggota_model->get_nisat();
        $nirim=$this->Anggota_model->get_nirim();
        $data = array(
            'lastnis'=> $lastnis,
            'nki'=>$niki,
            'nsat'=>$nisat,
            'nrim'=>$nirim,
            'button' => 'Tambah',
            'action' => site_url('anggota/create_action'),
	    'id_anggota' => set_value('id_anggota'),
	    'nita' => set_value('nita'),
	    'niki' => set_value('niki'),
	    'nisat' => set_value('nisat'),
	    'nirim' => set_value('nirim'),
	    'nama' => set_value('nama'),
	    'nama_depan' => set_value('nama_depan'),
	    'nama_belakang' => set_value('nama_belakang'),
	    'handphone' => set_value('handphone'),
	);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('anggota_form', $data);
        $this->load->view('template/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nita' => $this->input->post('nita',TRUE),
		'niki' => $this->input->post('niki',TRUE),
		'nisat' => $this->input->post('nisat',TRUE),
		'nirim' => $this->input->post('nirim',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'nama_depan' => $this->input->post('nama_depan',TRUE),
		'nama_belakang' => $this->input->post('nama_belakang',TRUE),
		'handphone' => $this->input->post('handphone',TRUE),
	    );

            $this->Anggota_model->insert($data);
            $this->session->set_flashdata('message', 'Tambah Data Berhasil');
            redirect(site_url('anggota'));
        }
    }
    
    public function update($id) 
    {
        $lastnis = $this->Anggota_model->total_rows();
        $lastnis=$lastnis+1;
        $lastnis=str_pad($lastnis, 18, '0', STR_PAD_LEFT);
        $niki=$this->Anggota_model->get_niki();
        $nisat=$this->Anggota_model->get_nisat();
        $nirim=$this->Anggota_model->get_nirim();
        $row = $this->Anggota_model->get_by_id($id);

        if ($row) {
            $data = array(
                'lastnis'=> $lastnis,
            'nki'=>$niki,
            'nsat'=>$nisat,
            'nrim'=>$nirim,
                'button' => 'Rubah',
                'action' => site_url('anggota/update_action'),
		'id_anggota' => set_value('id_anggota', $row->id_anggota),
		'nita' => set_value('nita', $row->nita),
		'niki' => set_value('niki', $row->niki),
		'nisat' => set_value('nisat', $row->nisat),
		'nirim' => set_value('nirim', $row->nirim),
		'nama' => set_value('nama', $row->nama),
		'nama_depan' => set_value('nama_depan', $row->nama_depan),
		'nama_belakang' => set_value('nama_belakang', $row->nama_belakang),
		'handphone' => set_value('handphone', $row->handphone),
	    );
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('anggota_form', $data);
            $this->load->view('template/footer');
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan!');
            redirect(site_url('anggota'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_anggota', TRUE));
        } else {
            $data = array(
		'nita' => $this->input->post('nita',TRUE),
		'niki' => $this->input->post('niki',TRUE),
		'nisat' => $this->input->post('nisat',TRUE),
		'nirim' => $this->input->post('nirim',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'nama_depan' => $this->input->post('nama_depan',TRUE),
		'nama_belakang' => $this->input->post('nama_belakang',TRUE),
		'handphone' => $this->input->post('handphone',TRUE),
	    );

            $this->Anggota_model->update($this->input->post('id_anggota', TRUE), $data);
            $this->session->set_flashdata('message', 'Perubahan Data Berhasil');
            redirect(site_url('anggota'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Anggota_model->get_by_id($id);

        if ($row) {
            $this->Anggota_model->delete($id);
            $this->session->set_flashdata('message', 'Hapus Data Berhasil');
            redirect(site_url('anggota'));
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan!');
            redirect(site_url('anggota'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nita', 'nita', 'trim|required');
	$this->form_validation->set_rules('niki', 'niki', 'trim|required');
	$this->form_validation->set_rules('nisat', 'nisat', 'trim|required');
	$this->form_validation->set_rules('nirim', 'nirim', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('nama_depan', 'nama depan', 'trim|required');
	$this->form_validation->set_rules('nama_belakang', 'nama belakang', 'trim|required');
	$this->form_validation->set_rules('handphone', 'handphone', 'trim|required');

	$this->form_validation->set_rules('id_anggota', 'id_anggota', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "anggota.xls";
        $judul = "anggota";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nita");
	xlsWriteLabel($tablehead, $kolomhead++, "Niki");
	xlsWriteLabel($tablehead, $kolomhead++, "Nisat");
	xlsWriteLabel($tablehead, $kolomhead++, "Nirim");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Depan");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Belakang");
	xlsWriteLabel($tablehead, $kolomhead++, "Handphone");

	foreach ($this->Anggota_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nita);
	    xlsWriteLabel($tablebody, $kolombody++, $data->niki);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nisat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nirim);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_depan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_belakang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->handphone);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Anggota.php */
/* Location: ./application/controllers/Anggota.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator and Modified by didi.ysf@gmail.com 2023-01-17 20:55:11 */
/* http://harviacode.com */