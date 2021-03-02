<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends MX_Controller {
	
	public function __construct(){
		parent::__construct();
		
        $this->page->use_directory();
        $this->load->model('model_settings');
    }

    public function index(){		
        // 
    }
    
    public function changePass(){
        $this->page->view('settings/changepass');
    }

    public function editPass()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data['passlama'] = $_POST['passlama'];
        $data['password'] = md5($_POST['password']);
        $data['update_by'] = $this->session->admin->admin_id;
        $data['now'] = date('Y-m-d H:m:s');

        $row = $this->model_settings->validasiPass($data);

        if ($row == '1') {
           $res = $this->model_settings->updatePass($data);

           if($res){
                $this->session->set_flashdata('editPass', 'berhasil');
                redirect(site_url('Settings/changePass'));   
            }else{
                $this->session->set_flashdata('editPass', 'failed');
                redirect(site_url('Settings/changePass'));   
            }
        } else {
            $this->session->set_flashdata('editPass', 'beda');
                redirect(site_url('Settings/changePass'));
        }
}
}