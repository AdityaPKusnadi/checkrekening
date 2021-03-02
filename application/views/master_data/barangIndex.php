<style>
  pre {
    white-space: pre-wrap; 
    word-wrap: break-word;
    font-size: 17px;
    font-family: unset;
    color: #62676B;

  }
</style>


<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Barang</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Home</a></li>
      <li class="breadcrumb-item">Data Master</li>
      <li class="breadcrumb-item active" aria-current="page">Barang</li>
    </ol>
  </div>

  <!-- Row -->
  <div class="row">
    <!-- DataTable Ukuran -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="col-12">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-default">Data Barang</h6>
            <a href="<?= site_url('Master_Data/barangForm') ?>" type="button" class="btn btn-info"><i class="fas fa-plus"> Tambah</i></a>
          </div>
          <!-- Alert jika gagal update -->
          <?php if ($this->session->flashdata('updateBarang') == 'failed'): ?>
            <script>
              toastr.error('Gagal Update Data','Berhasil',{"showDuration": "2000","closeButton": true,"timeOut": "5000"});
            </script>
          <?php endif; ?>

          <?php if ($this->session->flashdata('updateBarang') == 'berhasil'): ?>
            <script>
              toastr.success('Berhasil Update Data','Berhasil',{"showDuration": "2000","closeButton": true,"timeOut": "5000",});
            </script>
          <?php endif; ?>
          <!--  -->
          <!-- Alert jika gagal delete -->
          <?php if ($this->session->flashdata('deleteBarang') == 'failed'): ?>
            <script>
              toastr.error('Gagal Menghapus Data','Berhasil',{"showDuration": "2000","closeButton": true,"timeOut": "5000"});
            </script>
          <?php endif; ?>

          <?php if ($this->session->flashdata('deleteBarang') == 'berhasil'): ?>
            <script>
              toastr.success('Berhasil Menghapus Data','Berhasil',{"showDuration": "2000","closeButton": true,"timeOut": "5000",});
            </script>
          <?php endif; ?>
          <!--  -->
          <div class="table-responsive p-3">
            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
              <thead class="thead-light">
                <tr>
                  <th width="10%">No</th>
                  <th width="30%">Nama</th>
                  <th width="15%">Harga</th>
                  <th width="15%">Kategori</th>
                  <th width="10%">Foto</th>
                  <th width="20%">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no = 1;
                foreach ($daftar as $d): ?>
                  <tr>
                    <td><?= $no; ?></td>
                    <td><?= $d->nama; ?></td>
                    <td><?= "Rp." . number_format($d->harga,0,',','.'); ?></td>
                    <td><?= $d->kategori ?></td>
                    <td><img src="<?php 
                    if($d->foto==null || $d->foto==''){
                      echo base_url('assets/img/null.png');
                      }else{
                        echo base_url('assets/img/barang/'.$d->foto);
                      }
                      ?>" width="125" height="150"></td>
                      <td>
                        <button type="button" class="btn btn-warning" data-toggle="tooltip" data-target="#modalBarang" data-placement="bottom" title="View Data" onclick="viewdata(<?= $d->barang_id; ?>)"><i class="fas fa-eye"></i></button>
                        <a type="button" href="<?= site_url('Master_Data/editBarangForm/'.$d->barang_id) ?>" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Edit Data"><i class="fas fa-edit"></i></a>
                        <button type="button" class="btn btn-danger deleteBarang" data-toggle="tooltip" data-placement="bottom" title="Delete Data" data-id="<?= $d->barang_id; ?>" data-nama="<?= $d->nama; ?>"><i class="fas fa-trash"></i></button>
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
        url: 'ajaxbarang',
        type: "POST",
        data: {
          idbarang: id,
        },
        success: function (res) {
         var obj = JSON.parse(res);

         var angka = obj[0]['harga'];
         var reverse = angka.toString().split('').reverse().join(''),
         ribuan = reverse.match(/\d{1,3}/g);
         ribuan = ribuan.join('.').split('').reverse().join('');

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
         html += '<tr><td scope="row">Nama Barang</td>';
         html += '<td scope="row">'+obj[0]['nama']+'</td></tr>';
         html += '<tr><td scope="row">Harga</td>';
         html += '<td scope="row">Rp. '+ribuan+'</td></tr>';
         html += '<tr><td scope="row">Kategori</td>';
         html += '<td scope="row">'+obj[0]['kategori']+'</td></tr>';
         html += '<tr><td scope="row">Link Shopee</td>';
         html += '<td scope="row"><a href="'+obj[0]['link']+'" target="_blank">'+obj[0]['link']+'</a></td></tr>';

         var validasi = obj[0]['ukuran'];

         if (validasi=='Y' && (obj[0]['ukuran_id'] != null && obj[0]['ukuran_id'].trim() != "")) {
          html += '<tr><td scope="row">Ukuran</td>';
          html += '<td scope="row"><ul>';
        }

        var jumlahukuran = [""];
        if (obj[0]['ukuran_id'] != null && obj[0]['ukuran_id'].trim() != "") {
          var jumlahukuran = obj[0]['ukuran_id'].split(',');
        }
        var jumlahwarna = obj[0]['warna_id'].split(',');

        for (var i = 0; i < jumlahukuran.length; i++) {
          var ukuran = 0;
          $.ajax({
            url: 'ajaxukuran',
            type: "POST",
            data: {
              idukuran: jumlahukuran[i],
            },
            success: function (res2) {
              var obj2 = JSON.parse(res2);

              if (validasi=='Y' && (obj[0]['ukuran_id'] != null && obj[0]['ukuran_id'].trim() != "")) {
                html += '<li>'+obj2[0]['nama']+'</li>';
              }
              ukuran += 1;

              if (ukuran==jumlahukuran.length) {
                if (validasi=='Y' &&  (obj[0]['ukuran_id'] != null && obj[0]['ukuran_id'].trim() != "")) {
                 html += '</ul></td></tr>';
               }
               html += '<tr><td scope="row">Warna</td>';
               html += '<td scope="row"><ul>'; 

               for (var j = 0; j < jumlahwarna.length; j++) {
                var warna = 0;
                $.ajax({
                  url: 'ajaxwarna',
                  type: "POST",
                  data: {
                    idwarna: jumlahwarna[j],
                  },
                  success: function (res3) {
                    var obj3 = JSON.parse(res3);

                    html += '<li>'+obj3[0]['nama']+'</li>';
                    warna += 1;

                    if (warna==jumlahwarna.length) {
                     html += '</ul></td></tr>';

                     html += '<tr><td scope="row">Deskripsi</td>';
                     html += '<td scope="row"><pre>'+obj[0]['deskripsi']+'</pre></td></tr>';
                     html += '<tr><td scope="row">Foto Utama</td>';
                     html += '<td scope="row"><img src="';
                     if (obj[0]['foto']==null||obj[0]['foto']=='null.png'||obj[0]['foto']=='0') {
                      html += "<?= base_url('assets/img/null.png') ?>";
                    } else {
                     html += "<?= base_url('assets/img/barang/') ?>"+obj[0]['foto'];
                   }
                   html += '" width="125" height="150"></td>';
                   html += '<tr><td scope="row">Foto Lainnya</td><td scope="row">';

                   if (obj[0]['foto1']!=null && obj[0]['foto1']!='' && obj[0]['foto1']!='null.png' && obj[0]['foto1']!='0') {
                     html += '<img src="';
                     html += "<?= base_url('assets/img/barang/') ?>"+obj[0]['foto1'];
                     html += '" width="125" height="150" style="padding-right:3px;padding-bottom:3px;"></img>';
                   } 
                   if(obj[0]['foto2']!=null && obj[0]['foto2']!='' && obj[0]['foto2']!='null.png' && obj[0]['foto2']!='0'){
                     html += '<img src="';
                     html += "<?= base_url('assets/img/barang/') ?>"+obj[0]['foto2'];
                     html += '" width="125" height="150" style="padding-right:3px;padding-bottom:3px;"></img>';
                   } 
                   if (obj[0]['foto3']!=null && obj[0]['foto3']!='' && obj[0]['foto3']!='null.png' && obj[0]['foto3']!='0') {
                     html += '<img src="';
                     html += "<?= base_url('assets/img/barang/') ?>"+obj[0]['foto3'];
                     html += '" width="125" height="150" style="padding-right:3px;padding-bottom:3px;"></img>';
                   }
                   if(obj[0]['foto4']!=null && obj[0]['foto4']!='' && obj[0]['foto4']!='null.png' && obj[0]['foto4']!='0'){
                     html += '<img src="';
                     html += "<?= base_url('assets/img/barang/') ?>"+obj[0]['foto4'];
                     html += '" width="125" height="150" style="padding-right:3px;padding-bottom:3px;"></img>';
                   }
                   html += '</td>';

                   html += '</tr></tbody></table></div></div></div>';
                   html += '<div class="modal-footer">';
                   html += '<button type="button" class="btn btn-info" data-dismiss="modal">Close</button></div></div></div></div>';

                   $('.modalnya').html(html);
                   $('#modalBarang').modal('show');

                 }

               }
             });

              }

            }

          }
        });

        }

      }
    });

}
</script>   