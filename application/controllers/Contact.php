<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MX_Controller {
	
	public function __construct(){
		parent::__construct();

		$this->page->use_directory();
		$this->load->model('model_dashboard');
		$this->load->helper(array('form', 'url'));
		$this->load->library('email');
	}
	
	public function index(){
		$this->page->template('contact');
		// $data['wa'] = $this->model_dashboard->listAllWA();
		$data['email'] = $this->model_dashboard->listAllEmail();
		$data['lokasi'] = $this->model_dashboard->listAllLokasi();
		$this->page->view('templates/contact',$data);
		$this->load->library('form_validation');
	}

	public function kirimEmail()
	{
			//Get the form data
		$name = $_POST['nama'];
		$from_email = $_POST['email'];
		$subject = $_POST['telp'];
		$message = $_POST['pesan'];

			//Web master email
			$to_email = 'bigjill.indonesia@gmail.com'; //Webmaster email, who receive mails

			//Mail settings
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'ssl://smtp.googlemail.com';
			$config['smtp_port'] = 465;
			$config['smtp_user'] = 'admin@apkblack17.net'; // Your email address
			$config['smtp_pass'] = "Arema1987."; // Your email account password
			$config['mailtype'] = 'text'; // or 'text'
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE; //No quotes required
			$config['newline'] = "\r\n"; //Double quotes required

			$this->email->initialize($config);                        

			//Send mail with data
			$this->email->from('admin@apkblack17.net','BigJill_Info');
			$this->email->to($to_email);
			$this->email->subject($name.':'.$subject);
			$this->email->message($message);

			// var_dump($this->email->send());
        	// $this->email->print_debugger();die;
			
			if ($this->email->send())
			{
				$this->session->set_flashdata('msg','<div class="alert alert-success">Mail sent!</div>');

				redirect('contact');
			} else {
				// var_dump($this->email->send());die;
				$this->session->set_flashdata('msg','<div class="alert alert-danger">Problem in sending</div>');
				redirect(site_url('contact'));
			}
			
		}
	}

	/* End of file site.php */
/* Location: .bigjill/admin_bl/application/controllers/site.php */