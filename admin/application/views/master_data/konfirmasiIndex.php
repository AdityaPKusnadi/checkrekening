<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Rekening</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Home</a></li>
      <li class="breadcrumb-item">Data Master</li>
      <li class="breadcrumb-item active" aria-current="page">Rekening</li>
    </ol>
  </div>

  <!-- Row -->
  <div class="row">
    <!-- DataTable Ukuran -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="col-12">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-default">Data Rekening</h6>
          </div>
          <!-- Alert jika diconfirm delete -->
          <?php if ($this->session->flashdata('confirmrekening') == 'failed'): ?>
            <script>
              toastr.error('Gagal Konfirmasi Data','Berhasil',{"showDuration": "2000","closeButton": true,"timeOut": "5000"});
            </script>
          <?php endif; ?>

          <?php if ($this->session->flashdata('confirmrekening') == 'berhasil'): ?>
            <script>
              toastr.success('Berhasil Konfirmasi Data','Berhasil',{"showDuration": "2000","closeButton": true,"timeOut": "5000",});
            </script>
          <?php endif; ?>
          <!--  -->

          <!-- Alert jika direect delete -->
          <?php if ($this->session->flashdata('rejectrekening') == 'failed'): ?>
            <script>
              toastr.error('Gagal Tolak Data','Berhasil',{"showDuration": "2000","closeButton": true,"timeOut": "5000"});
            </script>
          <?php endif; ?>

          <?php if ($this->session->flashdata('rejectrekening') == 'berhasil'): ?>
            <script>
              toastr.success('Berhasil Tolak Data','Berhasil',{"showDuration": "2000","closeButton": true,"timeOut": "5000",});
            </script>
          <?php endif; ?>
          <!--  -->
          <div class="table-responsive p-3">
            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
              <thead class="thead-light">
                <tr>
                  <th width="10%">No</th>
                  <th width="10%">Bukti</th>
                  <th width="20%">No Rek</th>
                  <th width="10%">Bank</th>
                  <th width="10%">Atas Nama</th>
                  <th width="10%">Kronologi</th>
                  <th width="10%">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no =1;
                foreach ($daftar as $d): ?>
                  <tr>
                    <td><?= $no; ?></td>
                    <td><img src="<?= base_url('assets/img/barang/'.$d->foto_utama) ?>" alt="" width="100px" height="100px"></td>
                    <td><?= $d->rekening; ?></td>                    
                    <td><?= $d->singkatan; ?></td>
                    <td><?= $d->atas_nama; ?></td>
                    <td><?= $d->kronologi; ?></td>
                    <td> 
                      <button type="button" class="btn btn-info terimaRekening" data-toggle="tooltip" data-placement="bottom" title="Terima Data" data-id="<?= $d->rekening_id; ?>" data-nama="<?= $d->rekening; ?>"><i class="fas fa-check"></i></button>
                      <button type="button" class="btn btn-danger tolakRekening" data-toggle="tooltip" data-placement="bottom" title="Tolak Data" data-id="<?= $d->rekening_id; ?>" data-nama="<?= $d->rekening; ?>"><i class="fas fa-ban"></i></button>
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