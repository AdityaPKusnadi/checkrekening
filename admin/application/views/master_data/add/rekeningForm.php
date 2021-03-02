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
            <?php if ($this->session->flashdata('insertRekening') == 'failed'): ?>
              <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>		
                <span>Gagal Memasukan Data</span>
              </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('insertRekening') == 'berhasil'): ?>
              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>		
                <span>Berhasil Memasukan Data</span>
              </div>
            <?php endif; ?>

            <!-- <?php //if (($this->session->flashdata('insertRekening') != 'failed') && ($this->session->flashdata('insertRekening') != 'berhasil') && $this->session->flashdata('insertRekening') != NULL):
            // $error = $this->session->flashdata('insertRekening');
            // for ($i=0; $i < count($error); $i++) { 

            //   if ($error[$i]=='nama') {
                ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>    
                  <span>Nama Ukuran Sudah Ada</span>
                </div>
                <?php
              // }else if($error[$i]=='singkatan'){
                ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>    
                  <span>Singkatan Sudah Ada</span>
                </div>
                <?php
            //   } 
            // } endif;  ?> -->
            <!--  -->
            <?= form_open_multipart('Master_Data/addBank') ?>
              <div class="form-group">
                <label for="nama">No Rekening</label>
                <input type="number" class="form-control" name='norek' id="norek" aria-describedby="norek"
                placeholder="No Rekening" maxlength="40" required autofocus>
              </div>
              <div class="form-group banklistbox">
                <label for="bank">Bank</label>
                  <div class="input-group">
                    <select id="bank" name="bank" class="form-control selectpicker" data-live-search="true" data-size="4">
                      <option id="kosong" value="" disabled selected>-- Pilih Bank --</option>
                      <?php foreach ($listBank as $lk): ?>
                        <option value="<?= $lk->bank_id ?>"><?= $lk->nama.' ('.$lk->singkatan.')' ?></option>
                      <?php endforeach; ?>
                    </select>
                  <div class="input-group-append">
                </div>
              </div>
              <div class="form-group">
                <label for="atas nama">Atas Nama</label>
                <input type="text" class="form-control" name="atas_nama" id="atas nama" aria-describedby="atas nama"
                placeholder="Atas Nama" maxlength="30" required>
              </div>
              <div class="form-group banklistbox">
                <label for="Status">Status</label>
                  <div class="input-group">
                    <select id="Status" name="status" class="form-control selectpicker" data-live-search="true" data-size="4">
                      <option id="kosong" value="" disabled selected>-- Pilih Status --</option>
                      <option id="kosong" value="Blacklist"><strong>Blacklist</strong></option>
                      <option id="kosong" value=""><strong>Whitelist</strong></option>
                    </select>
                  <div class="input-group-append">
                </div>
              </div>
              <div class="form-group">
                <label for="kronologi">Kronologi</label>
                <textarea class="form-control" id="kronologi" name="kronologi" rows="5" placeholder="Kronologi Kejadian" wrap="hard"></textarea>
              </div>
            
            <label for="imagesUtama">Bukti Utama: </label>
            <a class="btn btn-danger" onclick="$('#imagesUtama').val('');" style="color:#fff; cursor:pointer; margin-left:60px;" data-toggle="tooltip" title="Delete Image">X</a>
            <div class="box">
              <input type="file" name="imagesUtama" id="imagesUtama" class="inputfile" required />
              <label for="file-6"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span></span></label>
            </div>

            <label for="images1">Bukti 1 (opsional): </label>
             <a class="btn btn-danger" onclick="$('#images1').val('');" style="color:#fff; cursor:pointer; margin-left:24px;" data-toggle="tooltip" title="Delete Image">X</a>
            <div class="box">
              <input type="file" name="images1" id="images1" class="inputfile" />
              <label for="file-6"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span></span></label>
            </div>

            <label for="images2">Bukti 2 (opsional): </label>
            <a class="btn btn-danger" onclick="$('#images2').val('');" style="color:#fff; cursor:pointer;  margin-left:24px;" data-toggle="tooltip" title="Delete Image">X</a>
            <div class="box">
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