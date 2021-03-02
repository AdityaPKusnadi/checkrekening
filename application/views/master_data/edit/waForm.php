<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Nomor WA</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Home</a></li>
      <li class="breadcrumb-item">Data Master</li>
      <li class="breadcrumb-item"><a href="<?= site_url('Master_Data/wa') ?>">Nomor WA</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
    </ol>
  </div>

  <!-- Row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="col-12">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-default">Edit Data Nomor WA</h6>
            <a href="<?= site_url('Master_Data/wa') ?>" type="button" class="btn btn-info"><i class="fas fa-arrow-left"> Back</i></a>
          </div>
          <div class="card-body">
            <!-- Alert jika gagal insert -->
            <?php if ($this->session->flashdata('updateWA') == 'failed'): ?>
              <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>    
                <span>Gagal Mengubah Data</span>
              </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('updateWA') == 'berhasil'): ?>
              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>    
                <span>Berhasil Mengubah Data</span>
              </div>
            <?php endif; ?>

            <?php if (($this->session->flashdata('updateWA') != 'failed') && ($this->session->flashdata('updateWA') != 'berhasil') && $this->session->flashdata('updateWA') != NULL):
            $error = $this->session->flashdata('updateWA');
            for ($i=0; $i < count($error); $i++) { 

              if ($error[$i]=='nomor') {
                ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>    
                  <span>Nomor Sudah Ada</span>
                </div>
                <?php
              } 
            } endif;  ?>
            <!--  -->
            <form method="POST" action="<?= site_url('Master_Data/editWA') ?>">
              <input type="hidden" name='wa_id' id="wa_id" value="<?= $detail->wa_id ?>">
              <div class="form-group">
                <label for="nomor">Nomor WA</label>
                <input type="text" class="form-control" name='nomor' id="nomor" aria-describedby="nomor"
                placeholder="Nomor WA" maxlength="15" onkeypress="return event.charCode >= 48 && event.charCode <=57" value="<?= $detail->nomor ?>" required autofocus>
              </div>
              <div class="form-group">
                <label for="nomor">Pesan</label>
                <textarea class="form-control" id="pesan" name="pesan" rows="5" placeholder="Pesan WA" wrap="hard" required><?= $detail->pesan ?></textarea>
                <font color="red"><b>*</b></font> (<b>#nama</b> = nama barang, <b>#harga</b> = harga barang, <b>#kategori</b> = kategori barang)
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