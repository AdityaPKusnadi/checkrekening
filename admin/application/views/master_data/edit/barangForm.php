<!-- <style>

</style> -->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Barang</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Home</a></li>
      <li class="breadcrumb-item">Data Master</li>
      <li class="breadcrumb-item"><a href="<?= site_url('Master_Data/barang') ?>">Barang</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
    </ol>
  </div>

  <!-- Row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="col-12">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-default">Edit Data Barang</h6>
            <a href="<?= site_url('Master_Data/barang') ?>" type="button" class="btn btn-info"><i class="fas fa-arrow-left"> Back</i></a>
          </div>
          <div class="card-body">
            <!-- Alert jika gagal insert -->
            <?php if ($this->session->flashdata('updateBarang') == 'failed'): ?>
              <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>		
                <span>Gagal Mengubah Data</span>
              </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('updateBarang') == 'berhasil'): ?>
              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>		
                <span>Berhasil Mengubah Data</span>
              </div>
            <?php endif; ?>

            <?php if (($this->session->flashdata('updateBarang') != 'failed') && ($this->session->flashdata('updateBarang') != 'berhasil') && $this->session->flashdata('updateBarang') != NULL):
            $error = $this->session->flashdata('updateBarang');
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
            <!--  -->
            <!-- <form enctype="multipart/form-data" method="POST" action="<?php // site_url('Master_Data/addBarang') ?>"> -->
              <?= form_open_multipart('Master_Data/editBarang') ?>
              <div class="form-group">
                <input type="hidden" name="idbarang" value="<?= $detail->barang_id ?>">
                <label for="nama">Nama Barang</label>
                <input type="text" class="form-control" name='nama' id="nama" aria-describedby="nama"
                placeholder="Nama Barang" maxlength="60" value="<?= isset($detail->nama)? $detail->nama :'' ?>" required autofocus>
              </div>

              <div class="form-group">
                <label for="harga">Harga Barang</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="label-harga">Rp. </span>
                  </div>
                  <input type="number" class="form-control" name='harga' id="harga" aria-describedby="Harga Barang"
                  placeholder="Harga Barang" maxlength="25" aria-describedby="label-harga" value="<?= isset($detail->harga)? $detail->harga :'' ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label for="link">Link Shopee</label>
                <input type="url" class="form-control" name='link' id="link" aria-describedby="link"
                placeholder="Link Shopee" value="<?= isset($detail->link)? $detail->link :'' ?>">
              </div>

              <div class="form-group">
                <label for="kategoriop">Kategori</label>
                <select id="kategoriop" name="kategoriop" class="form-control selectpicker" data-live-search="true" data-size="4" required>
                  <option value="<?php echo isset($detail->kategori_id)? $detail->kategori_id :'' ?>" selected><?php echo isset($detail->kategori_id)? $detail->KategoriName :'' ?></option>
                  <?php foreach ($listKategori as $lkat): ?>
                    <option value="<?= $lkat->kategori_id ?>"><?= $lkat->nama ?></option>
                  <?php endforeach; ?>
                </select>
                <input type="hidden" id="kategorihidden" value="<?= $detail->kategori_id ?>" >
              </div>

              <div class="form-group ukuranListbox">
                <label for="ukuranop">Ukuran</label>
                <div class="input-group">
                 <select id="ukuranop" class="form-control selectpicker" data-live-search="true" data-size="4" >
                  <option value="" disabled>-- Pilih Ukuran --</option>
                  <?php foreach ($listUkuran as $lk): ?>
                    <option value="<?= $lk->ukuran_id ?>"><?= $lk->nama.' ('.$lk->singkatan.')' ?></option>
                  <?php endforeach; ?>
                </select>
                <div class="input-group-append">
                  <span class="input-group-text" style="cursor: pointer;"><a class="addUkuranBtn">Tambah</a></span>
                </div>
              </div>
              <div id="daftarUkuran" class="daftarUkuran">
                <!--  -->
              </div>
              <input type="hidden" name="hiddenUkuran" id="hiddenUkuran" value="<?= $detail->ukuran_id; ?>">
            </div>

            <div class="form-group">
              <label for="warnaop">Warna</label>
              <div class="input-group">
              <select id="warnaop" class="form-control selectpicker" data-live-search="true" data-size="4">
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
              <input type="hidden" name="hiddenWarna" id="hiddenWarna" value="<?= $detail->warna_id; ?>">
            </div>

            <div class="form-group">
              <label for="deskripsi">Deskripsi</label>
              <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" placeholder="Deskripsi Barang"><?= isset($detail->link)? $detail->deskripsi :'' ?></textarea>
            </div>

            <label for="imagesUtama">Gambar Utama: </label>
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

            <label for="images3">Gambar 3 (opsional): </label>
            <img name="foto3" id="foto3" src="<?php echo base_url('assets/img/barang/').$detail->foto_3?>" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" width="250px",height="250px" style="margin:5px;">
            
            <a class="btn btn-danger" onclick="$('#delete_foto3').val('<?= $detail->foto_3 ?>');$('#hidden_foto3').val('0');$('#images3').val('');document.getElementById('foto3').parentNode.removeChild(foto3);" style="color:#fff; cursor:pointer; margin-left:24px;" data-toggle="tooltip" title="Delete Image">X</a>
            
            <div class="box">
              <input type="hidden" name="hidden_foto3" value="<?= $detail->foto_3?>">
              <input type="hidden" name="delete_gambar3" id="delete_gambar3">
              <input type="file" name="images3" id="images3" class="inputfile" />
              <label for="file-6"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span></span></label>
            </div>

            <label for="images4">Gambar 4 (opsional): </label>
            <img name="foto4" id="foto4" src="<?php echo base_url('assets/img/barang/').$detail->foto_4?>" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" width="250px",height="250px" style="margin:5px;">
            
             <a class="btn btn-danger" onclick="$('#delete_foto4').val('<?= $detail->foto_4 ?>');$('#hidden_foto4').val('0');$('#images4').val('');document.getElementById('foto4').parentNode.removeChild(foto4);" style="color:#fff; cursor:pointer; margin-left:24px;" data-toggle="tooltip" title="Delete Image">X</a>
             
            <div class="box">
              <input type="hidden" name="hidden_foto4" value="<?= $detail->foto_4?>">
              <input type="hidden" name="delete_foto4" id="delete_foto4">
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
  var  urlaj = '/admin_bl/index.php/Master_Data/ajaxgetukuran';
  $(document).ready(function () {
    var hasil = $("#kategorihidden").val();
        //console.log(hasil);

        $.ajax({
          url: urlaj,
          type: "POST",
          data: {
            validasiukuran: hasil,
          },
          success: function (res) {
        //console.log(res);
        var obj = JSON.parse(res);
        if (obj[0]['ukuran']=='Y') {
          $('#daftarUkuran').show();
          $('.ukuranListbox').show();
          getUkuranData();
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


        getWarnaData();
      });

  var ukurannya = [];
  var warnanya = [];

  function delete_ukuran_edit(size){
    const index = ukurannya.indexOf(size);
    if (index > -1) {
      ukurannya.splice(index, 1);
      $("#hiddenUkuran").val(ukurannya);
    }
  }

  function delete_warna_edit(warna){
    const index = warnanya.indexOf(warna);
    if (index > -1) {
      warnanya.splice(index, 1);
      $("#hiddenWarna").val(warnanya);
    }
  }

  function getUkuranData(){
    var ID = $("#hiddenUkuran").val();
    var list = ID.split(',');
    
    for (let i = 0; i < list.length; i++) {
      //  console.log(list[i]);
      $.ajax({
        type: "POST",
        url: "<?= site_url('Master_Data/getListUkuran') ?>",
        data: {id:list[i]},
        dataType: "text",
        success: function (response) {
          data = JSON.parse(response);
          // console.log(data);
          //bikin html untuk chipnya
          var html = '';
          html += '<div class="chip">';
          html += data.nama;
          html += '<span class="closebtn" onclick = "';
          html += "this.parentElement.style.display='none'; ";
          html += "delete_ukuran_edit('";
          html += data.ukuran_id;
          html += "')";
          html += '"">×</span></div>';

          //menampilkan chip ke daftar
          $('#daftarUkuran').append(html);
          var arrayukurannya = data.ukuran_id;
          ukurannya.push(arrayukurannya);
        }
      });
    }
  }

  function getWarnaData(){
    var ID = $("#hiddenWarna").val();
    var list = ID.split(',');
    
    for (let i = 0; i < list.length; i++) {
      //  console.log(list[i]);
      $.ajax({
        type: "POST",
        url: "<?= site_url('Master_Data/getListWarna') ?>",
        data: {id:list[i]},
        dataType: "text",
        success: function (response) {
          data = JSON.parse(response);
          // console.log(data);
          //bikin html untuk chipnya
          var html = '';
          html += '<div class="chip">';
          html += data.nama;
          html += '<span class="closebtn" onclick = "';
          html += "this.parentElement.style.display='none'; ";
          html += "delete_warna_edit('";
          html += data.warna_id;
          html += "')";
          html += '"">×</span></div>';

          // console.log(html);

          //menampilkan chip ke daftar
          $('#daftarWarna').append(html);
          var arrayWarnanya = data.warna_id;
          warnanya.push(arrayWarnanya);
        }
      });
    }
  }

  $('#kategoriop').on('change', function() {
    var hasil = this.value;
    // console.log(hasil);
    $.ajax({
      url: urlaj,
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