<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_settings extends CI_Model {

	public function updatePass($data)
	{
		$this->db->set('password',$data['password']);
		$this->db->set('update_at',$data['now']);
		$this->db->set('update_by',$data['update_by']);
		$this->db->set('lastmodified',$data['now']);
		$this->db->where('users_id',$data['update_by']);
		$data = $this->db->update('tbl_users');

		return $data;
	}

	public function validasiPass($data)
	{
		$query = $this->db->query("SELECT * FROM tbl_users WHERE users_id='".$data['update_by']."' AND `password`=md5('".$data['passlama']."')");
		$row = $query->num_rows();

		return $row;
	}
}