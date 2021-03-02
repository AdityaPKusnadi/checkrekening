
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="BigJill Admin">
	<meta name="author" content="Aditya" />
	<meta name="author" content="Marcellino" />

	<title>Daftar Aplikasi</title>

	<link rel="icon" href="<?php echo base_url('/admin/assets/img/logo/logo.png'); ?>">

	<link href="<?php echo base_url('/admin/assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('/admin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet'); ?>" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/admin/assets/css/ruang-admin.min.css'); ?>" />
	
	<script type="text/javascript" src=""></script>
	<script type="text/javascript" src="<?php echo base_url('/admin/assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>

	<script src="<?php echo base_url('/admin/assets/vendor/jquery/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('/admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
	<script src="<?php echo base_url('/admin/assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
	<script src="<?php echo base_url('/admin/assets/js/ruang-admin.min.js'); ?>"></script>

</head>
<style>
	.btn-info {
		color: #fff;
		background-color: #1b94c4;
		border-color: #AE8E7F;
	}

	.btn-info:hover {
		color: #fff;
		background-color: #997361;
		border-color: #997361;
	}


	.btn-info:not(:disabled):not(.disabled):active, .btn-info:not(:disabled):not(.disabled).active,
	.show > .btn-info.dropdown-toggle {
		color: #fff;
		background-color: #997361;
		border-color: #997361;
	}

	.custom-checkbox .custom-control-input:checked ~ .custom-control-label::before {
		background-color: #AE8E7F;
	}

	.form-control:focus {
		color: #495057;
		background-color: #fff;
		border-color: #AE8E7F;
		outline: 0;
		box-shadow: 0 0 0 0.2rem rgba(226, 222, 219, 255);
	}
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
<body class="bg-gradient-login">
	<!-- Login Content -->
	<div class="container-login">
		<div class="row justify-content-center">
			<div class="col-xl-10 col-lg-12 col-md-9">
				<div class="card shadow-sm my-5">
					<div class="card-body p-0">
						<div class="row">
							<div class="col-lg-12">
								<div class="login-form">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Daftar Aplikasi</h1>
										<hr>
									</div>

									<!-- Alert jika gagal daftar -->
									<?php if ($this->session->flashdata('status') == 'failed'): ?>
										<div class="alert alert-danger alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>		
											<span>Username atau Password Salah</span>
										</div>
									<?php endif; ?>

									<!-- Alert jika tidak match password beda -->
									<?php if ($this->session->flashdata('status') == 'notmatching'): ?>
										<div class="alert alert-danger alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>		
											<span>Password Tidak Sama</span>
										</div>
									<?php endif; ?>

										<form class="user" action="<?php echo site_url('/checkrekening/daftar'); ?>" method="post">
											<div class="form-group">
												<input type="email" id="email" name="email" class="form-control" placeholder="Email" value="" required>
											</div>
											<div class="form-group">
												<input type="text" id="username" name="username" class="form-control" placeholder="Username" value="" required>
											</div>
											<div class="form-group">
												<input type="password" id="password" name="password" class="form-control" placeholder="Password" value="" minlength="8" required>
											</div>
											<div id="message">
												<h6>Password harus terdiri dari: </h6>
												<p id="letter" class="invalid">Memiliki <b>huruf kecil</b></p>
												<p id="capital" class="invalid">Memiliki <b>huruf besar</b></p>
												<p id="number" class="invalid">Memiliki <b>nomor</b></p>
												<p id="length" class="invalid">Minimal <b>8 karakter</b></p>
											</div>
											<div class="form-group">
												<input type="password" id="konfirmasi" name="konfirmasi" class="form-control" placeholder="Konfirmasi Password" minlength="8" required>
											</div>
											
											<div class="form-group">
												<input class="btn btn-info btn-block" type="submit" value="Register" style="">
											</div>
											<div class="form-group">
												<p>Sudah Punya Akun? <a href="<?= site_url('/checkrekening/login')?>">Login Sekarang!</a></p>
											</div>
										</form>
										<hr>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
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
	</html>