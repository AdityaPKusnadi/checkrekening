<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_master extends CI_Model {
    /*
	public	$propose   	  = '';
	public	$unpaid   	  = '';
	*/
	public function listAllUkuran(){
        $data = $this->db->from('tbl_ukuran')->where(array('deleted' => '0'))->order_by('nama', 'asc')->get()->result();

        return $data;
    }

    public function listAllBank(){
        $data = $this->db->from('tbl_bank')->where(array('deleted' => '0'))->order_by('nama', 'asc')->get()->result();

        return $data;
    }

    public function listAllRekening(){
        $this->db->select('a.*,b.singkatan');
        $this->db->from('tbl_rekening a');
        $this->db->join('tbl_bank b','a.bank_id=b.bank_id','left');
        $this->db->where('a.deleted','0');
        $this->db->where('a.deleted','6');
        $data = $this->db->get()->result();

        return $data;
    }

    public function listAllbarang(){
     $query = $this->db->query('SELECT a.barang_id,a.nama,a.harga,c.nama AS kategori,b.foto_utama AS foto FROM tbl_barang a LEFT JOIN tbl_barang_foto b ON a.barang_id = b.barang_id LEFT JOIN tbl_kategori c ON c.kategori_id = a.kategori_id WHERE a.deleted=0 ORDER BY a.nama ASC');
     $data = $query->result();
     return $data;
 }

 public function listAllwarna(){
    $data = $this->db->from('tbl_warna')->where(array('deleted' => '0'))->order_by('nama', 'asc')->get()->result();

    return $data;
}

public function listAlluser(){
    $data = $this->db->from('tbl_admin')->where(array('deleted' => '0'))->get()->result();

    return $data;
}

public function listAllkategori(){
    $data = $this->db->from('tbl_kategori')->where(array('deleted' => '0'))->order_by('nama', 'asc')->get()->result();

    return $data;
}

public function listAllwa(){
    $data = $this->db->from('tbl_wa')->where(array('deleted' => '0'))->order_by('nomor', 'asc')->get()->result();

    return $data;
}

public function listAlllokasi(){
    $data = $this->db->from('tbl_lokasi')->where(array('deleted' => '0'))->order_by('nama', 'asc')->get()->result();

    return $data;
}
    // 
public function listUkuranById($id)
{
    $data = $this->db->get_where('tbl_ukuran',array('ukuran_id'=>$id))->row();
    return $data;
}

public function listBankById($id)
{
    $data = $this->db->get_where('tbl_bank',array('bank_id'=>$id))->row();
    return $data;
}

public function listWarnaById($id)
{
    $data = $this->db->get_where('tbl_warna',array('warna_id'=>$id))->row();
    return $data;
}

public function listKategoriById($id)
{
    $data = $this->db->get_where('tbl_kategori',array('kategori_id'=>$id))->row();
    return $data;
}

public function listBarangById($id)
{
    $this->db->select('a.*,b.nama as KategoriName,c.*');
    $this->db->from('tbl_barang a');
    $this->db->join('tbl_kategori b','a.kategori_id=b.kategori_id','left');
    $this->db->join('tbl_barang_foto c','a.barang_id=c.barang_id','left');
    $this->db->where('a.barang_id',$id);
    $data = $this->db->get()->row();
    // $data = $this->db->get_where('tbl_barang',array('barang_id'=>$id))->row();
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

public function listUserById($id)
{
    $data = $this->db->get_where('tbl_admin',array('admin_id'=>$id))->row();
    return $data;
}

public function listLokasiById($id)
{
    $data = $this->db->get_where('tbl_lokasi',array('lokasi_id'=>$id))->row();
    return $data;
}

public function listWAById($id)
{
    $data = $this->db->get_where('tbl_wa',array('wa_id'=>$id))->row();
    return $data;
}
    // 
    public function insertBank($data)
    {
        $this->db->set('nama',$data['nama']);
        $this->db->set('singkatan',$data['singkatan']);
        $this->db->set('deleted','0');
        $this->db->set('create_at',$data['now']);
        $this->db->set('create_by',$data['create_by']);
        $this->db->set('update_at',$data['now']);
        $this->db->set('update_by',$data['create_by']);
        $this->db->set('lastmodified',$data['now']);
        $data = $this->db->insert('tbl_bank');
    
        return $data;
    }

public function insertUkuran($data)
{
    $this->db->set('nama',$data['nama']);
    $this->db->set('singkatan',$data['singkatan']);
    $this->db->set('deleted','0');
    $this->db->set('create_at',$data['now']);
    $this->db->set('create_by',$data['create_by']);
    $this->db->set('update_at',$data['now']);
    $this->db->set('update_by',$data['create_by']);
    $this->db->set('lastmodified',$data['now']);
    $data = $this->db->insert('tbl_bank');

    return $data;
}

public function insertWarna($data)
{
    $this->db->set('nama',$data['nama']);
    $this->db->set('deleted','0');
    $this->db->set('create_at',$data['now']);
    $this->db->set('create_by',$data['create_by']);
    $this->db->set('update_at',$data['now']);
    $this->db->set('update_by',$data['create_by']);
    $this->db->set('lastmodified',$data['now']);
    $data = $this->db->insert('tbl_warna');

    return $data;
}

public function insertKategori($data)
{
    $this->db->set('nama',$data['nama']);
    $this->db->set('ukuran',$data['opsi']);
    $this->db->set('deleted','0');
    $this->db->set('create_at',$data['now']);
    $this->db->set('create_by',$data['create_by']);
    $this->db->set('update_at',$data['now']);
    $this->db->set('update_by',$data['create_by']);
    $this->db->set('lastmodified',$data['now']);
    $data = $this->db->insert('tbl_kategori');

    return $data;
}

public function insertUser($data)
{
    $this->db->set('nama',$data['nama']);
    $this->db->set('username',$data['username']);
    $this->db->set('email',$data['email']);
    $this->db->set('display_email',$data['display_email']);
    $this->db->set('password',$data['password']);
    $this->db->set('keterangan',$data['keterangan']);
    $this->db->set('deleted','0');
    $this->db->set('create_at',$data['now']);
    $this->db->set('create_by',$data['create_by']);
    $this->db->set('update_at',$data['now']);
    $this->db->set('update_by',$data['create_by']);
    $this->db->set('lastmodified',$data['now']);
    $data = $this->db->insert('tbl_admin');

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
    $this->db->set('deleted','0');
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
    $this->db->set('status',$data['status']);
    $this->db->set('kronologi',$data['kronologi']);
    $this->db->set('deleted','0');
    $this->db->set('create_at',$data['now']);
    $this->db->set('create_by',$data['create_by']);
    $this->db->set('update_at',$data['now']);
    $this->db->set('update_by',$data['create_by']);
    $this->db->set('lastmodified',$data['now']);
    $this->db->where('rekening_id',$data['rekening_id']);

    $data = $this->db->update('tbl_rekening');
    // var_dump($data);die;
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

public function insertLokasi($data)
{
    $this->db->set('nama',$data['nama']);
    $this->db->set('url',$data['url']);
    $this->db->set('deleted','0');
    $this->db->set('create_at',$data['now']);
    $this->db->set('create_by',$data['create_by']);
    $this->db->set('update_at',$data['now']);
    $this->db->set('update_by',$data['create_by']);
    $this->db->set('lastmodified',$data['now']);
    $data = $this->db->insert('tbl_lokasi');

    return $data;
}

public function insertWA($data)
{
    $this->db->set('nomor',$data['nomor']);
    $this->db->set('pesan',$data['pesan']);
    $this->db->set('deleted','0');
    $this->db->set('create_at',$data['now']);
    $this->db->set('create_by',$data['create_by']);
    $this->db->set('update_at',$data['now']);
    $this->db->set('update_by',$data['create_by']);
    $this->db->set('lastmodified',$data['now']);
    $data = $this->db->insert('tbl_wa');

    return $data;
}

    //

public function deleteData($where, $table, $data)
{   
    $this->db->set('deleted','1');
    $this->db->set('update_at',$data['now']);
    $this->db->set('update_by',$data['update_by']);
    $this->db->set('lastmodified',$data['now']);

    $this->db->where($where);
    $data = $this->db->update($table);

    return $data;
}

    // 

public function updateWarna($data)
{   
    $this->db->set('nama',$data['nama']);
    $this->db->set('update_at',$data['now']);
    $this->db->set('update_by',$data['create_by']);
    $this->db->set('lastmodified',$data['now']);
    $this->db->where('warna_id',$data['warna_id']);
    $data = $this->db->update('tbl_warna');

    return $data;
}

public function updateUkuran($data)
{   
    $this->db->set('nama',$data['nama']);
    $this->db->set('singkatan',$data['singkatan']);
    $this->db->set('update_at',$data['now']);
    $this->db->set('update_by',$data['create_by']);
    $this->db->set('lastmodified',$data['now']);
    $this->db->where('bank_id',$data['bank_id']);
    $data = $this->db->update('tbl_bank');

    return $data;
}

public function updateKategori($data)
{
    $this->db->set('nama',$data['nama']);
    $this->db->set('ukuran',$data['opsi']);
    $this->db->set('update_at',$data['now']);
    $this->db->set('update_by',$data['create_by']);
    $this->db->set('lastmodified',$data['now']);
    $this->db->where('kategori_id',$data['kategori_id']);
    $data = $this->db->update('tbl_kategori');

    return $data;
}

public function updateUser($data)
{
    $this->db->set('nama',$data['nama']);
    $this->db->set('username',$data['username']);
    $this->db->set('email',$data['email']);
    $this->db->set('display_email',$data['display_email']);
    if ($data['password']!='') {
        $this->db->set('password',$data['password']);
    }
    $this->db->set('keterangan',$data['keterangan']);
    $this->db->set('update_at',$data['now']);
    $this->db->set('update_by',$data['create_by']);
    $this->db->set('lastmodified',$data['now']);
    $this->db->where('admin_id',$data['admin_id']);
    $data = $this->db->update('tbl_admin');

    return $data;
}

public function updateLokasi($data)
{   
    $this->db->set('nama',$data['nama']);
    $this->db->set('url',$data['url']);
    $this->db->set('update_at',$data['now']);
    $this->db->set('update_by',$data['create_by']);
    $this->db->set('lastmodified',$data['now']);
    $this->db->where('lokasi_id',$data['lokasi_id']);
    $data = $this->db->update('tbl_lokasi');

    return $data;
}

public function updateWA($data)
{   
    $this->db->set('nomor',$data['nomor']);
    $this->db->set('pesan',$data['pesan']);
    $this->db->set('update_at',$data['now']);
    $this->db->set('update_by',$data['create_by']);
    $this->db->set('lastmodified',$data['now']);
    $this->db->where('wa_id',$data['wa_id']);
    $data = $this->db->update('tbl_wa');

    return $data;
}
    //

public function validasiInsertWarna($data)
{
    $query = $this->db->query("SELECT * FROM tbl_warna WHERE nama='".$data['nama']."' AND deleted=0");
    $row = $query->num_rows();

    return $row;
}

public function validasiInsertUkuran($data, $input)
{
    if ($input=='nama') {
        $query = $this->db->query("SELECT * FROM tbl_bank WHERE nama='".$data['nama']."' AND deleted=0");
        $row = $query->num_rows();
    } else if ($input=='singkatan') {
        $query = $this->db->query("SELECT * FROM tbl_bank WHERE singkatan='".$data['singkatan']."' AND deleted=0");
        $row = $query->num_rows();
    }

    return $row;
}

public function validasiInsertKategori($data)
{
    $query = $this->db->query("SELECT * FROM tbl_kategori WHERE nama='".$data['nama']."' AND deleted=0");
    $row = $query->num_rows();

    return $row;
}

public function validasiInsertUser($data, $input)
{ 
    if ($input=='username') {
        $query = $this->db->query("SELECT * FROM tbl_admin WHERE username='".$data['username']."' AND deleted=0");
        $row = $query->num_rows();
    } else if ($input=='email') {
        $query = $this->db->query("SELECT * FROM tbl_admin WHERE email='".$data['email']."' AND deleted=0");
        $row = $query->num_rows();
    }

    return $row;
}

public function validasiInsertLokasi($data)
{ 
    $query = $this->db->query("SELECT * FROM tbl_lokasi WHERE nama='".$data['nama']."' AND deleted=0");
    $row = $query->num_rows();

    return $row;
}

public function validasiInsertWA($data)
{ 
    $query = $this->db->query("SELECT * FROM tbl_wa WHERE nomor='".$data['nomor']."' AND deleted=0");
    $row = $query->num_rows();

    return $row;
}
    //

public function validasiUpdateWarna($data)
{
    $query = $this->db->query("SELECT * FROM tbl_warna WHERE nama='".$data['nama']."' AND warna_id NOT IN('".$data['warna_id']."') AND deleted=0");
    $row = $query->num_rows();

    return $row;
}

public function validasiUpdateUkuran($data, $input)
{
    if ($input=='nama') {
        $query = $this->db->query("SELECT * FROM tbl_ukuran WHERE nama='".$data['nama']."' AND ukuran_id NOT IN('".$data['ukuran_id']."') AND deleted=0");
        $row = $query->num_rows();
    } else if ($input=='singkatan') {
        $query = $this->db->query("SELECT * FROM tbl_ukuran WHERE singkatan='".$data['singkatan']."' AND ukuran_id NOT IN('".$data['ukuran_id']."') AND deleted=0");
        $row = $query->num_rows();
    }

    return $row;
}

public function validasiUpdateKategori($data)
{
 $query = $this->db->query("SELECT * FROM tbl_kategori WHERE nama='".$data['nama']."' AND kategori_id NOT IN('".$data['kategori_id']."') AND deleted=0");
 $row = $query->num_rows();

 return $row;
}

public function validasiUpdateUser($data, $input)
{
    if ($input=='username') {
        $query = $this->db->query("SELECT * FROM tbl_admin WHERE username='".$data['username']."' AND admin_id NOT IN('".$data['admin_id']."')  AND deleted=0");
        $row = $query->num_rows();
    } else if ($input=='email') {
        $query = $this->db->query("SELECT * FROM tbl_admin WHERE email='".$data['email']."' AND admin_id NOT IN('".$data['admin_id']."')  AND deleted=0");
        $row = $query->num_rows();
    }

    return $row;
}

public function validasiUpdateLokasi($data)
{
    $query = $this->db->query("SELECT * FROM tbl_lokasi WHERE nama='".$data['nama']."' AND lokasi_id NOT IN('".$data['lokasi_id']."') AND deleted=0");
    $row = $query->num_rows();

    return $row;
}

public function validasiUpdateWA($data)
{
    $query = $this->db->query("SELECT * FROM tbl_wa WHERE nomor='".$data['nomor']."' AND wa_id NOT IN('".$data['wa_id']."') AND deleted=0");
    $row = $query->num_rows();

    return $row;
}

//

public function viewDetailBarang($id)
{
    $query = $this->db->query("SELECT a.barang_id,a.nama,a.harga,a.link,a.deskripsi,a.ukuran_id,a.warna_id,c.nama AS kategori,c.ukuran,b.foto_utama AS foto,b.foto_1 AS foto1,b.foto_2 AS foto2,b.foto_3 AS foto3,b.foto_4 AS foto4 FROM tbl_barang a LEFT JOIN tbl_barang_foto b ON a.barang_id = b.barang_id LEFT JOIN tbl_kategori c ON c.kategori_id = a.kategori_id WHERE a.deleted=0 AND a.barang_id='".$id."'");
    $data = $query->result();
    return $data;
}

public function viewUkuranBarang($id)
{
    $query = $this->db->query("SELECT nama FROM tbl_ukuran WHERE ukuran_id='".$id."'");
    $data = $query->result();
    return $data;
}

public function viewWarnaBarang($id)
{
    $query = $this->db->query("SELECT nama FROM tbl_warna WHERE warna_id='".$id."'");
    $data = $query->result();
    return $data;
}

public function viewKategoriBarang($id)
{
    $query = $this->db->query("SELECT ukuran FROM tbl_kategori WHERE kategori_id='".$id."'");
    $data = $query->result();
    return $data;
}

public function validasiDeleteKategori($id){
    $query = $this->db->query("SELECT * FROM tbl_barang WHERE kategori_id='".$id."' ");
    $row = $query->num_rows();

    return $row;
}

public function deleteKategoriById($id){
    $data = $this->db->delete('tbl_kategori',array('kategori_id'=>$id));
    return $data;
}

public function validasiDeleteBank($id){
    $query = $this->db->query(" SELECT * FROM tbl_rekening WHERE deleted='0' AND bank_id='$id' ");
    $row = $query->num_rows();

    return $row;
}

public function deleteBankById($id){
    $data = $this->db->delete('tbl_bank',array('bank_id'=>$id));
    return $data;
}

public function validasiDeleteWarna($id){
    $query = $this->db->query(" SELECT * FROM tbl_barang WHERE FIND_IN_SET('$id',warna_id) ");
    $row = $query->num_rows();

    return $row;
}

public function deleteWarnaById($id){
    $data = $this->db->delete('tbl_warna',array('warna_id'=>$id));
    return $data;
}

}

/* End of file Model_dashboard.php */
/* Location: ./application/models/Model_dashboard.php */