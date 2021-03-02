<!-- <style>

</style> -->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Barang</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Home</a></li>
      <li class="breadcrumb-item">Data Master</li>
      <li class="breadcrumb-item"><a href="<?= site_url('Master_Data/barang') ?>">Barang</a></li>
      <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
    </ol>
  </div>

  <!-- Row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="col-12">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-default">Tambah Data Barang</h6>
            <a href="<?= site_url('Master_Data/barang') ?>" type="button" class="btn btn-info"><i class="fas fa-arrow-left"> Back</i></a>
          </div>
          <div class="card-body">
            <!-- Alert jika gagal insert -->
            <?php if ($this->session->flashdata('insertBarang') == 'failed'): ?>
              <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>		
                <span>Gagal Memasukan Data</span>
              </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('insertBarang') == 'berhasil'): ?>
              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>		
                <span>Berhasil Memasukan Data</span>
              </div>
            <?php endif; ?>

            <?php if (($this->session->flashdata('insertBarang') != 'failed') && ($this->session->flashdata('insertBarang') != 'berhasil') && $this->session->flashdata('insertBarang') != NULL):
            $error = $this->session->flashdata('insertBarang');
            for ($i=0; $i < count($error); $i++) { 

              if ($error[$i]=='nama') {
                ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>    
                  <span>Nama Barang Sudah Ada</span>
                </div>
                <?php
              } 
            } endif;  ?>

            <?php if ($this->session->flashdata('insertBarang') === 'failedfoto') : ?>
              <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>    
                <span><?= $this->session->error; ?></span>
              </div>
            <?php endif;  ?>
            <!--  -->
            <!-- <form enctype="multipart/form-data" method="POST" action="<?php // site_url('Master_Data/addBarang') ?>"> -->
              <?= form_open_multipart('Master_Data/addBarang') ?>
              <div class="form-group">
                <label for="nama">Nama Barang</label>
                <input type="text" class="form-control" name='nama' id="nama" aria-describedby="nama"
                placeholder="Nama Barang" maxlength="60" required autofocus>
              </div>

              <div class="form-group">
                <label for="harga">Harga Barang</label>
                <div class="input-group">
                  <div class="input-group-prepend" >
                    <span class="input-group-text" id="label-harga">Rp. </span>
                  </div>
                  <input type="number" class="form-control" name='harga' id="harga" aria-describedby="Harga Barang"
                  placeholder="Harga Barang" maxlength="25" aria-describedby="label-harga" required>
                </div>
              </div>

              <div class="form-group">
                <label for="link">Link Shopee</label>
                <input type="url" class="form-control" name='link' id="link" aria-describedby="link"
                placeholder="Link Shopee">
              </div>

              <div class="form-group">
                <label for="kategoriop">Kategori</label>
                <select name="kategoriop" id="kategoriop" class="form-control selectpicker" data-live-search="true" data-size="4" required>
                  <option value="" disabled selected>-- Pilih Kategori --</option>
                  <?php foreach ($listKategori as $lkat): ?>
                    <option value="<?= $lkat->kategori_id ?>"><?= $lkat->nama ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="form-group ukuranListbox">
                <label for="ukuranop">Ukuran</label>
                <div class="input-group">
                 <select id="ukuranop" class="form-control selectpicker" data-live-search="true" data-size="4">
                  <option id="kosong" value="" disabled selected>-- Pilih Ukuran --</option>
                  <?php foreach ($listUkuran as $lk): ?>
                    <option value="<?= $lk->ukuran_id ?>"><?= $lk->nama.' ('.$lk->singkatan.')' ?></option>
                  <?php endforeach; ?>
                </select>
                <div class="input-group-append">
                  <span class="input-group-text" style="cursor: pointer;"><a class="addUkuranBtn">Tambah</a></span>
                </div>
              </div>
              <div id="daftarUkuran" class="daftarUkuran"></div>
              <input type="hidden" name="hiddenUkuran" id="hiddenUkuran">
            </div>

            <div class="form-group">
              <label for="warnaop">Warna</label>
              <div class="input-group">
                <select id="warnaop" class="form-control selectpicker" data-live-search="true" data-size="4" required>
                  <option value="" disabled selected>-- Pilih Warna --</option>
                  <?php foreach ($listWarna as $lw): ?>
                    <option value="<?= $lw->warna_id ?>"><?= $lw->nama ?></option>
                  <?php endforeach; ?>
                </select>
                <div class="input-group-append">
                  <span class="input-group-text" style="cursor: pointer;"><a class="addWarnaBtn">Tambah</a></span>
                </div>
              </div>
              <div id="daftarWarna" class="daftarUkuran"></div>
              <input type="hidden" name="hiddenWarna" id="hiddenWarna">
            </div>

            <div class="form-group">
              <label for="deskripsi">Deskripsi</label>
              <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" placeholder="Deskripsi Barang" wrap="hard"></textarea>
            </div>

            <label for="imagesUtama">Gambar Utama: </label>
            <a class="btn btn-danger" onclick="$('#imagesUtama').val('');" style="color:#fff; cursor:pointer; margin-left:60px;" data-toggle="tooltip" title="Delete Image">X</a>
            <div class="box">
              <input type="file" name="imagesUtama" id="imagesUtama" class="inputfile" required />
              <label for="file-6"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span></span></label>
            </div>

            <label for="images1">Gambar 1 (opsional): </label>
             <a class="btn btn-danger" onclick="$('#images1').val('');" style="color:#fff; cursor:pointer; margin-left:24px;" data-toggle="tooltip" title="Delete Image">X</a>
            <div class="box">
              <input type="file" name="images1" id="images1" class="inputfile" />
              <label for="file-6"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span></span></label>
            </div>

            <label for="images2">Gambar 2 (opsional): </label>
            <a class="btn btn-danger" onclick="$('#images2').val('');" style="color:#fff; cursor:pointer;  margin-left:24px;" data-toggle="tooltip" title="Delete Image">X</a>
            <div class="box">
              <input type="file" name="images2" id="images2" class="inputfile" />
              <label for="file-6"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span></span></label>
            </div>

            <label for="images3">Gambar 3 (opsional): </label>
            <a class="btn btn-danger" onclick="$('#images3').val('');" style="color:#fff; cursor:pointer; margin-left:24px;" data-toggle="tooltip" title="Delete Image">X</a>
            <div class="box">
              <input type="file" name="images3" id="images3" class="inputfile" />
              <label for="file-6"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span></span></label>
            </div>

            <label for="images4">Gambar 4 (opsional): </label>
            <a class="btn btn-danger" onclick="$('#images4').val('');" style="color:#fff; cursor:pointer; margin-left:24px;" data-toggle="tooltip" title="Delete Image">X</a>
            <div class="box">
              <input type="file" name="images4" id="images4" class="inputfile" />
              <label for="file-6"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span></span></label>
            </div>


            <button type="submit" class="btn btn-success">Simpan</button>
            <button type="reset" class="btn btn-danger">Reset</button>

          </form>

