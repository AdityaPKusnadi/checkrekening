<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Warna</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Home</a></li>
      <li class="breadcrumb-item">Data Master</li>
      <li class="breadcrumb-item active" aria-current="page">Warna</li>
    </ol>
  </div>

  <!-- Row -->
  <div class="row">
    <!-- DataTable Ukuran -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="col-12">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-default">Data Warna</h6>
            <a href="<?= site_url('Master_Data/warnaForm') ?>" type="button" class="btn btn-info"><i class="fas fa-plus"> Tambah</i></a>
          </div>
          <!-- Alert jika gagal delete -->
          <?php if ($this->session->flashdata('deleteWarna') == 'failed'): ?>
            <script>
              toastr.error('Gagal Menghapus Data','Berhasil',{"showDuration": "2000","closeButton": true,"timeOut": "5000"});
            </script>
          <?php endif; ?>

          <?php if ($this->session->flashdata('deleteWarna') == 'berhasil'): ?>
          <script>
            toastr.success('Berhasil Menghapus Data','Berhasil',{"showDuration": "2000","closeButton": true,"timeOut": "5000",});
          </script>
        <?php endif; ?>
        <!--  -->
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead class="thead-light">
              <tr>
                <th width="15%">No</th>
                <th width="45%">Nama</th>
                <th width="15%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no =1;
              foreach ($daftar as $d): ?>
                <tr>
                  <td><?= $no; ?></td>
                  <td><?= $d->nama; ?></td>
                  <td>
                    <a type="button" href="<?= site_url('Master_Data/editWarnaForm/'.$d->warna_id) ?>" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Edit Data"><i class="fas fa-edit"></i></a>
                    <button type="button" class="btn btn-danger deleteWarna" data-toggle="tooltip" data-placement="bottom" title="Delete Data" data-id="<?= $d->warna_id; ?>" data-nama="<?= $d->nama; ?>"><i class="fas fa-trash"></i></button>
                  </td>
                </tr>
                <?php
                $no++;
              endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Row-->

</div>
            <!---Container Fluid-->