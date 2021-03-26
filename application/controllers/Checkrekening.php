<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkrekening extends MX_Controller {
	
	public function __construct(){
		parent::__construct();
		
		$this->page->use_directory();
		$this->load->model('model_checkrekening');
	}
	
	public function index(){	
        $this->load->view('check/index');
	}

	public function check(){
		$no_rek = $_POST['norek'];
		$find= $this->model_checkrekening->searchRek($no_rek);
		if( empty($find)){
			$find='404';
		}
		echo json_encode($find);

	}

	public function lapor(){
		$data_master = null;
        // $data_master = $this->model_checkrekening->listAllRekeningByUser();
		$this->page->view('/templates/content');
	}

	public function daftar(){
		$data['email'] = $_POST['email'];
		$data['username'] = $_POST['username'];
		$data['password'] = md5($_POST['password']);
		$data['konfirmasi'] = md5($_POST['konfirmasi']);
		$data['create_by'] = NULL;
		$data['now'] = date('Y-m-d H:m:s');
		if($_POST['password'] !== $_POST['konfirmasi']){
			$this->session->set_flashdata('status', 'notmatching');
			redirect(site_url('checkrekening/signup'));
		}

		$result = $this->model_checkrekening->insertUser($data);
		var_dump($result);
		if($result){
			$this->session->set_flashdata('status', 'daftarsuccess');
			redirect(site_url('checkrekening/login'));
		}

	}

	public function login(){
		$this->page->template('login_tpl');
		$this->page->view();
	}

	public function loginuser(){
		$username = $this->input->post('username');
		$pass 	  = $this->input->post('password');

		$query = $this->db->query("SELECT * FROM tbl_users where (username = '".$username."' OR email = '".$username."') AND password = MD5('".$pass."') AND deleted = 0");

		// var_dump($query);die;
		if ($query->num_rows() == 1) {

			foreach ($query->result_array() as $row) {
				$data = array(
					'users_id' => $row['users_id']
				);

				// $this->db->insert('log_login_admin', $data);
			}
			
			if (isset($_POST["remember"])) {
				setcookie ("users_loginbl",$username,time() + (60 * 60 * 24 * 5), '/');
			} else {
				if(isset($_COOKIE["users_loginbl"])) {
					setcookie('users_loginbl', '', 0, '/');
				}
			}

			$user = $query->row();
			
			$this->session->set_userdata('user', $user);
			redirect(site_url('/checkrekening/lapor'));

		} else {
			$this->session->set_flashdata('status', 'failed');
			redirect(site_url('/checkrekening/login'));	
		}
	}

	public function signup(){
		$this->page->template('signup');
		$this->page->view();
	}

	public function listRekening($id){
		$data['daftar'] = $this->model_checkrekening->listAllRekeningByUser($id);
		// var_dump($data['daftar']);
		$this->load->view('master_data/rekeningIndex',$data);
	}

	public function rekeningForm(){
		$data['listBank'] = $this->model_checkrekening->listAllBank();
		// var_dump($data);die;
		$this->load->view('master_data/add/rekeningForm',$data);
	}

	public function addRekening(){
		// insert ke table barang
		date_default_timezone_set('Asia/Jakarta');
		$data['norek'] = $_POST['norek'];
		$data['bank'] = $_POST['bank'];
		$data['atas_nama'] = $_POST['atas_nama'];
		$data['status'] = 'user';
		$data['kronologi'] = $_POST['kronologi'];
		$data['create_by'] = $this->session->user->users_id;
		$data['now'] = date('Y-m-d H:m:s');
		
		// insert ke table barang foto
		// var_dump($data);die;
		$gambar['utama'] = $this->_uploadUtama('imagesUtama');
		$gambar['foto_1'] = $this->_uploadUtama('images1');
		$gambar['foto_2'] = $this->_uploadUtama('images2');
		// var_dump($_FILES['imagesUtama']);die;
		$result_master = $this->model_checkrekening->insertRekening($data);
		$gambar['rekening_id'] = $result_master;
		$result_foto = $this->model_checkrekening->fotoRekening($gambar);

		// var_dump($result_foto);die;

		if($result_foto){
			$this->session->set_flashdata('insertRekening', 'berhasil');
			redirect(site_url('checkrekening/rekeningForm'));	
		}else{
			$this->session->set_flashdata('insertRekening', 'failed');
			redirect(site_url('checkrekening/rekeningForm'));	
		}
	}

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

	public function editRekeningForm($id){
		$data['bank'] = $this->model_checkrekening->listAllBank();
		$data['detail'] = $this->model_checkrekening->listRekeningById($id);
		// var_dump($data["detail"]);die;
		$this->load->view('master_data/edit/rekeningForm',$data);
	}

	public	function editRekening(){
		// insert ke table barang
		date_default_timezone_set('Asia/Jakarta');
		$id = $_POST['rekening_id'];
		$data['rekening_id'] = $_POST['rekening_id'];
		$data['norek']=$_POST['norek'];
		$data['bank'] = $_POST['bank'];
		$data['atas_nama'] = $_POST['atas_nama'];
		// $data['status'] = $_POST['status'];
		$data['kronologi'] = $_POST['kronologi'];
		$data['create_by'] = $this->session->user->users_id;
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

		$result_master = $this->model_checkrekening->UpdateRekening($data);
		// var_dump($result_master);die;
		
		$result_foto = $this->model_checkrekening->UpdateRekeningFoto($gambar);

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
			redirect(site_url('checkrekening/editRekeningForm/'.$id));	
		}else{
			$this->session->set_flashdata('updateRekening', 'failed');
			redirect(site_url('checkrekening/editRekeningForm/'.$id));	
		}
	}

	public function hapusRekening($id){
		date_default_timezone_set('Asia/Jakarta');
		$data['update_by'] = $this->session->user->users_id;
		$data['now'] = date('Y-m-d H:m:s');
		$data['delete'] = "1";

		$where = array('rekening_id' => $id);
		$res = $this->model_checkrekening->deleteData($where, 'tbl_rekening', $data);
		// var_dump($res);die;
		if($res){
			$this->session->set_flashdata('deleteRekening', 'berhasil');
			redirect(site_url('checkrekening/listRekening/'.$this->session->user->users_id)); 
		}else{
			$this->session->set_flashdata('deleteRekening', 'failed');
			redirect(site_url('checkrekening/listRekening/'.$this->session->user->users_id)); 
		}
	}

	public function list($nomer_rekening){
		$data['daftar']=$this->model_checkrekening->searchRek($nomer_rekening);
		// var_dump($data);die;
		$this->load->view('check/listdata',$data);
	}

	public function ajaxrekening(){
		$id = $_POST['rekening_id'];
		$res = $this->model_checkrekening->viewDetailRekening($id);
		echo json_encode($res);
	}
	
}

/* End of file dasbor.php */
/* Location: ./application/controllers/dasbor.php */