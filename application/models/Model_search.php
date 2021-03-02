<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_search extends CI_Model {

	public function viewDetailBarang($id)
	{
		$query = $this->db->query("SELECT a.barang_id,a.nama,a.harga,a.link,a.deskripsi,a.ukuran_id,a.warna_id,c.nama AS kategori,c.ukuran,b.foto_utama AS foto,b.foto_1 AS foto1,b.foto_2 AS foto2,b.foto_3 AS foto3,b.foto_4 AS foto4 FROM tbl_barang a LEFT JOIN tbl_barang_foto b ON a.barang_id = b.barang_id LEFT JOIN tbl_kategori c ON c.kategori_id = a.kategori_id WHERE a.deleted=0 AND a.barang_id='".$id."'");
		$data = $query->result();
		return $data;
	}

	public function viewUkuranBarang($id)
	{
		$query = $this->db->query("SELECT nama FROM tbl_ukuran WHERE ukuran_id='".$id."' and deleted=0");
		$data = $query->result();
		return $data;
	}

	public function viewWarnaBarang($id)
	{
		$query = $this->db->query("SELECT nama FROM tbl_warna WHERE warna_id='".$id."' and deleted=0");
		$data = $query->result();
		return $data;
	}
//disini
	public function listKategoriById($id){
		$query = $this->db->query("SELECT nama, kategori_id FROM tbl_kategori WHERE kategori_id=$id AND deleted=0 ORDER BY nama ASC");
		//var_dump("SELECT nama, kategori_id FROM tbl_kategori WHERE kategori_id=$id AND deleted=0 ORDER BY nama ASC LIMIT $start,$limit");die;
		$data = $query->result();
		return $data;
	}

	public function listAllKategori($limit, $start,$id){
		$query = $this->db->query("SELECT a.barang_id, a.nama, a.harga, b.foto_utama FROM tbl_barang a LEFT JOIN tbl_barang_foto b ON a.barang_id = b.barang_id WHERE a.kategori_id=$id AND a.deleted=0 ORDER BY a.nama ASC  LIMIT $start,$limit");
		$data = $query->result();
		return $data;
	}

	public function listBarangByNama($nama)
	{
		$query = $this->db->query("SELECT a.barang_id, a.nama, a.harga, b.foto_utama FROM tbl_barang a LEFT JOIN tbl_barang_foto b ON a.barang_id = b.barang_id WHERE a.nama LIKE '%$nama%' AND a.deleted=0 ORDER BY a.nama ASC ");
		$data = $query->result();
		return $data;
	}

	public function recommendedItem($data) {
		$search = $this->db->query("SELECT kategori_id FROM tbl_barang WHERE barang_id='$data' ")->row();

		$result = $this->db->query("SELECT a.*,b.foto_utama,b.foto_1,b.foto_2,b.foto_3,b.foto_4 FROM tbl_barang a LEFT JOIN tbl_barang_foto b ON (a.barang_id=b.barang_id) WHERE a.kategori_id = '$search->kategori_id'  ORDER BY RAND() ASC LIMIT 3")->result();

		return $result;
	}

	public function listBarangByNamasearch($limit, $start,$search)
	{
		// var_dump($limit,$start);die;
		$query = $this->db->query("SELECT a.barang_id, a.nama, a.harga, b.foto_utama FROM tbl_barang a LEFT JOIN tbl_barang_foto b ON a.barang_id = b.barang_id WHERE a.nama LIKE '%$search%' AND a.deleted=0 ORDER BY a.nama ASC LIMIT $start,$limit ");
		$data = $query->result();
		return $data;
		
	}
	
}