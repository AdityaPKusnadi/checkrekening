<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends MX_Controller {
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$this->page->template('login_tpl');
		$this->page->view();
	}
	
	public function login(){
		$username = $this->input->post('username');
		$pass 	  = $this->input->post('password');

		$query = $this->db->query("SELECT * FROM tbl_admin where (username = '".$username."' OR email = '".$username."') AND password = MD5('".$pass."') AND deleted = 0");
		if ($query->num_rows() == 1) {

			foreach ($query->result_array() as $row) {
				$data = array(
					'admin_id' => $row['admin_id']
				);

				$this->db->insert('log_login_admin', $data);
			}
			
			if (isset($_POST["remember"])) {
				setcookie ("admin_loginbl",$username,time() + (60 * 60 * 24 * 5), '/');
			} else {
				if(isset($_COOKIE["admin_loginbl"])) {
					setcookie('admin_loginbl', '', 0, '/');
				}
			}

			$admin = $query->row();
			
			$this->session->set_userdata('admin', $admin);
			redirect(site_url('/dashboard'));

		} else {
			$this->session->set_flashdata('status', 'failed');
			redirect(base_url());	
		}
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
	
}

/* End of file site.php */
/* Location: .bigjill/admin_bl/application/controllers/site.php */