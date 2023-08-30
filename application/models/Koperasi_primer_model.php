<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Koperasi_primer_model extends CI_Model
{

    public $table = 'koperasi_primer';
    public $id = 'nirim';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
    function get_propinsi(){
        $provinsi = $this->db->get('provinsi');
        return $provinsi->result();
    }
    function get_niki(){
        $niki = $this->db->get('koperasi_induk');
        return $niki->result();
    }
    function get_nisat(){
        $nisat = $this->db->get('koperasi_pusat');
        return $nisat->result();
    }
    //function get_kabkota(){
    //    $kabkota = $this->db->get('kabkota');
    //    return $kabkota->result();
    //}
    function get_kabkota($id_prop){
        $query = $this->db->get_where('kabkota', array('id_propinsi' => $id_prop));
        return $query;
    }
    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('nirim', $q);
	$this->db->or_like('niki', $q);
	$this->db->or_like('nisat', $q);
	$this->db->or_like('nama_koperasi_primer', $q);
	$this->db->or_like('nama_depan', $q);
	$this->db->or_like('nama_belakang', $q);
	$this->db->or_like('kode_propinsi', $q);
	$this->db->or_like('kode_kabupaten_kota', $q);
	$this->db->or_like('no_hp_wa', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('nirim', $q);
	$this->db->or_like('niki', $q);
	$this->db->or_like('nisat', $q);
	$this->db->or_like('nama_koperasi_primer', $q);
	$this->db->or_like('nama_depan', $q);
	$this->db->or_like('nama_belakang', $q);
	$this->db->or_like('kode_propinsi', $q);
	$this->db->or_like('kode_kabupaten_kota', $q);
	$this->db->or_like('no_hp_wa', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    // get data with limit and search
    function get_limit_data2($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('nirim', $q);
	$this->db->or_like('niki', $q);
	$this->db->or_like('nisat', $q);
	$this->db->or_like('nama_koperasi_primer', $q);
	$this->db->or_like('nama_depan', $q);
	$this->db->or_like('nama_belakang', $q);
	$this->db->or_like('kode_propinsi', $q);
	$this->db->or_like('kode_kabupaten_kota', $q);
	$this->db->or_like('no_hp_wa', $q);
	$this->db->limit($limit, $start);
        //return $this->db->get($this->table)->result();
        //return $this->db->get('vw_primer')->result();
        return $this->db->query("select `arnevaco_register`.`koperasi_primer`.`niki` AS `niki`,`arnevaco_register`.`koperasi_primer`.`nisat` AS `nisat`,`arnevaco_register`.`koperasi_primer`.`nirim` AS `nirim`,`arnevaco_register`.`koperasi_primer`.`nama_koperasi_primer` AS `nama_koperasi_primer`,`arnevaco_register`.`koperasi_primer`.`nama_depan` AS `nama_depan`,`arnevaco_register`.`koperasi_primer`.`nama_belakang` AS `nama_belakang`,`arnevaco_register`.`koperasi_primer`.`kode_propinsi` AS `kode_propinsi`,`arnevaco_register`.`koperasi_primer`.`kode_kabupaten_kota` AS `kode_kabupaten_kota`,`arnevaco_register`.`koperasi_primer`.`no_hp_wa` AS `no_hp_wa`,`arnevaco_register`.`koperasi_pusat`.`nisat` AS `nisats`,`arnevaco_register`.`koperasi_induk`.`niki` AS `nikis`,`arnevaco_register`.`koperasi_induk`.`nama_koperasi_induk` AS `nama_koperasi_induk`,`arnevaco_register`.`provinsi`.`nama_prop` AS `nama_prop`,`arnevaco_register`.`kabkota`.`nama_kabkota` AS `nama_kabkota` from ((((`arnevaco_register`.`koperasi_primer` join `arnevaco_register`.`koperasi_pusat`) join `arnevaco_register`.`koperasi_induk`) join `arnevaco_register`.`provinsi`) join `arnevaco_register`.`kabkota`) where `arnevaco_register`.`koperasi_induk`.`niki` = `arnevaco_register`.`koperasi_primer`.`niki` and `arnevaco_register`.`koperasi_pusat`.`nisat` = `arnevaco_register`.`koperasi_primer`.`nisat` and `arnevaco_register`.`provinsi`.`id_propinsi` = `arnevaco_register`.`koperasi_primer`.`kode_propinsi` and `arnevaco_register`.`kabkota`.`id_kabkota` = `arnevaco_register`.`koperasi_primer`.`kode_kabupaten_kota`;")->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Koperasi_primer_model.php */
/* Location: ./application/models/Koperasi_primer_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-01-17 21:01:03 */
/* http://harviacode.com */