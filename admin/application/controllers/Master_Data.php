<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_Data extends MX_Controller {
	
	public function __construct(){
		parent::__construct();
		
		$this->page->use_directory();
		$this->load->helper(array('form', 'url'));
		$this->load->model('model_master');
	}

	public function index(){		
        // 
	}

	public function bank(){
		$data['daftar'] = $this->model_master->listAllBank();
		$this->page->view('master_data/bankIndex',$data);
	}

	public function listKonfirmasi(){
		$data['daftar'] = $this->model_master->listAllKonfirmasi();
		$this->page->view('master_data/konfirmasiIndex',$data);
	}

	public function listRekening(){
		$data['daftar'] = $this->model_master->listAllRekening();
		$this->page->view('master_data/rekeningIndex',$data);
	}

	public function ukuran(){
		$data['daftar'] = $this->model_master->listAllUkuran();
		$this->page->view('master_data/ukuranIndex',$data);
	}

	public function warna(){
		$data['daftar'] = $this->model_master->listAllwarna();
		$this->page->view('master_data/warnaIndex',$data);
	}

	public function kategori(){
		$data['daftar'] = $this->model_master->listAllkategori();
		$this->page->view('master_data/kategoriIndex',$data);
	}

	public function barang(){
		$data['daftar'] = $this->model_master->listAllbarang();
		$this->page->view('master_data/barangIndex',$data);
	}

	public function user(){
		$data['daftar'] = $this->model_master->listAlluser();
		$this->page->view('master_data/userIndex',$data);
	}

	public function wa(){
		$data['daftar'] = $this->model_master->listAllwa();
		$this->page->view('master_data/waIndex',$data);
	}

	public function lokasi(){
		$data['daftar'] = $this->model_master->listAlllokasi();
		$this->page->view('master_data/lokasiIndex',$data);
	}
	// 
	public function rekeningForm(){
		$data['listBank'] = $this->model_master->listAllBank();
		$this->page->view('master_data/add/rekeningForm',$data);
	}
	public function bankForm(){
		$this->page->view('master_data/add/bankForm');
	}

	public function ukuranForm(){
		$this->page->view('master_data/add/ukuranForm');
	}
	public function warnaForm(){
		$this->page->view('master_data/add/warnaForm');
	}
	public function kategoriForm(){
		$this->page->view('master_data/add/kategoriForm');
	}

	public function barangForm(){
		// ukuran
		$data['listUkuran'] = $this->model_master->listAllUkuran();
		// warna
		$data['listWarna'] = $this->model_master->listAllwarna();
		// kategori
		$data['listKategori'] = $this->model_master->listAllkategori();

		$this->page->view('master_data/add/barangForm',$data);
	}

	public function userForm(){
		$this->page->view('master_data/add/userForm');
	}

	public function lokasiForm(){
		$this->page->view('master_data/add/lokasiForm');
	}

	public function waForm(){
		$this->page->view('master_data/add/waForm');
	}

    //
	
	public function editRekeningForm($id){
		$data['bank'] = $this->model_master->listAllBank();
		$data['detail'] = $this->model_master->listRekeningById($id);
		// var_dump($data["detail"]);die;
		$this->page->view('master_data/edit/rekeningForm',$data);
	}

	public function editUkuranForm($id)
	{
		$data['detail'] = $this->model_master->listUkuranById($id);
		$this->page->view('master_data/edit/ukuranForm',$data);
	}

	public function editBank($id){
		$data['detail'] = $this->model_master->listBankById($id);
		$this->page->view('master_data/edit/bankForm',$data);
	}

	public function editWarnaForm($id)
	{
		$data['detail'] = $this->model_master->listWarnaById($id);
		$this->page->view('master_data/edit/warnaForm',$data);
	}

	public function editKategoriForm($id)
	{
		$data['detail'] = $this->model_master->listKategoriById($id);
		$this->page->view('master_data/edit/kategoriForm',$data);
	}

	public function editBarangForm($id)
	{
		$data['detail'] = $this->model_master->listBarangById($id);
		// var_dump($data);die;
		// ukuran
		$data['listUkuran'] = $this->model_master->listAllUkuran();
		// warna
		$data['listWarna'] = $this->model_master->listAllwarna();
		// kategori
		$data['listKategori'] = $this->model_master->listAllKategori();
		$this->page->view('master_data/edit/barangForm',$data);
	}

	public function editUserForm($id)
	{
		$data['detail'] = $this->model_master->listUserById($id);
		$this->page->view('master_data/edit/userForm',$data);
	}

	public function editLokasiForm($id)
	{
		$data['detail'] = $this->model_master->listLokasiById($id);
		$this->page->view('master_data/edit/lokasiForm',$data);
	}

	public function editWAForm($id)
	{
		$data['detail'] = $this->model_master->listWAById($id);
		$this->page->view('master_data/edit/waForm',$data);
	}

	// 
	
	public function addBank(){
		// insert ke table barang
		date_default_timezone_set('Asia/Jakarta');
		$data['norek'] = $_POST['norek'];
		$data['bank'] = $_POST['bank'];
		$data['atas_nama'] = $_POST['atas_nama'];
		$data['status'] = $_POST['status'];
		$data['kronologi'] = $_POST['kronologi'];
		$data['create_by'] = $this->session->admin->admin_id;
		$data['now'] = date('Y-m-d H:m:s');
		
		// insert ke table barang foto
		// var_dump($data);die;
		$gambar['utama'] = $this->_uploadUtama('imagesUtama');
		$gambar['foto_1'] = $this->_uploadUtama('images1');
		$gambar['foto_2'] = $this->_uploadUtama('images2');
		// var_dump($_FILES['imagesUtama']);die;
		$result_master = $this->model_master->insertRekening($data);
		$gambar['rekening_id'] = $result_master;
		$result_foto = $this->model_master->fotoRekening($gambar);

		// var_dump($result_foto);die;

		if($result_foto){
			$this->session->set_flashdata('insertRekening', 'berhasil');
			redirect(site_url('Master_Data/rekeningForm'));	
		}else{
			$this->session->set_flashdata('insertRekening', 'failed');
			redirect(site_url('Master_Data/rekeningForm'));	
		}
	}

	public function addUkuran(){
		date_default_timezone_set('Asia/Jakarta');
		$data['nama'] = $_POST['nama'];
		$data['singkatan'] = $_POST['singkatan'];
		$data['create_by'] = $this->session->admin->admin_id;
		$data['now'] = date('Y-m-d H:m:s');

		$error = array();
		$row = $this->model_master->validasiInsertUkuran($data, 'nama');
		if ($row == '1') {
			array_push($error, 'nama');
		}

		$row = $this->model_master->validasiInsertUkuran($data, 'singkatan');
		if ($row == '1') {
			array_push($error, 'singkatan');
		}

		if (count($error)==0) {
			$res = $this->model_master->insertUkuran($data);

			if($res){
				$this->session->set_flashdata('insertBank', 'berhasil');
				redirect(site_url('Master_Data/bankForm'));	
			}else{
				$this->session->set_flashdata('insertBank', 'failed');
				redirect(site_url('Master_Data/bankForm'));	
			}
		} else {
			$this->session->set_flashdata('insertUkuran', $error);
			redirect(site_url('Master_Data/bank'));	
		}
	}

	public function addWarna(){
		date_default_timezone_set('Asia/Jakarta');
		$data['nama'] = trim($_POST['nama']);
		$data['create_by'] = $this->session->admin->admin_id;
		$data['now'] = date('Y-m-d H:m:s');

		$error = array();
		$row = $this->model_master->validasiInsertWarna($data);
		if ($row == '1') {
			array_push($error, 'nama');
		}

		if (count($error)==0) {
			$res = $this->model_master->insertWarna($data);

			if($res){
				$this->session->set_flashdata('insertWarna', 'berhasil');
				redirect(site_url('Master_Data/warnaForm'));	
			}else{
				$this->session->set_flashdata('insertWarna', 'failed');
				redirect(site_url('Master_Data/warnaForm'));	
			}
		} else {
			$this->session->set_flashdata('insertWarna', $error);
			redirect(site_url('Master_Data/warnaForm'));	
		}
	}

	public function addKategori(){
		date_default_timezone_set('Asia/Jakarta');
		$data['nama'] = $_POST['nama'];
		$data['opsi'] = $_POST['opsiUkuran'];
		$data['create_by'] = $this->session->admin->admin_id;
		$data['now'] = date('Y-m-d H:m:s');

		$error = array();
		$row = $this->model_master->validasiInsertKategori($data);
		if ($row == '1') {
			array_push($error, 'nama');
		}

		if (count($error)==0) {
			$res = $this->model_master->insertKategori($data);

			if($res){
				$this->session->set_flashdata('insertKategori', 'berhasil');
				redirect(site_url('Master_Data/kategoriForm'));	
			}else{
				$this->session->set_flashdata('insertKategori', 'failed');
				redirect(site_url('Master_Data/kategoriForm'));	
			}
		} else {
			$this->session->set_flashdata('insertKategori', $error);
			redirect(site_url('Master_Data/kategoriForm'));	
		}
	}

	public function addUser(){
		date_default_timezone_set('Asia/Jakarta');
		$data['nama'] = $_POST['nama'];
		$data['username'] = $_POST['username'];
		$data['email'] = $_POST['email'];
		$data['display_email'] = $_POST['opsiEmail'];
		$data['password'] = md5($_POST['password']);
		$data['kpass'] = md5($_POST['kpass']);
		$data['keterangan'] = $_POST['keterangan'];
		$data['create_by'] = $this->session->admin->admin_id;
		$data['now'] = date('Y-m-d H:m:s');

		$error = array();
		$row = $this->model_master->validasiInsertUser($data, 'username');
		if ($row == '1') {
			array_push($error, 'username');
		}

		$row = $this->model_master->validasiInsertUser($data, 'email');
		if ($row == '1') {
			array_push($error, 'email');
		}

		if (count($error)==0) {
			$res = $this->model_master->insertUser($data);

			if($res){
				$this->session->set_flashdata('insertUser', 'berhasil');
				redirect(site_url('Master_Data/userForm'));	
			}else{
				$this->session->set_flashdata('insertUser', 'failed');
				redirect(site_url('Master_Data/userForm'));	
			}
		} else {
			$this->session->set_flashdata('insertUser', $error);
			redirect(site_url('Master_Data/userForm'));	
		}
	}

	public function addBarang()
	{
		// insert ke table barang
		date_default_timezone_set('Asia/Jakarta');
		$data['nama'] = $_POST['nama'];
		$data['harga'] = $_POST['harga'];
		$data['kategori_id'] = $_POST['kategoriop'];
		$data['ukuran_id'] = $_POST['hiddenUkuran'];
		$data['warna_id'] = $_POST['hiddenWarna'];
		$data['link'] = $_POST['link'];
		$data['deskripsi'] = $_POST['deskripsi'];
		$data['create_by'] = $this->session->admin->admin_id;
		$data['now'] = date('Y-m-d H:m:s');
		
		// insert ke table barang foto
		$gambar['utama'] = $this->_uploadUtama('imagesUtama');
		$gambar['foto_1'] = $this->_uploadUtama('images1');
		$gambar['foto_2'] = $this->_uploadUtama('images2');
		$gambar['foto_3'] = $this->_uploadUtama('images3');
		$gambar['foto_4'] = $this->_uploadUtama('images4');
		// var_dump($gambar);die;
		$result_master = $this->model_master->insertBarang($data);
		$gambar['barang_id'] = $result_master;
		$result_foto = $this->model_master->fotoBarang($gambar);

		// var_dump($gambar);

		if($result_foto){
			$this->session->set_flashdata('insertBarang', 'berhasil');
			redirect(site_url('Master_Data/barangForm'));	
		}else{
			$this->session->set_flashdata('insertBarang', 'failed');
			redirect(site_url('Master_Data/barangForm'));	
		}
	}

	public	function editBarang(){
		// insert ke table barang
		date_default_timezone_set('Asia/Jakarta');
		$id = $_POST['idbarang'];
		$data['barang_id']=$_POST['idbarang'];
		$data['nama'] = $_POST['nama'];
		$data['harga'] = $_POST['harga'];
		$data['kategori_id'] = $_POST['kategoriop'];
		$data['ukuran_id'] = $_POST['hiddenUkuran'];
		$data['warna_id'] = $_POST['hiddenWarna'];
		$data['link'] = $_POST['link'];
		$data['deskripsi'] = $_POST['deskripsi'];
		$data['create_by'] = $this->session->admin->admin_id;
		$data['now'] = date('Y-m-d H:m:s');
		// var_dump($_POST['hidden_utama'],$_FILES['imagesUtama']['name']);die;
		if($_FILES['imagesUtama']['name']!==""){
			unlink('./assets/img/barang/'.$_POST['hidden_utama']);
		// var_dump($test);die;
			$gambar['utama'] = $this->_uploadUtama('imagesUtama');
		}else{
			$gambar['utama'] = $_POST['hidden_utama'];
		}
		if( $_FILES['images1']['name']!==""){

			unlink('./assets/img/barang/'.$_POST['hidden_foto1']);
			$gambar['foto_1'] = $this->_uploadUtama('images1');
		}else{
			$gambar['foto_1']= $_POST['hidden_foto1'];
		}
		if( $_FILES['images2']['name']!==""){
			unlink('./assets/img/barang/'.$_POST['hidden_foto2']);
			$gambar['foto_2'] = $this->_uploadUtama('images2');
		}else{
			$gambar['foto_2']= $_POST['hidden_foto2'];
		}
		if( $_FILES['images3']['name']!==""){
			unlink('./assets/img/barang/'.$_POST['hidden_foto3']);
			$gambar['foto_3'] = $this->_uploadUtama('images3');
		}else{
			$gambar['foto_3']= $_POST['hidden_foto3'];
		}
		if( $_FILES['images4']['name']!==""){
			unlink('./assets/img/barang/'.$_POST['hidden_foto4']);
			$gambar['foto_4'] = $this->_uploadUtama('images4');
		}else{
			$gambar['foto_4']= $_POST['hidden_foto4'];
		}
		$gambar['barang_id'] = $_POST['idbarang'];
		// var_dump($gambar);die;
		// var_dump($data);
		// var_dump($gambar);die;

		$result_master = $this->model_master->UpdateBarang($data);
		// var_dump($result_master);die;
		
		$result_foto = $this->model_master->UpdatefotoBarang($gambar);

		// delete directory foto barangnya
		if($_POST['delete_utama'] !== ''){
			unlink('./assets/img/barang'.$_POST['delete_utama']);
		}

		if($_POST['delete_foto1'] !== ''){
				unlink('./assets/img/barang'.$_POST['delete_foto1']);
		}

		if($_POST['delete_foto2'] !== ''){
				unlink('./assets/img/barang'.$_POST['delete_foto2']);
		}

		if($_POST['delete_foto3'] !== ''){
				unlink('./assets/img/barang'.$_POST['delete_foto3']);
		}

		if($_POST['delete_foto4'] !== ''){
				unlink('./assets/img/barang'.$_POST['delete_foto4']);
		}

		if($result_foto){
			$this->session->set_flashdata('updateBarang', 'berhasil');
			redirect(site_url('Master_Data/editBarangForm/'.$id));	
		}else{
			$this->session->set_flashdata('updateBarang', 'failed');
			redirect(site_url('Master_Data/editBarangForm/'.$id));	
		}
	}

	// 
	public	function editRekening(){
		// insert ke table barang
		date_default_timezone_set('Asia/Jakarta');
		$id = $_POST['rekening_id'];
		$data['rekening_id'] = $_POST['rekening_id'];
		$data['norek']=$_POST['norek'];
		$data['bank'] = $_POST['bank'];
		$data['atas_nama'] = $_POST['atas_nama'];
		$data['status'] = $_POST['status'];
		$data['kronologi'] = $_POST['kronologi'];
		$data['create_by'] = $this->session->admin->admin_id;
		$data['now'] = date('Y-m-d H:m:s');

		if($_FILES['imagesUtama']['name']!==""){
			unlink('./assets/img/barang/'.$_POST['hidden_utama']);
			$gambar['utama'] = $this->_uploadUtama('imagesUtama');
		}else{
			$gambar['utama'] = $_POST['hidden_utama'];
		}
		if( $_FILES['images1']['name']!==""){

			unlink('./assets/img/barang/'.$_POST['hidden_foto1']);
			$gambar['foto_1'] = $this->_uploadUtama('images1');
		}else{
			$gambar['foto_1']= $_POST['hidden_foto1'];
		}
		if( $_FILES['images2']['name']!==""){
			unlink('./assets/img/barang/'.$_POST['hidden_foto2']);
			$gambar['foto_2'] = $this->_uploadUtama('images2');
		}else{
			$gambar['foto_2']= $_POST['hidden_foto2'];
		}
		$gambar['rekening_id'] = $_POST['rekening_id'];
		// var_dump($gambar);die;
		// var_dump($data);
		// var_dump($gambar);die;

		$result_master = $this->model_master->UpdateRekening($data);
		// var_dump($result_master);die;
		
		$result_foto = $this->model_master->UpdateRekeningFoto($gambar);

		// delete directory foto barangnya
		if($_POST['delete_utama'] !== ''){
			unlink('./assets/img/barang'.$_POST['delete_utama']);
		}

		if($_POST['delete_foto1'] !== ''){
				unlink('./assets/img/barang'.$_POST['delete_foto1']);
		}

		if($_POST['delete_foto2'] !== ''){
				unlink('./assets/img/barang'.$_POST['delete_foto2']);
		}

		if($result_foto){
			$this->session->set_flashdata('updateRekening', 'berhasil');
			redirect(site_url('Master_Data/editRekeningForm/'.$id));	
		}else{
			$this->session->set_flashdata('updateRekening', 'failed');
			redirect(site_url('Master_Data/editRekeningForm/'.$id));	
		}
	}
	//

	// for upload file

	private function _uploadUtama($imageId)
	{
		$config['upload_path']          = './assets/img/barang/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['overwrite']			= true;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload($imageId))
		{
			$pesan = '';
			if($_FILES[$imageId]['error']== 4 && $imageId=='images1'){
				return false;
			}else if($_FILES[$imageId]['error']== 4 && $imageId=='images2'){
				return false;		
			}else{
				// if($_FILES[$imageId]['size'] >1024){
				// 	$pesan = 'Ukuran Harus Kurang Dari / = dari 1 mb';
				// }else if ($_FILES[$imageId]['error']==4 ){
				// 	$pesan = 'Gambar Utama Wajib Di upload';
				// }
				// $this->session->error = $pesan;
				// return $error;
				// $this->session->set_flashdata('insertBarang', 'failedfoto');
				// redirect(site_url('Master_Data/rekeningForm'));
				// var_dump($imageId);
				// die;
				return false;		
			}
		}
		else
		{
			return $this->upload->data("file_name");
		}
		
		return $this->upload->data("file_name");
	}

	public function addLokasi(){
		date_default_timezone_set('Asia/Jakarta');
		$data['nama'] = trim($_POST['nama']);
		$data['url'] = trim($_POST['url']);
		$data['create_by'] = $this->session->admin->admin_id;
		$data['now'] = date('Y-m-d H:m:s');

		$error = array();
		$row = $this->model_master->validasiInsertLokasi($data);
		if ($row == '1') {
			array_push($error, 'nama');
		}

		if (count($error)==0) {
			$res = $this->model_master->insertLokasi($data);

			if($res){
				$this->session->set_flashdata('insertLokasi', 'berhasil');
				redirect(site_url('Master_Data/lokasiForm'));	
			}else{
				$this->session->set_flashdata('insertLokasi', 'failed');
				redirect(site_url('Master_Data/lokasiForm'));	
			}
		} else {
			$this->session->set_flashdata('insertLokasi', $error);
			redirect(site_url('Master_Data/lokasiForm'));	
		}
	}

	public function addWA(){
		date_default_timezone_set('Asia/Jakarta');
		$data['nomor'] = trim($_POST['nomor']);
		$data['pesan'] = trim($_POST['pesan']);
		$data['create_by'] = $this->session->admin->admin_id;
		$data['now'] = date('Y-m-d H:m:s');

		$error = array();
		$row = $this->model_master->validasiInsertWA($data);
		if ($row == '1') {
			array_push($error, 'nomor');
		}

		if (count($error)==0) {
			$res = $this->model_master->insertWA($data);

			if($res){
				$this->session->set_flashdata('insertWA', 'berhasil');
				redirect(site_url('Master_Data/waForm'));	
			}else{
				$this->session->set_flashdata('insertWA', 'failed');
				redirect(site_url('Master_Data/waForm'));	
			}
		} else {
			$this->session->set_flashdata('insertWA', $error);
			redirect(site_url('Master_Data/waForm'));	
		}
	}

    // 

	public function editUkuran(){
		// if(!isset($_POST['bank_id'])){
		// 	$this->session->set_flashdata('updateUkuran', 'failed');
		// 	redirect(site_url('Master_Data/editBank/'.$_POST['editBank']));
		// }

		date_default_timezone_set('Asia/Jakarta');
		$data['bank_id'] = $_POST['bank_id'];
		$data['nama'] = $_POST['nama'];
		$data['singkatan'] = $_POST['singkatan'];
		$data['create_by'] = $this->session->admin->admin_id;
		$data['now'] = date('Y-m-d H:m:s');

		// $error = array();
		// $row = $this->model_master->validasiUpdateUkuran($data, 'nama');
		// if ($row == '1') {
		// 	array_push($error, 'nama');
		// }

		// $row = $this->model_master->validasiUpdateUkuran($data, 'singkatan');
		// if ($row == '1') {
		// 	array_push($error, 'singkatan');
		// }

		// if (count($error)==0) {
		$res = $this->model_master->updateUkuran($data);

			if($res){
				$this->session->set_flashdata('insertBank', 'berhasil');
				redirect(site_url('Master_Data/editBank/'.$id));		
			}else{
				$this->session->set_flashdata('insertBank', 'failed');
				redirect(site_url('Master_Data/editBank/'.$id));	
			}
		// } else {
		// 	$this->session->set_flashdata('updateUkuran', $error);
		// 	redirect(site_url('Master_Data/editUkuranForm/'.$id));	
		// }
	}

	public function editWarna(){
		if(!isset($_POST['warna_id'])){
			$this->session->set_flashdata('updateWarna', 'failed');
			redirect(site_url('Master_Data/editWarnaForm/'.$_POST['ukuran_id']));
		}

		date_default_timezone_set('Asia/Jakarta');
		$id = $_POST['warna_id'];
		$data['warna_id'] = $id;
		$data['nama'] = $_POST['nama'];
		$data['create_by'] = $this->session->admin->admin_id;
		$data['now'] = date('Y-m-d H:m:s');

		$error = array();
		$row = $this->model_master->validasiUpdateWarna($data);
		if ($row == '1') {
			array_push($error, 'nama');
		}

		if (count($error)==0) {
			$res = $this->model_master->updateWarna($data);

			if($res){
				$this->session->set_flashdata('updateWarna', 'berhasil');
				redirect(site_url('Master_Data/editWarnaForm/'.$id));	
			}else{
				$this->session->set_flashdata('updateWarna', 'failed');
				redirect(site_url('Master_Data/editWarnaForm/'.$id));	
			}
		} else {
			$this->session->set_flashdata('updateWarna', $error);
			redirect(site_url('Master_Data/editWarnaForm/'.$id));	
		}
	}

	public function editKategori(){
		if(!isset($_POST['kategori_id'])){
			$this->session->set_flashdata('updateKategori', 'failed');
			redirect(site_url('Master_Data/editUserForm/'.$_POST['ukuran_id']));
		}

		date_default_timezone_set('Asia/Jakarta');
		$id = $_POST['kategori_id'];
		$data['kategori_id'] = $id;
		$data['nama'] = $_POST['nama'];
		$data['opsi'] = $_POST['opsiUkuran'];
		$data['create_by'] = $this->session->admin->admin_id;
		$data['now'] = date('Y-m-d H:m:s');

		$error = array();
		$row = $this->model_master->validasiUpdateKategori($data);
		if ($row == '1') {
			array_push($error, 'nama');
		}

		if (count($error)==0) {
			$res = $this->model_master->updateKategori($data);

			if($res){
				$this->session->set_flashdata('updateKategori', 'berhasil');
				redirect(site_url('Master_Data/editKategoriForm/'.$id));	
			}else{
				$this->session->set_flashdata('updateKategori', 'failed');
				redirect(site_url('Master_Data/editKategoriForm/'.$id));	
			}
		} else {
			$this->session->set_flashdata('updateKategori', $error);
			redirect(site_url('Master_Data/editKategoriForm/'.$id));	
		}
	}

	public function editUser(){
		if(!isset($_POST['admin_id'])){
			$this->session->set_flashdata('updateUser', 'failed');
			redirect(site_url('Master_Data/editUserForm/'.$_POST['admin_id']));
		}

		date_default_timezone_set('Asia/Jakarta');
		$id = $_POST['admin_id'];
		$data['admin_id'] = $id;
		$data['nama'] = trim($_POST['nama']);
		$data['username'] = trim($_POST['username']);
		$data['email'] = trim($_POST['email']);
		$data['display_email'] = trim($_POST['opsiEmail']);
		$pass = trim($_POST['password']);
		if ($pass==null || $pass=='') {
			$data['password'] = '';
			$data['kpass'] = '';
		} else {
			$data['password'] = md5($pass);
			$data['kpass'] = md5(trim($_POST['kpass']));
		}
		$data['keterangan'] = trim($_POST['keterangan']);
		$data['create_by'] = $this->session->admin->admin_id;
		$data['now'] = date('Y-m-d H:m:s');

		$error = array();
		$row = $this->model_master->validasiUpdateUser($data, 'username');
		if ($row == '1') {
			array_push($error, 'username');
		}

		$row = $this->model_master->validasiUpdateUser($data, 'email');
		if ($row == '1') {
			array_push($error, 'email');
		}

		if (count($error)==0) {
			$res = $this->model_master->updateUser($data);

			if($res){
				$this->session->set_flashdata('updateUser', 'berhasil');
				redirect(site_url('Master_Data/editUserForm/'.$id));	
			}else{
				$this->session->set_flashdata('updateUser', 'failed');
				redirect(site_url('Master_Data/editUserForm/'.$id));	
			}
		} else {
			$this->session->set_flashdata('updateUser', $error);
			redirect(site_url('Master_Data/editUserForm/'.$id));	
		}
	}

	public function editLokasi(){
		if(!isset($_POST['lokasi_id'])){
			$this->session->set_flashdata('updateLokasi', 'failed');
			redirect(site_url('Master_Data/editLokasiForm/'.$_POST['lokasi_id']));
		}

		date_default_timezone_set('Asia/Jakarta');
		$id = $_POST['lokasi_id'];
		$data['lokasi_id'] = $id;
		$data['nama'] = trim($_POST['nama']);
		$data['url'] = trim($_POST['url']);
		$data['create_by'] = $this->session->admin->admin_id;
		$data['now'] = date('Y-m-d H:m:s');

		$error = array();
		$row = $this->model_master->validasiUpdateLokasi($data);
		if ($row == '1') {
			array_push($error, 'nama');
		}

		if (count($error)==0) {
			$res = $this->model_master->updateLokasi($data);

			if($res){
				$this->session->set_flashdata('updateLokasi', 'berhasil');
				redirect(site_url('Master_Data/editLokasiForm/'.$id));	
			}else{
				$this->session->set_flashdata('updateLokasi', 'failed');
				redirect(site_url('Master_Data/editLokasiForm/'.$id));	
			}
		} else {
			$this->session->set_flashdata('updateLokasi', $error);
			redirect(site_url('Master_Data/editLokasiForm/'.$id));	
		}
	}

	public function editWA(){
		if(!isset($_POST['wa_id'])){
			$this->session->set_flashdata('updateWA', 'failed');
			redirect(site_url('Master_Data/editWAForm/'.$_POST['wa_id']));
		}

		date_default_timezone_set('Asia/Jakarta');
		$id = $_POST['wa_id'];
		$data['wa_id'] = $id;
		$data['nomor'] = trim($_POST['nomor']);
		$data['pesan'] = trim($_POST['pesan']);
		$data['create_by'] = $this->session->admin->admin_id;
		$data['now'] = date('Y-m-d H:m:s');

		$error = array();
		$row = $this->model_master->validasiUpdateWA($data);
		if ($row == '1') {
			array_push($error, 'nomor');
		}

		if (count($error)==0) {
			$res = $this->model_master->updateWA($data);

			if($res){
				$this->session->set_flashdata('updateWA', 'berhasil');
				redirect(site_url('Master_Data/editWAForm/'.$id));	
			}else{
				$this->session->set_flashdata('updateWA', 'failed');
				redirect(site_url('Master_Data/editWAForm/'.$id));	
			}
		} else {
			$this->session->set_flashdata('updateWA', $error);
			redirect(site_url('Master_Data/editWAForm/'.$id));	
		}
	}

    //

	public function hapusUkuran($id)
	{
		date_default_timezone_set('Asia/Jakarta');
		$data['update_by'] = $this->session->admin->admin_id;
		$data['now'] = date('Y-m-d H:m:s');

		$where = array('ukuran_id' => $id);
		$res = $this->model_master->deleteData($where, 'tbl_ukuran', $data);

		if($res){
			$this->session->set_flashdata('deleteUkuran', 'berhasil');
			redirect(site_url('Master_Data/ukuran')); 
		}else{
			$this->session->set_flashdata('deleteUkuran', 'failed');
			redirect(site_url('Master_Data/ukuran')); 
		}
	}

	public function hapusWarna($id)
	{
		date_default_timezone_set('Asia/Jakarta');
		$data['update_by'] = $this->session->admin->admin_id;
		$data['now'] = date('Y-m-d H:m:s');

		$where = array('warna_id' => $id);
		$res = $this->model_master->deleteData($where, 'tbl_warna', $data);

		if($res){
			$this->session->set_flashdata('deleteWarna', 'berhasil');
			redirect(site_url('Master_Data/warna')); 
		}else{
			$this->session->set_flashdata('deleteWarna', 'failed');
			redirect(site_url('Master_Data/warna')); 
		}
	}

	public function hapusKategori($id)
	{
		date_default_timezone_set('Asia/Jakarta');
		$data['update_by'] = $this->session->admin->admin_id;
		$data['now'] = date('Y-m-d H:m:s');

		$valid = $this->model_master->checkKategori($id);

		if($valid > 0){
			$this->session->set_flashdata('deleteKategori', 'failed');
			redirect(site_url('Master_Data/kategori')); 
		}else{

			$where = array('kategori_id' => $id);
			$res = $this->model_master->deleteData($where, 'tbl_kategori', $data);
			// var_dump($res);die;
			if($res){
				$this->session->set_flashdata('deleteKategori', 'berhasil');
				redirect(site_url('Master_Data/kategori')); 
			}else{
				$this->session->set_flashdata('deleteKategori', 'failed');
				redirect(site_url('Master_Data/kategori')); 
			}

		}
	}

	public function hapusUser($id)
	{
		date_default_timezone_set('Asia/Jakarta');
		$data['update_by'] = $this->session->admin->admin_id;
		$data['now'] = date('Y-m-d H:m:s');
		$data['delete'] = "1";

		$where = array('admin_id' => $id);
		$res = $this->model_master->deleteData($where, 'tbl_admin', $data);

		if($res){
			$this->session->set_flashdata('deleteUser', 'berhasil');
			redirect(site_url('Master_Data/user')); 
		}else{
			$this->session->set_flashdata('deleteUser', 'failed');
			redirect(site_url('Master_Data/user')); 
		}
	}

	public function hapusRekening($id)
	{
		date_default_timezone_set('Asia/Jakarta');
		$data['update_by'] = $this->session->admin->admin_id;
		$data['now'] = date('Y-m-d H:m:s');
		$data['delete'] = "1";

		$where = array('rekening_id' => $id);
		$res = $this->model_master->deleteData($where, 'tbl_rekening', $data);
		// var_dump($res);die;
		if($res){
			$this->session->set_flashdata('deleteRekening', 'berhasil');
			redirect(site_url('Master_Data/listRekening')); 
		}else{
			$this->session->set_flashdata('deleteRekening', 'failed');
			redirect(site_url('Master_Data/listRekening')); 
		}
	}

	public function terimaRekening($id)
	{
		date_default_timezone_set('Asia/Jakarta');
		$data['update_by'] = $this->session->admin->admin_id;
		$data['now'] = date('Y-m-d H:m:s');
		$data['delete'] = "0";

		$where = array('rekening_id' => $id);
		$res = $this->model_master->deleteData($where, 'tbl_rekening', $data);
		// var_dump($res);die;
		if($res){
			$this->session->set_flashdata('confirmrekening', 'berhasil');
			redirect(site_url('Master_Data/listKonfirmasi')); 
		}else{
			$this->session->set_flashdata('confirmrekening', 'failed');
			redirect(site_url('Master_Data/listKonfirmasi')); 
		}
	}

	public function tolakRekening($id,$value)
	{
		// var_dump($id,$value);
		// die;
		date_default_timezone_set('Asia/Jakarta');
		$data['update_by'] = $this->session->admin->admin_id;
		$data['now'] = date('Y-m-d H:m:s');
		$data['delete'] = "6";
		$data['value'] = urldecode($value);

		$where = array('rekening_id' => $id);
		$res = $this->model_master->deleteData($where, 'tbl_rekening', $data);

		$res2 = $this->model_master->updatePenolakan($value,$id);
		// var_dump($res);die;
		if($res){
			$this->session->set_flashdata('rejectrekening', 'berhasil');
			redirect(site_url('Master_Data/listRekening')); 
		}else{
			$this->session->set_flashdata('rejectrekening', 'failed');
			redirect(site_url('Master_Data/listRekening')); 
		}
	}

	public function hapusLokasi($id)
	{
		date_default_timezone_set('Asia/Jakarta');
		$data['update_by'] = $this->session->admin->admin_id;
		$data['now'] = date('Y-m-d H:m:s');
		$data['delete'] = "1";

		$where = array('lokasi_id' => $id);
		$res = $this->model_master->deleteData($where, 'tbl_lokasi', $data);

		if($res){
			$this->session->set_flashdata('deleteLokasi', 'berhasil');
			redirect(site_url('Master_Data/lokasi')); 
		}else{
			$this->session->set_flashdata('deleteLokasi', 'failed');
			redirect(site_url('Master_Data/lokasi')); 
		}
	}

	public function hapusWA($id)
	{
		date_default_timezone_set('Asia/Jakarta');
		$data['update_by'] = $this->session->admin->admin_id;
		$data['now'] = date('Y-m-d H:m:s');

		$where = array('wa_id' => $id);
		$res = $this->model_master->deleteData($where, 'tbl_wa', $data);

		if($res){
			$this->session->set_flashdata('deleteWA', 'berhasil');
			redirect(site_url('Master_Data/wa')); 
		}else{
			$this->session->set_flashdata('deleteWA', 'failed');
			redirect(site_url('Master_Data/wa')); 
		}
	}

	//

	public function ajaxrekening(){
		$id = $_POST['rekening_id'];
		$res = $this->model_master->viewDetailRekening($id);
		echo json_encode($res);
	}

	public function ajaxbarang()
	{
		$id = $_POST['idbarang'];
		$res = $this->model_master->viewDetailBarang($id);
		echo json_encode($res);
	}

	public function ajaxukuran()
	{
		$ukuran = $_POST['idukuran'];
		$res = $this->model_master->viewUkuranBarang($ukuran);
		echo json_encode($res);
	}

	public function ajaxwarna()
	{
		$warna = $_POST['idwarna'];
		$res = $this->model_master->viewWarnaBarang($warna);
		echo json_encode($res);
	}

	public function ajaxgetukuran()
	{
		$kategori = $_POST['validasiukuran'];
		$res = $this->model_master->viewKategoriBarang($kategori);
		echo json_encode($res);
	}

	public function getListUkuran()
	{
		$data = $this->model_master->listUkuranById($_POST['id']);
		echo json_encode($data);
	}

	public function getListWarna()
	{
		$data = $this->model_master->listWarnaById($_POST['id']);
		echo json_encode($data);
	}

	public function KategoriValidasi_delete(){
		// get data yang ada di tblbarang dulunih
		$id = $_POST['id'];
		$checked = $this->model_master->validasiDeleteKategori($id);

		// kondisi kalau ada atau enggganya
		if ($checked == 0) {
			// boleh didelete
			$this->model_master->deleteKategoriById($id);
			$response['status']  = 'success';
			$response['message'] = 'Product Deleted Successfully ...';
		} else if ($checked > 0) {
			// jangan didelete
			$response['status']  = 'error';
			$response['message'] = 'Item Already Exist On Catalog ...';
		}
		echo json_encode($response);
	}

	public function bank_ValidasiDel(){
		// get data yang ada di tblbarang dulunih
		$id = $_POST['id'];
		$checked = $this->model_master->validasiDeleteBank($id);


		// kondisi kalau ada atau enggganya
		if ($checked == 0) {
			// boleh didelete
			$this->model_master->deleteBankById($id);
			$response['status']  = 'success';
			$response['message'] = 'Bank Dihapus ...';
		} else if ($checked > 0) {
			// jangan didelete
			$response['status']  = 'error';
			$response['message'] = 'Bank Masih digunakan di list rekening ...';
		}
		echo json_encode($response);
	}

	public function WarnaValidasi_delete(){
		// get data yang ada di tblbarang dulunih
		$id = $_POST['id'];
		$checked = $this->model_master->validasiDeleteWarna($id);

		// kondisi kalau ada atau enggganya
		if ($checked == 0) {
			// boleh didelete
			$this->model_master->deleteWarnaById($id);
			$response['status']  = 'success';
			$response['message'] = 'Product Deleted Successfully ...';
		} else if ($checked > 0) {
			// jangan didelete
			$response['status']  = 'error';
			$response['message'] = 'Item Already Exist On Catalog ...';
		}
		echo json_encode($response);
	}
}