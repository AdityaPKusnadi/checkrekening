<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Rekening</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Home</a></li>
      <li class="breadcrumb-item">Data Master</li>
      <li class="breadcrumb-item"><a href="<?= site_url('Master_Data/ukuran') ?>">Rekening</a></li>
      <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
    </ol>
  </div>

  <!-- Row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="col-12">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-default">Tambah Data Rekening</h6>
            <a href="<?= site_url('Master_Data/listRekening') ?>" type="button" class="btn btn-info"><i class="fas fa-arrow-left"> Back</i></a>
          </div>
          <div class="card-body">
            <!-- Alert jika gagal insert -->
            <?php if ($this->session->flashdata('updateRekening') == 'failed'): ?>
              <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>		
                <span>Gagal Memasukan Data</span>
              </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('updateRekening') == 'berhasil'): ?>
              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>		
                <span>Berhasil Memasukan Data</span>
              </div>
            <?php endif; ?>
            <?= form_open_multipart('Master_Data/editRekening') ?>
            <input type="hidden" value="<?= $detail->rekening_id?>" name="rekening_id">
              <div class="form-group">
                <label for="nama">No Rekening</label>
                <input type="number" class="form-control" name='norek' id="norek" aria-describedby="norek"
                placeholder="No Rekening" maxlength="40" value="<?= $detail->rekening ?>" required autofocus>
              </div>
              <div class="form-group banklistbox">
                <label for="bank">Bank</label>
                  <div class="input-group">
                    <select id="bank" name="bank" class="form-control selectpicker" data-live-search="true" data-size="4">
                      <option id="kosong" value="<?= $detail->singkatan ?>" selected><?= $detail->singkatan ?></option>
                      <?php foreach ($bank as $lk): ?>
                        <option value="<?= $lk->bank_id ?>"><?= $lk->nama.' ('.$lk->singkatan.')' ?></option>
                      <?php endforeach; ?>
                    </select>
                  <div class="input-group-append">
                </div>
              </div>
              <div class="form-group">
                <label for="atas nama">Atas Nama</label>
                <input type="text" class="form-control" name="atas_nama" id="atas nama" aria-describedby="atas nama"
                placeholder="Atas Nama" maxlength="30" value="<?= $detail->atas_nama ?>" required>
              </div>
              <div class="form-group banklistbox">
                <label for="Status">Status</label>
                  <div class="input-group">
                    <select id="Status" name="status" class="form-control selectpicker" data-live-search="true" data-size="4">
                      <option id="kosong" value="<?= $detail->status ?>"  selected><?= $detail->status ?></option>
                      <option id="kosong" value="Blacklist"><strong>Blacklist</strong></option>
                      <option id="kosong" value=""><strong>Whitelist</strong></option>
                    </select>
                  <div class="input-group-append">
                </div>
              </div>
              <div class="form-group">
                <label for="kronologi">Kronologi</label>
                <textarea class="form-control" id="kronologi" name="kronologi" rows="5" placeholder="Kronologi Kejadian" wrap="hard"><?= $detail->kronologi ?></textarea>
              </div>
            
              <label for="imagesUtama">Bukti Utama: </label>
            <img name="fotoUtama" id="fotoUtama" src="<?php echo base_url('assets/img/barang/').$detail->foto_utama?>" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" width="250px",height="250px" style="margin:5px;">
            
             <a class="btn btn-danger" onclick="$('#delete_utama').val('<?= $detail->foto_utama ?>');$('#hidden_utama').val('0');$('#imagesUtama').val('');document.getElementById('fotoUtama').parentNode.removeChild(fotoUtama);" style="color:#fff; cursor:pointer; margin-left:60px;" data-toggle="tooltip" title="Delete Image">X</a>
            
            <div class="box">
              <input type="hidden" name="hidden_utama" id="hidden_utama" value="<?= $detail->foto_utama?>">
              <input type="hidden" name="delete_utama" id="delete_utama">
              <input type="file" name="imagesUtama" id="imagesUtama" class="inputfile" />
              <label for="file-6"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span></span></label>
            </div>

            <label for="images1">Gambar 1 (opsional): </label>
            <img name="foto1" id="foto1" src="<?php echo base_url('assets/img/barang/').$detail->foto_1?>" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" width="250px",height="250px" style="margin:5px;">
            
            <a class="btn btn-danger" onclick="$('#delete_foto1').val('<?= $detail->foto_1 ?>');$('#hidden_foto1').val('0');$('#images1').val('');document.getElementById('foto1').parentNode.removeChild(foto1);" style="color:#fff; cursor:pointer; margin-left:24px;" data-toggle="tooltip" title="Delete Image">X</a>
            
            <div class="box">
              <input type="hidden" name="hidden_foto1" value="<?= $detail->foto_1?>">
              <input type="hidden" name="delete_foto1" id="delete_foto1">
              <input type="file" name="images1" id="images1" class="inputfile" />
              <label for="file-6"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span></span></label>
            </div>

            <label for="images2">Gambar 2 (opsional): </label>
            <img name="foto2" id="foto2" src="<?php echo base_url('assets/img/barang/').$detail->foto_2?>" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" width="250px",height="250px" style="margin:5px;">
            
            <a class="btn btn-danger" onclick="$('#delete_foto2').val('<?= $detail->foto_2 ?>');$('#hidden_foto2').val('0');$('#images2').val('');document.getElementById('foto2').parentNode.removeChild(foto2);" style="color:#fff; cursor:pointer; margin-left:24px;" data-toggle="tooltip" title="Delete Image">X</a>
            
            <div class="box">
              <input type="hidden" name="hidden_foto2" value="<?= $detail->foto_2?>">
              <input type="hidden" name="delete_foto2" id="delete_foto2">
              <input type="file" name="images2" id="images2" class="inputfile" />
              <label for="file-6"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span></span></label>
            </div>

              <button type="submit" class="btn btn-success">Simpan</button>
              <button type="reset" class="btn btn-danger">Reset</button>

            </form>
          </div>
        </div>
      </div>
    </div>  
  </div>
  <!--Row-->
</div>