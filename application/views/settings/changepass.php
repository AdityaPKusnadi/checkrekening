<!-- rangka -->
<?php 
if (!$this->session->has_userdata('user')){
	redirect('checkrekening/login');
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="CheckRekening">
	<meta name="author" content="Aditya" />
	<title>Check Rekening</title>
	<link href="<?php echo base_url('/assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('/assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('/assets/css/ruang-admin.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('/assets/vendor/datatables/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('/assets/bootstrap-select/css/bootstrap-select.min.css'); ?>">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css'/>
	<link rel="stylesheet" href="<?= base_url('/assets/css/custom.css') ?>" >

	<script src="<?php echo base_url('/assets/sweetalert/sweetalert2.all.min.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/vendor/jquery/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/bootstrap-select/js/bootstrap-select.min.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/dropzone/dist/min/dropzone.min.js'); ?>"></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js'></script>

</head>
<style>
	#message {
    display:none;
    background: #f1f1f1;
    color: #000;
    position: absolute;
    padding:10px 20px;
    width:250px;
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
<body id="page-top">
	<div id="wrapper">
		
		<?php echo $this->load->view('templates/left_content_tpl'); ?>

		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content">
				
				<?php echo $this->load->view('templates/header_tpl'); ?>

				<!-- content -->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Change Password</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item">Settings</li>
              <li class="breadcrumb-item active" aria-current="page">Change Password</li>
            </ol>
          </div>
          <!-- Row -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="col-12">
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-default">Change Password</h6>
                  </div>
                  <div class="card-body">
                    <!-- Alert jika gagal insert -->
                    <?php if ($this->session->flashdata('editPass') == 'failed'): ?>
                      <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>		
                        <span>Gagal Mengubah Password</span>
                      </div>
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('editPass') == 'berhasil'): ?>
                      <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>		
                        <span>Berhasil Mengubah Password</span>
                      </div>
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('editPass') == 'beda'): ?>
                      <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>    
                        <span>Password Lama Salah</span>
                      </div>
                    <?php endif; ?>
                    <!--  -->
                    <form method="POST" action="<?= site_url('Settings/editPass') ?>">
                    <div class="form-group">
                      <label for="passlama">Password Lama</label>
                      <input type="password" class="form-control" name='passlama' id="passlama" aria-describedby="passlama"
                      placeholder="Password Lama" minlength="8" autofocus required>
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" name='password' id="password" aria-describedby="password"
                      placeholder="Password" minlength="8" required>
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
                      placeholder="Konfirmasi Password" minlength="8" required>
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
        <!-- content -->

			</div>

			<!-- Footer -->
			<footer class="sticky-footer bg-white">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>Copyright &copy; <script> document.write(new Date().getFullYear()); </script> - CheckRekening - Design
							<b><a href="https://indrijunanda.gitlab.io/" target="_blank">indrijunanda</a></b>
						</span>
					</div>
				</div>
			</footer>
			<!-- End Footer -->

		</div>
	</div>
	<script src="<?php echo base_url('/assets/js/ruang-admin.min.js'); ?>"></script>
  <script src="<?php echo base_url('/assets/sweetalert/sweetalert2.all.min.js'); ?>"></script>
