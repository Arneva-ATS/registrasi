<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Koperasi_primer extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Koperasi_primer_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'koperasi_primer/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'koperasi_primer/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'koperasi_primer/index?q=';
            $config['first_url'] = base_url() . 'koperasi_primer/index?q=';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Koperasi_primer_model->total_rows($q);
        
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        $koperasi_primer = $this->Koperasi_primer_model->get_limit_data2($config['per_page'], $start, $q);

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
            'koperasi_primer_data' => $koperasi_primer,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('koperasi_primer_list', $data);
        $this->load->view('template/footer');
    }

    public function read($id) 
    {
        $row = $this->Koperasi_primer_model->get_by_id($id);
        if ($row) {
            $data = array(
		'niki' => $row->niki,
		'nisat' => $row->nisat,
		'nirim' => $row->nirim,
		'nama_koperasi_primer' => $row->nama_koperasi_primer,
		'nama_depan' => $row->nama_depan,
		'nama_belakang' => $row->nama_belakang,
		'kode_propinsi' => $row->kode_propinsi,
		'kode_kabupaten_kota' => $row->kode_kabupaten_kota,
		'no_hp_wa' => $row->no_hp_wa,
	    );
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('koperasi_primer_read', $data);
            $this->load->view('template/footer');
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan!');
            redirect(site_url('koperasi_primer'));
        }
    }

    public function create() 
    {
        $lastnis = $this->Koperasi_primer_model->total_rows();
        $lastnis=$lastnis+1;
        $lastnis=str_pad($lastnis, 9, '0', STR_PAD_LEFT);
        $propinsi=$this->Koperasi_primer_model->get_propinsi();
        $niki=$this->Koperasi_primer_model->get_niki();
        $nisat=$this->Koperasi_primer_model->get_nisat();
        //$kabkota=$this->Koperasi_primer_model->get_kabkota();
        $data = array(
            'lastnis'=> $lastnis,
            'propinsi'=>$propinsi,
            'nki'=>$niki,
            'nsat'=>$nisat,
            //'kabkota'=>$kabkota,
            'button' => 'Tambah',
            'action' => site_url('koperasi_primer/create_action'),
	    'niki' => set_value('niki'),
	    'nisat' => set_value('nisat'),
	    'nirim' => set_value('nirim'),
	    'nama_koperasi_primer' => set_value('nama_koperasi_primer'),
	    'nama_depan' => set_value('nama_depan'),
	    'nama_belakang' => set_value('nama_belakang'),
	    'kode_propinsi' => set_value('kode_propinsi'),
	    'kode_kabupaten_kota' => set_value('kode_kabupaten_kota'),
	    'no_hp_wa' => set_value('no_hp_wa'),
	);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('koperasi_primer_form', $data);
        $this->load->view('template/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'nirim' => $this->input->post('nirim',TRUE),
		'niki' => $this->input->post('niki',TRUE),
		'nisat' => $this->input->post('nisat',TRUE),
		'nama_koperasi_primer' => $this->input->post('nama_koperasi_primer',TRUE),
		'nama_depan' => $this->input->post('nama_depan',TRUE),
		'nama_belakang' => $this->input->post('nama_belakang',TRUE),
		'kode_propinsi' => $this->input->post('kode_propinsi',TRUE),
		'kode_kabupaten_kota' => $this->input->post('kode_kabupaten_kota',TRUE),
		'no_hp_wa' => $this->input->post('no_hp_wa',TRUE),
	    );

            $this->Koperasi_primer_model->insert($data);
            $this->session->set_flashdata('message', 'Tambah Data Berhasil');
            redirect(site_url('koperasi_primer'));
        }
    }
    
    public function update($id) 
    {
        $lastnis = $this->Koperasi_primer_model->total_rows();
        $lastnis=$lastnis+1;
        $lastnis=str_pad($lastnis, 9, '0', STR_PAD_LEFT);
        $propinsi=$this->Koperasi_primer_model->get_propinsi();
        $niki=$this->Koperasi_primer_model->get_niki();
        $nisat=$this->Koperasi_primer_model->get_nisat();
        $row = $this->Koperasi_primer_model->get_by_id($id);

        if ($row) {
            $data = array(
                'lastnis'=> $lastnis,
                'propinsi'=>$propinsi,
                'nki'=>$niki,
                'nsat'=>$nisat,
                'button' => 'Rubah',
                'action' => site_url('koperasi_primer/update_action'),
		'niki' => set_value('niki', $row->niki),
		'nisat' => set_value('nisat', $row->nisat),
		'nirim' => set_value('nirim', $row->nirim),
		'nama_koperasi_primer' => set_value('nama_koperasi_primer', $row->nama_koperasi_primer),
		'nama_depan' => set_value('nama_depan', $row->nama_depan),
		'nama_belakang' => set_value('nama_belakang', $row->nama_belakang),
		'kode_propinsi' => set_value('kode_propinsi', $row->kode_propinsi),
		'kode_kabupaten_kota' => set_value('kode_kabupaten_kota', $row->kode_kabupaten_kota),
		'no_hp_wa' => set_value('no_hp_wa', $row->no_hp_wa),
	    );
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('koperasi_primer_form', $data);
            $this->load->view('template/footer');
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan!');
            redirect(site_url('koperasi_primer'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('nirim', TRUE));
        } else {
            $data = array(
		'niki' => $this->input->post('niki',TRUE),
		'nisat' => $this->input->post('nisat',TRUE),
		'nama_koperasi_primer' => $this->input->post('nama_koperasi_primer',TRUE),
		'nama_depan' => $this->input->post('nama_depan',TRUE),
		'nama_belakang' => $this->input->post('nama_belakang',TRUE),
		'kode_propinsi' => $this->input->post('kode_propinsi',TRUE),
		'kode_kabupaten_kota' => $this->input->post('kode_kabupaten_kota',TRUE),
		'no_hp_wa' => $this->input->post('no_hp_wa',TRUE),
	    );

            $this->Koperasi_primer_model->update($this->input->post('nirim', TRUE), $data);
            $this->session->set_flashdata('message', 'Perubahan Data Berhasil');
            redirect(site_url('koperasi_primer'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Koperasi_primer_model->get_by_id($id);

        if ($row) {
            $this->Koperasi_primer_model->delete($id);
            $this->session->set_flashdata('message', 'Hapus Data Berhasil');
            redirect(site_url('koperasi_primer'));
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan!');
            redirect(site_url('koperasi_primer'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('niki', 'niki', 'trim|required');
	$this->form_validation->set_rules('nisat', 'nisat', 'trim|required');
	$this->form_validation->set_rules('nama_koperasi_primer', 'nama koperasi primer', 'trim|required');
	$this->form_validation->set_rules('nama_depan', 'nama depan', 'trim|required');
	$this->form_validation->set_rules('nama_belakang', 'nama belakang', 'trim|required');
	$this->form_validation->set_rules('kode_propinsi', 'kode propinsi', 'trim|required');
	$this->form_validation->set_rules('kode_kabupaten_kota', 'kode kabupaten kota', 'trim|required');
	$this->form_validation->set_rules('no_hp_wa', 'no hp wa', 'trim|required');

	$this->form_validation->set_rules('nirim', 'nirim', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "koperasi_primer.xls";
        $judul = "koperasi_primer";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nisat");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Koperasi Primer");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Depan");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Belakang");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Propinsi");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Kabupaten Kota");
	xlsWriteLabel($tablehead, $kolomhead++, "No Hp Wa");

	foreach ($this->Koperasi_primer_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->niki);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nisat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_koperasi_primer);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_depan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_belakang);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kode_propinsi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kode_kabupaten_kota);
	    xlsWriteNumber($tablebody, $kolombody++, $data->no_hp_wa);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
    function get_kabkota(){
        $id_prop = $this->input->post('id',TRUE);
        $data = $this->Koperasi_primer_model->get_kabkota($id_prop)->result();
        echo json_encode($data);
    }
}

/* End of file Koperasi_primer.php */
/* Location: ./application/controllers/Koperasi_primer.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator and Modified by didi.ysf@gmail.com 2023-01-17 21:01:03 */
/* http://harviacode.com */