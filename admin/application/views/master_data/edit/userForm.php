<style>
  #message {
    display:none;
    background: #f1f1f1;
    color: #000;
    position: absolute;
    padding:10px 20px;
    width:260px;
    margin:auto;
    margin-top:-10px;
    margin-bottom: 10px;
  }
  #message p {
    padding: 0px 35px;
    font-size: 14px;
  }
  .valid {
    color: green;
  }
  .valid:before {
    position: relative;
    left: -35px;
    content: "✓";
  }
  .invalid {
    color: red;
  }
  .invalid:before {
    position: relative;
    left: -35px;
    content: "✕";
  }
</style>

<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data User</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Home</a></li>
      <li class="breadcrumb-item">Data Master</li>
      <li class="breadcrumb-item"><a href="<?= site_url('Master_Data/user') ?>">User</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
    </ol>
  </div>

  <!-- Row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="col-12">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-default">Edit Data User</h6>
            <a href="<?= site_url('Master_Data/user') ?>" type="button" class="btn btn-info"><i class="fas fa-arrow-left"> Back</i></a>
          </div>
          <div class="card-body">
            <!-- Alert jika gagal insert -->
            <?php if ($this->session->flashdata('updateUser') == 'failed'): ?>
              <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>    
                <span>Gagal Mengubah Data</span>
              </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('updateUser') == 'berhasil'): ?>
              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>    
                <span>Berhasil Mengubah Data</span>
              </div>
            <?php endif; ?>

            <?php if (($this->session->flashdata('updateUser') != 'failed') && ($this->session->flashdata('updateUser') != 'berhasil') && $this->session->flashdata('updateUser') != NULL):
            $error = $this->session->flashdata('updateUser');
            for ($i=0; $i < count($error); $i++) { 

              if($error[$i]=='username'){
                ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>    
                  <span>Username Sudah Terpakai</span>
                </div>
                <?php
              } else if($error[$i]=='email'){
                ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>    
                  <span>Email Sudah Terpakai</span>
                </div>
                <?php
              } 
            } endif;  ?>
            <!--  -->
            <form method="POST" action="<?= site_url('Master_Data/editUser') ?>">
              <input type="hidden" name='admin_id' id="admin_id" value="<?= $detail->admin_id ?>">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name='nama' id="nama" aria-describedby="nama"
                placeholder="Nama" maxlength="60" value="<?= $detail->nama ?>" required autofocus>
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name='username' id="username" aria-describedby="username"
                placeholder="Username" minlength="6" maxlength="8" value="<?= $detail->username ?>" required>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name='email' id="email" aria-describedby="email"
                placeholder="Email" maxlength="50" value="<?= $detail->email ?>" required>
              </div>
              <div class="form-group">
                <label for="singkatan">Menggunakan Email</label>
                <select name="opsiEmail" class="form-control selectpicker" id="opsiEmail" aria-describedby="Menggunakan Email">
                  <option value="<?= $detail->display_email ?>" selected><?= $detail->display_email == "Y" ? "YA" : "TIDAK" ?></option>
                  <?php
                  if ($detail->display_email == "Y") {
                    echo "<option value='T'>TIDAK</option>";
                  }else{
                    echo "<option value='Y'>YA</option>";
                  }
                  ?>
                </select>
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name='password' id="password" aria-describedby="password"
                placeholder="Password" minlength="8">
              </div>
              <div id="message">
                <h6>Password harus terdiri dari: </h6>
                <p id="letter" class="invalid">Memiliki <b>huruf kecil</b></p>
                <p id="capital" class="invalid">Memiliki <b>huruf besar</b></p>
                <p id="number" class="invalid">Memiliki <b>nomor</b></p>
                <p id="length" class="invalid">Minimal <b>8 karakter</b></p>
              </div>
              <div class="form-group">
                <label for="kpass">Konfirmasi Password</label>
                <input type="password" class="form-control" name='kpass' id="kpass" aria-describedby="konfirmasi password"
                placeholder="Konfirmasi Password" minlength="8">
              </div>
              <div class="form-group">
                <label for="Keterangan">Keterangan</label>
                <textarea name="keterangan" class="form-control" id="keterangan" aria-describedby="keterangan" cols="30" rows="5" placeholder="Keterangan"><?= $detail->keterangan ?></textarea>
              </div>
              <button id="simpan" type="submit" class="btn btn-success">Simpan</button>
              <button type="reset" class="btn btn-danger">Reset</button>

            </form>
          </div>
        </div>
      </div>
    </div>  
  </div>
  <!--Row-->

</div>
<script src="<?php echo base_url('/assets/sweetalert/sweetalert2.all.min.js'); ?>"></script>
<script src="<?php echo base_url('/assets/vendor/jquery/jquery.min.js'); ?>"></script>
<script>
  var myInput = document.getElementById("password");
  var letter = document.getElementById("letter");
  var capital = document.getElementById("capital");
  var number = document.getElementById("number");
  var length = document.getElementById("length");
  var validasi = 'T';

  myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
  }

  myInput.onkeyup = function() {

  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
    validasi = 'T';
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
    validasi = 'Y';
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
    validasi = 'T';
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
    validasi = 'Y';
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
    validasi = 'T';
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
    validasi = 'Y';
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
    validasi = 'T';
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
    validasi = 'Y';
  }
}

myInput.onblur = function() {
  // console.log(myInput.value);
  if (validasi=='Y' && myInput.value!='') {
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Password Tidak Memenuhi Kriteria!'
    }).then((result) => {
      $("#password").focus();
      $("#simpan").attr("disabled", true);
    });
  }else{
    document.getElementById("message").style.display = "none";
    $("#simpan").attr("disabled", false);
  }
}

$(document).ready(function () {
  $("#kpass").change(function(){
   if($("#kpass").val() !== $("#password").val()){
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Password Tidak Sama!'
    }).then((result) => {
      $("#kpass").focus();
    });

    $('form input').keydown(function (e) {
      if (e.keyCode == 13) {
        e.preventDefault();
        return false;
      }
    });

    $("#simpan").attr("disabled", true);
  }else{
    $("#simpan").attr("disabled", false);
  }
});
});
</script>