<script src="<?php echo base_url('/assets/vendor/jquery/jquery.min.js'); ?>"></script>
	<script>
		$(document).ready(function () {
			$('#dataTableHover').DataTable();
		});

		$(function () {
			$('[data-toggle="tooltip"]').tooltip();
		});

		function logout() {
			Swal.fire({
				title: 'Confirmation',
				text: 'Are you sure you want to logout?',
				icon: 'question',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, logout!'
			}).then((result) => {
				if (result.isConfirmed) {
					window.location.href = "<?php echo base_url('/site/logout'); ?>";
				}
			})
		}


		$('.deleteBank').on('click', function() {
			var id =  $(this).data('id');
			var nama =  $(this).data('nama');
			Swal.fire({
				title: 'Confirmation',
				text: 'Are you sure you want to delete '+nama+'?',
				icon: 'question',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete!',
				showLoaderOnConfirm: true,
				preConfirm: function() {
					return new Promise(function(resolve) {
						$.ajax({
							url: '<?= site_url('Master_Data/bank_ValidasiDel') ?>',
							type: 'POST',
							data: 'id=' + id,
							dataType: 'json'
						})
						.done(function(response) {
							Swal.fire('Deleted!', response.message, response.status);
						})
						.fail(function() {
							Swal.fire('Oops...', 'Something went wrong with Deleted Item !', 'error')
						});
					});
				},
			})
			
		});

		$('.deleteWarna').on('click', function() {
			var id =  $(this).data('id');
			var nama =  $(this).data('nama');
			Swal.fire({
				title: 'Confirmation',
				text: 'Are you sure you want to delete '+nama+'?',
				icon: 'question',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete!',
				showLoaderOnConfirm: true,
				preConfirm: function() {
					return new Promise(function(resolve) {
						$.ajax({
							url: '<?= site_url('Master_Data/WarnaValidasi_delete') ?>',
							type: 'POST',
							data: 'id=' + id,
							dataType: 'json'
						})
						.done(function(response) {
							Swal.fire('Deleted!', response.message, response.status);
						})
						.fail(function() {
							Swal.fire('Oops...', 'Something went wrong with Deleted Item !', 'error')
						});
					});
				},
			})
			
		});

		$('.deleteKategori').on('click', function() {
			var id =  $(this).data('id');
			var nama =  $(this).data('nama');
			Swal.fire({
				title: 'Confirmation',
				text: 'Are you sure you want to delete '+nama+'?',
				icon: 'question',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete!',
				showLoaderOnConfirm: true,
				preConfirm: function() {
					return new Promise(function(resolve) {
						$.ajax({
							url: '<?= site_url('Master_Data/KategoriValidasi_delete') ?>',
							type: 'POST',
							data: 'id=' + id,
							dataType: 'json'
						})
						.done(function(response) {
							Swal.fire('Deleted!', response.message, response.status);
						})
						.fail(function() {
							Swal.fire('Oops...', 'Something went wrong with Deleted Item !', 'error')
						});
					});
				},
			})
		});

		$('.deleteLokasi').on('click', function() {
			var id =  $(this).data('id');
			var nama =  $(this).data('nama');
			Swal.fire({
				title: 'Confirmation',
				text: 'Are you sure you want to delete '+nama+'?',
				icon: 'question',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete!'
			}).then((result) => {
				if (result.isConfirmed) {
					window.location.href = ("<?= site_url('Master_Data/hapusLokasi/') ?>" + id);
				}
			})
		});

		$('.deleteWA').on('click', function() {
			var id =  $(this).data('id');
			var nama =  $(this).data('nama');
			Swal.fire({
				title: 'Confirmation',
				text: 'Are you sure you want to delete '+nama+'?',
				icon: 'question',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete!'
			}).then((result) => {
				if (result.isConfirmed) {
					window.location.href = ("<?= site_url('Master_Data/hapusWA/') ?>" + id);
				}
			})
		});

		$('.deleteUser').on('click', function() {
			var id =  $(this).data('id');
			var nama =  $(this).data('nama');
			Swal.fire({
				title: 'Confirmation',
				text: 'Are you sure you want to delete '+nama+'?',
				icon: 'question',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete!'
			}).then((result) => {
				if (result.isConfirmed) {
					window.location.href = ("<?= site_url('Master_Data/hapusUser/') ?>" + id);
				}
			})
		});

		$('.deleteRekening').on('click', function() {
			var id =  $(this).data('id');
			var nama =  $(this).data('nama');
			Swal.fire({
				title: 'Confirmation',
				text: 'Are you sure you want to delete '+nama+'?',
				icon: 'question',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete!'
			}).then((result) => {
				if (result.isConfirmed) {
					window.location.href = ("<?= site_url('Master_Data/hapusRekening/') ?>" + id);
				}
			})
		});

		// 
		$('.terimaRekening').on('click', function() {
			var id =  $(this).data('id');
			var nama =  $(this).data('nama');
			Swal.fire({
				title: 'Confirmation',
				text: 'Are you sure you want to Confirm '+nama+'?',
				icon: 'question',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete!'
			}).then((result) => {
				if (result.isConfirmed) {
					window.location.href = ("<?= site_url('Master_Data/terimaRekening/') ?>" + id);
				}
			})
		});

		$('.tolakRekening').on('click', function() {
			var id =  $(this).data('id');
			var nama =  $(this).data('nama');
			Swal.fire({
				title: 'Confirmation',
				text: 'Are you sure you want to Reject '+nama+'?',
				icon: 'question',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete!'
			}).then((result) => {
				if (result.isConfirmed) {
					window.location.href = ("<?= site_url('Master_Data/tolakRekening/') ?>" + id);
				}
			})
		});
		// 


		var ukurannya = [];
		var warnanya = [];

		function delete_ukuran(size) {
			var fixsize = size.split(',');
			const index = ukurannya.indexOf(fixsize[0]);
			if (index > -1) {
				ukurannya.splice(index, 1);
				$("#hiddenUkuran").val(ukurannya);
			}
		}

		$(".addUkuranBtn").on('click', function () {
			var ukuran = $('#ukuranop').val()+','+$('#ukuranop option:selected').text();
			var validasi = 'T';
			//pengecekan ukuran
			for (var i = 0; i < ukurannya.length; i++) {
				if (ukurannya[i]==ukuran.split(',')[0]) {
					validasi='Y';
				}
			}
			// console.log(ukuran);
			if (validasi=='T') {
			//lanjut menampilkan

			//push ukuran ke array
			ukurannya.push($('#ukuranop').val());
			console.log(ukurannya);
			$("#hiddenUkuran").val(ukurannya);
				// console.log(ukuran);
			//bikin html untuk chipnya
			var html = '';
			html += '<div class="chip">';
			html += ukuran.split(',')[1];
			html += '<span class="closebtn" onclick = "';
			html += "this.parentElement.style.display='none'; ";
			html += "delete_ukuran('";
			html += ukuran;
			html += "')";
			html += '"">×</span></div>';

			// console.log(html);

			//menampilkan chip ke daftar
			$('#daftarUkuran').append(html);
		} else {
			//tampil pesan
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Size Sudah Ditambahkan!',
			})
		}
	});

		function delete_warna(warna) {
			var fixwarna = warna.split(',');
			const index = warnanya.indexOf(fixwarna[0]);
			if (index > -1) {
				warnanya.splice(index, 1);
				$("#hiddenWarna").val(warnanya);
			}
		}

		$(".addWarnaBtn").on('click', function () {
			var warna = $('#warnaop').val()+','+$('#warnaop option:selected').text();
			var validasi = 'T';
			//pengecekan ukuran
			for (var i = 0; i < warnanya.length; i++) {
				if (warnanya[i]==warna.split(',')[0]) {
					validasi='Y';
				}
			}
			if (validasi=='T') {
			//lanjut menampilkan
			
			//push ukuran ke array
			warnanya.push($('#warnaop').val());
			// console.log(warnanya);
			$("#hiddenWarna").val(warnanya);


			//bikin html untuk chipnya
			var html = '';
			html += '<div class="chip">';
			html += warna.split(',')[1];
			html += '<span class="closebtn" onclick = "';
			html += "this.parentElement.style.display='none'; ";
			html += "delete_warna('";
			html += warna;
			html += "')";
			html += '"">×</span></div>';

			// console.log(html);

			//menampilkan chip ke daftar
			$('#daftarWarna').append(html);
		} else {
			//tampil pesan
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Warna Sudah Ditambahkan!',
			})
		}
	});

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
</body>
</html>
<!--  -->
