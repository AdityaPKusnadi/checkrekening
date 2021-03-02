<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Lokasi</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Home</a></li>
      <li class="breadcrumb-item">Data Master</li>
      <li class="breadcrumb-item"><a href="<?= site_url('Master_Data/lokasi') ?>">Lokasi</a></li>
      <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
    </ol>
  </div>

  <!-- Row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="col-12">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-default">Tambah Data Lokasi</h6>
            <a href="<?= site_url('Master_Data/lokasi') ?>" type="button" class="btn btn-info"><i class="fas fa-arrow-left"> Back</i></a>
          </div>
          <div class="card-body">
            <!-- Alert jika gagal insert -->
            <?php if ($this->session->flashdata('insertLokasi') == 'failed'): ?>
              <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>		
                <span>Gagal Memasukan Data</span>
              </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('insertLokasi') == 'berhasil'): ?>
              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>		
                <span>Berhasil Memasukan Data</span>
              </div>
            <?php endif; ?>

            <?php if (($this->session->flashdata('insertLokasi') != 'failed') && ($this->session->flashdata('insertLokasi') != 'berhasil') && $this->session->flashdata('insertLokasi') != NULL):
            $error = $this->session->flashdata('insertLokasi');
            for ($i=0; $i < count($error); $i++) { 

              if ($error[$i]=='nama') {
                ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>    
                  <span>Nama Lokasi Sudah Ada</span>
                </div>
                <?php
              } 
            } endif;  ?>
            <!--  -->
            <form method="POST" action="<?= site_url('Master_Data/addLokasi') ?>">
              <div class="form-group">
                <label for="nama">Nama Lokasi</label>
                <input type="text" class="form-control" name='nama' id="nama" aria-describedby="nama"
                placeholder="Nama Lokasi" required autofocus>
              </div>
              <div class="form-group">
                <label for="url">Link Google Maps</label>
                <input type="url" class="form-control" name='url' id="url" aria-describedby="url"
                placeholder="Link Google Maps" required>
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