<?php 
 
class M_beranda extends CI_Model{	
	function hitdata($table){
        $this->db->select('*');
        $this->db->from($table);		
		return $this->db->count_all_results();
        //return $this->db->get();
	}	
}