<!--           <div id="dropzone">
            <form action="/upload" class="dropzone needsclick dz-clickable" id="demo-upload">

              <div class="dz-message needsclick">
                <button type="button" class="dz-button">Drop files here or click to upload.</button>
              </div>

            </form>
          </div> -->

        </div>
      </div>
    </div>
  </div>  
</div>
<!--Row-->
</div>
<script>
  $('#kategoriop').on('change', function() {
    var hasil = this.value;

    $.ajax({
      url: 'ajaxgetukuran',
      type: "POST",
      data: {
        validasiukuran: hasil,
      },
      success: function (res) {
        var obj = JSON.parse(res);
        if (obj[0]['ukuran']=='Y') {
          $('#daftarUkuran').show();
          $('.ukuranListbox').show();
        }else{
          $('#daftarUkuran').hide();
          $('.ukuranListbox').hide();

          ukurannya = [];
          $('#hiddenUkuran').val('');
          $('#daftarUkuran').html('');
          $("#ukuranop").val('');
        }
      }
    });

  });
</script>
<!-- <script>
  Dropzone.autoDiscover = false;
  $(".dropzone").dropzone({
   addRemoveLinks: true,
   removedfile: function(file) {
     var name = file.name; 

     $.ajax({
       type: 'POST',
       url: 'upload.php',
       data: {name: name,request: 2},
       sucess: function(data){
        console.log('success: ' + data);
      }
    });
     var _ref;
     return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
   }
 });
</script> -->