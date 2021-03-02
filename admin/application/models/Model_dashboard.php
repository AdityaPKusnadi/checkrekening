<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_dashboard extends CI_Model {
    /*
	public	$propose   	  = '';
	public	$unpaid   	  = '';
	*/
	public function get_notice(){
		// $query = "SELECT DATE_FORMAT(NOW(), '%d-%m-%Y') AS tanggal, (SELECT COUNT(*) FROM tbl_warna WHERE deleted='0' ) AS total_warna, (SELECT COUNT(*) FROM tbl_kategori WHERE deleted='0') AS total_kategori, (SELECT COUNT(*) FROM tbl_barang WHERE deleted='0') AS total_barang";
		// $datasrc=$this->db->query($query);
		// return $datasrc->num_rows() > 0 ? $datasrc->row() : $this;
	}
	
}