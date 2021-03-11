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
            <a href="<?= site_url('Master_Data/rekeningForm') ?>" type="button" class="btn btn-info"><i class="fas fa-plus"> Tambah</i></a>
          </div>
          <!-- Alert jika gagal delete -->
          <?php if ($this->session->flashdata('deleteRekening') == 'failed'): ?>
            <script>
              toastr.error('Gagal Konfirmasi Rekening','Berhasil',{"showDuration": "2000","closeButton": true,"timeOut": "5000"});
            </script>
          <?php endif; ?>

          <?php if ($this->session->flashdata('deleteRekening') == 'berhasil'): ?>
            <script>
              toastr.success('Berhasil Konfirmasi Rekening','Berhasil',{"showDuration": "2000","closeButton": true,"timeOut": "5000",});
            </script>
          <?php endif; ?>
          <!--  -->
          <div class="table-responsive p-3">
            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
              <thead class="thead-light">
                <tr>
                <th width="1%">No</th>
                  <th width="5%">Bukti</th>
                  <th width="5%">No Rek</th>
                  <th width="5%">Bank</th>
                  <th width="5%">Atas Nama</th>
                  <th width="30%">Kronologi</th>
                  <th width="15%">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no =1;
                foreach ($daftar as $d): ?>
                  <tr>
                  <td><?= $no; ?></td>
                    <td><img src="<?= base_url('/assets/img/barang/'.$d->foto_utama) ?>" alt="" width="100px" height="100px"></td>
                    <td><?= $d->rekening; ?></td>                    
                    <td><?= $d->singkatan; ?></td>
                    <td><?= $d->atas_nama; ?></td>
                    <td><?= $d->kronologi; ?></td>
                    <td>
                    <button type="button" class="btn btn-warning" data-toggle="tooltip" data-target="#modalBarang" data-placement="bottom" title="View Data" onclick="viewdata(<?= $d->rekening_id; ?>)"><i class="fas fa-eye"></i></button>
                      <a type="button" href="<?= site_url('Master_Data/editRekeningForm/'.$d->rekening_id) ?>" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Edit Data"><i class="fas fa-edit"></i></a>
                      <button type="button" class="btn btn-danger deleteRekening" data-toggle="tooltip" data-placement="bottom" title="Delete Data" data-id="<?= $d->rekening_id; ?>" data-nama="<?= $d->rekening; ?>"><i class="fas fa-trash"></i></button>
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

<!-- Modal -->
<div class="modalnya"></div>


<script>
  function viewdata(id) {
    $.ajax({
      url: 'ajaxrekening',
      type: "POST",
      data: {
        rekening_id: id,
      },
      success: function (res) {
       var obj = JSON.parse(res);
       console.log(obj);

       var html = '';
       html += '<div class="modal fade" id="modalBarang" tabindex="-1" role="dialog" aria-labelledby="modalBarangLabel" aria-hidden="true">';
       html += '<div class="modal-dialog" role="document">';
       html += '<div class="modal-content">';
       html += '<div class="modal-header">';
       html += '<h5 class="modal-title" id="modalBarangLabel">Detail Data Barang</h5>';
       html += '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
       html += '<span aria-hidden="true">&times;</span>';
       html += '</button> </div>';
       html += '<div class="modal-body">';
       html += '<div class="row"><div class="col-12"><table class="table table-hover table-responsive" width="100%"><tbody>';
       html += '<tr><td scope="row">Nomer Rekening</td>';
       html += '<td scope="row">'+obj['rekening']+'</td></tr>';
       html += '<tr><td scope="row">Atas Nama</td>';
       html += '<td scope="row">'+obj['atas_nama']+'</td></tr>';
       html += '<tr><td scope="row">Bank</td>';
       html += '<td scope="row">'+obj['singkatan']+'</td></tr>';
       html += '<tr><td scope="row">Kronologi</td>';
       html += '<td scope="row">'+obj['kronologi']+'</td></tr>';
       
      
                 html += '<td scope="row"><ul>'; 
                 if (obj['foto_utama']!=null && obj['foto_utama']!='' && obj['foto_utama']!='null.png' && obj['foto_utama']!='0') {
                     html += '<img src="';
                     html += "<?= base_url('assets/img/barang/') ?>"+obj['foto_utama'];
                     html += '" width="125" height="150" style="padding-right:3px;padding-bottom:3px;"></img>';
                   } 
                   if(obj['foto_1']!=null && obj['foto_1']!='' && obj['foto_1']!='null.png' && obj['foto_1']!='0'){
                     html += '<img src="';
                     html += "<?= base_url('assets/img/barang/') ?>"+obj['foto_1'];
                     html += '" width="125" height="150" style="padding-right:3px;padding-bottom:3px;"></img>';
                   } 
                   if (obj['foto_2']!=null && obj['foto_2']!='' && obj['foto_2']!='null.png' && obj['foto_2']!='0') {
                     html += '<img src="';
                     html += "<?= base_url('assets/img/barang/') ?>"+obj['foto_2'];
                     html += '" width="125" height="150" style="padding-right:3px;padding-bottom:3px;"></img>';
                   }

                 html += '</tr></tbody></table></div></div></div>';
                 html += '<div class="modal-footer">';
                 html += '<button type="button" class="btn btn-info" data-dismiss="modal">Close</button></div></div></div></div>';
                 $('.modalnya').html(html);
                 $('#modalBarang').modal('show');

       

  
    }

  });

};
</script>   