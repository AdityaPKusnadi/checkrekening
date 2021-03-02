<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends MX_Controller {
	
	public function __construct(){
		parent::__construct();

		$this->page->use_directory();
		$this->load->model('model_dashboard');
		$this->load->helper(array('form', 'url'));
	}
	
	public function index(){
		$this->page->template('about');
		// $data['wa'] = $this->model_dashboard->listAllWA();
		$data['email'] = $this->model_dashboard->listAllEmail();
		$data['lokasi'] = $this->model_dashboard->listAllLokasi();
		$this->page->view('templates/about',$data);
	}

}

/* End of file site.php */
/* Location: .bigjill/admin_bl/application/controllers/site.php */