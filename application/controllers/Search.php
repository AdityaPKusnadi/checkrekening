<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends MX_Controller {
	
	public function __construct(){
		parent::__construct();
		
		$this->page->use_directory();
		$this->load->model('model_search');
		$this->load->model('model_dashboard');
		$this->load->library('pagination');
	}
	
	public function index(){		
		
	}

	public function Kategori($id)
	{
		// var_dump($id);die;
		// $data = $this->model_search->getKategoriById($id);
		
		//konfigurasi pagination
        $config['base_url'] = site_url('search/kategori/'.$id.'/'); //site url
        $this->db->where('deleted',0);
        $this->db->where('kategori_id',$id);
        $this->db->from('tbl_barang');
        $config['total_rows'] = $this->db->count_all_results(); //total row
        $config['per_page'] = 9;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination 
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
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

        $this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $data['pagination'] = $this->pagination->create_links();

		$data['daftar'] = $this->model_search->listKategoriById($id);
		$data['kategori'] = $this->model_dashboard->listAllkategori();
		$data['barang'] = $this->model_search->listAllKategori($config["per_page"], $data['page'],$id);
		$data['wa'] = $this->model_dashboard->listAllWA();
		$data['email'] = $this->model_dashboard->listAllEmail();
		$data['lokasi'] = $this->model_dashboard->listAllLokasi();
		$this->page->template('kategori');
		$this->page->view('templates/kategori',$data);
		

	}
	
	public function Barang($barang)
	{
		// $barang = $_POST['search'];

		//konfigurasi pagination
		$config['base_url'] = site_url('search/barang/'.$barang.'/'); //site url
		// itung count
		$this->db->like('nama',$barang);
		$this->db->from('tbl_barang');

		$config['total_rows'] = $this->db->count_all_results(); //total row
        $config['per_page'] = 9;  //show record per halaman
        $config["uri_segment"] = 4;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination 
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
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

        $this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		// var_dump($data);die;	

        $data['pagination'] = $this->pagination->create_links();

		$data['daftar'] = $this->model_search->listBarangByNamasearch($config["per_page"], $data['page'],$barang);
		// var_dump($data);die;
		$data['barang'] = $barang;
		$data['kategori'] = $this->model_dashboard->listAllkategori();
		$data['wa'] = $this->model_dashboard->listAllWA();
		$data['email'] = $this->model_dashboard->listAllEmail();
		$data['lokasi'] = $this->model_dashboard->listAllLokasi();
		$this->page->template('barang');
		$this->page->view('templates/barang',$data);
	}

	public function Detail($id)
	{	
		if ($id=='ajaxbarang') {
			$id = $_POST['idbarang'];
			$res = $this->model_search->viewDetailBarang($id);
			echo json_encode($res);
		} else if ($id=='ajaxukuran') {
			$ukuran = $_POST['idukuran'];
			$res = $this->model_search->viewUkuranBarang($ukuran);
			echo json_encode($res);
		} else if ($id=='ajaxwarna') {
			$warna = $_POST['idwarna'];
			$res = $this->model_search->viewWarnaBarang($warna);
			echo json_encode($res);
		} else {
			$data['random'] = $this->model_search->recommendedItem($id);
			$data['wa'] = $this->model_dashboard->listAllWA();
			$data['email'] = $this->model_dashboard->listAllEmail();
			$data['lokasi'] = $this->model_dashboard->listAllLokasi();
			$this->page->template('detailBarang');
			$this->page->view('templates/detailBarang',$data);
		}
		
		
	}

}

/* End of file dasbor.php */
/* Location: ./application/controllers/dasbor.php */