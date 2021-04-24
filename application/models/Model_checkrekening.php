<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_checkrekening extends CI_Model {

	public function searchRek($norek){
		$query = $this->db->query("SELECT a.*,b.*,c.nama as nama_bank,if(d.nama is null,f.nama,d.nama) as user_input FROM tbl_rekening a LEFT JOIN tbl_rekening_foto b ON a.rekening_id=b.rekening_id LEFT JOIN tbl_bank c ON a.bank_id=c.bank_id LEFT JOIN tbl_admin d ON (d.admin_id = a.create_by) LEFT JOIN tbl_users f ON (f.users_id=a.create_by) WHERE a.deleted=0 and a.rekening='$norek' ");
		$data = $query->result();
		return $data;
	}

    public function viewDetailRekening($id){
        $this->db->select('a.*,b.singkatan,c.*');
        $this->db->from('tbl_rekening a');
        $this->db->join('tbl_bank b','a.bank_id=b.bank_id','left');
        $this->db->join('tbl_rekening_foto c','a.rekening_id=c.rekening_id','left');
        $this->db->where('a.rekening_id',$id);
        
        $data = $this->db->get()->row();
        return $data;
    }

	public function listAllBank(){
        $data = $this->db->from('tbl_bank')->where(array('deleted' => '0'))->order_by('nama', 'asc')->get()->result();

        return $data;
    }

	public function insertUser($data){
		$this->db->set('nama',$data['username']);
        $this->db->set('username',$data['username']);
		$this->db->set('email',$data['email']);
		$this->db->set('password',$data['password']);
        $this->db->set('deleted','0');
        $this->db->set('create_at',$data['now']);
        $this->db->set('create_by','0');
        $this->db->set('update_at',$data['now']);
        $this->db->set('update_by','0');
        $this->db->set('lastmodified',$data['now']);
        $data = $this->db->insert('tbl_users');

		return $data;
	}

	public function listAllRekeningByUser($id){
		$this->db->select('a.*,b.singkatan,c.foto_utama');
        $this->db->from('tbl_rekening a');
        $this->db->join('tbl_bank b','a.bank_id=b.bank_id','left');
        $this->db->join('tbl_rekening_foto c','a.rekening_id=c.rekening_id','left');
        $deleted = "( a.deleted=3 OR a.deleted=0 or a.deleted=6)";
        $this->db->where($deleted);
		$this->db->where('a.status','user');
		$this->db->where('a.create_by',$id);
        $data = $this->db->get()->result();
        // var_dump($data);die;
        return $data;
	}

    public function insertRekening($data)
    {
        $this->db->set('bank_id',$data['bank']);
        $this->db->set('rekening',$data['norek']);
        $this->db->set('atas_nama',$data['atas_nama']);
        $this->db->set('status',$data['status']);
        $this->db->set('kronologi',$data['kronologi']);
        $this->db->set('create_at',$data['now']);
        $this->db->set('create_by',$data['create_by']);
        $this->db->set('update_at',$data['now']);
        $this->db->set('update_by',$data['create_by']);
        $this->db->set('deleted','3');
        $this->db->set('lastmodified',$data['now']);
        $this->db->insert('tbl_rekening');

        $data = $this->db->insert_id();

        return $data;
    }

    public function fotoRekening($data)
    {
        $this->db->set('rekening_id',$data['rekening_id']);
        $this->db->set('foto_utama',$data['utama']);
        $this->db->set('foto_1',$data['foto_1']);
        $this->db->set('foto_2',$data['foto_2']);
        $data = $this->db->insert('tbl_rekening_foto');

        return $data;
    }

    public function UpdateRekening($data)
    {
        $this->db->set('rekening',$data['norek']);
        $this->db->set('bank_id',$data['bank']);
        $this->db->set('atas_nama',$data['atas_nama']);
        // $this->db->set('status',$data['status']);
        $this->db->set('kronologi',$data['kronologi']);
        // $this->db->set('deleted','0');
        $this->db->set('create_at',$data['now']);
        $this->db->set('create_by',$data['create_by']);
        $this->db->set('update_at',$data['now']);
        $this->db->set('update_by',$data['create_by']);
        $this->db->set('lastmodified',$data['now']);
        $this->db->where('rekening_id',$data['rekening_id']);

        $data = $this->db->update('tbl_rekening');
        return $data;
    }

    public function UpdateRekeningFoto($data)
    {
        $this->db->set('rekening_id',$data['rekening_id']);
        $this->db->set('foto_utama',$data['utama']);
        $this->db->set('foto_1',$data['foto_1']);
        $this->db->set('foto_2',$data['foto_2']);
        $this->db->where('rekening_id',$data['rekening_id']);
        $data = $this->db->update('tbl_rekening_foto');

        return $data;
    }

    public function listRekeningById($id)
{
    $this->db->select('a.*,b.singkatan,c.*');
    $this->db->from('tbl_rekening a');
    $this->db->join('tbl_bank b','a.bank_id=b.bank_id','left');
    $this->db->join('tbl_rekening_foto c','a.rekening_id=c.rekening_id','left');
    $this->db->where('a.rekening_id',$id);

    // $this->db->select('a.*,b.nama as KategoriName,c.*');
    // $this->db->from('tbl_barang a');
    // $this->db->join('tbl_kategori b','a.kategori_id=b.kategori_id','left');
    // $this->db->join('tbl_barang_foto c','a.barang_id=c.barang_id','left');
    // $this->db->where('a.barang_id',$id);
    $data = $this->db->get()->row();
    return $data;
}

public function deleteData($where, $table, $data)
{   
    $this->db->set('deleted',$data['delete']);
    $this->db->set('update_at',$data['now']);
    $this->db->set('update_by',$data['update_by']);
    $this->db->set('lastmodified',$data['now']);

    $this->db->where($where);
    $data = $this->db->update($table);

    return $data;
}

}