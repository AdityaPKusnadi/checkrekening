<?php 
if (!$this->session->has_userdata('admin')){
	redirect('site');
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="BigJill Admin">
	<meta name="author" content="Aditya" />
	<!-- <meta name="author" content="Marcellino" /> -->

	<!-- <link href="<?php //echo base_url('/assets/img/logo/logo.png'); ?>" rel="icon"> -->
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
	.btn-info {
		color: #fff;
		background-color: #1b94c4;
		border-color: #AE8E7F;
	}

	.btn-info:hover,.btn-info:focus {
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

	.btn-danger {
		color: #fff;
		background-color: #ff5f33;
		border-color: #AE594D;
	}

	.btn-danger:hover {
		color: #fff;
		background-color: #BF796F;
		border-color: #BF796F;
	}

	.btn-danger:not(:disabled):not(.disabled):active, .btn-danger:not(:disabled):not(.disabled).active,
	.show > .btn-danger.dropdown-toggle {
		color: #fff;
		background-color: #BF796F;
		border-color: #BF796F;
	}

	.btn-warning {
		color: #fff;
		background-color: #D69D69;
		border-color: #D69D69;
	}

	.btn-warning:hover {
		color: #fff;
		background-color: #CB8341;
		border-color: #CB8341;
	}

	.btn-warning:not(:disabled):not(.disabled):active, .btn-warning:not(:disabled):not(.disabled).active,
	.show > .btn-warning.dropdown-toggle {
		color: #fff;
		background-color: #CB8341;
		border-color: #CB8341;
	}

	.btn-success {
		color: #fff;
		background-color: #175760;
		border-color: #175760;
	}

	.btn-success:hover {
		color: #fff;
		background-color: #217C89;
		border-color: #217C89;
	}

	.btn-success:not(:disabled):not(.disabled):active, .btn-success:not(:disabled):not(.disabled).active,
	.show > .btn-success.dropdown-toggle {
		color: #fff;
		background-color: #217C89;
		border-color:#217C89;
	}
	
	.page-item.active .page-link {
		z-index: 1;
		color: #fff;
		background-color: #A38871;
		border-color: #A38871;
	}

	.page-item .page-link {
		z-index: 1;
		color: #896F58;
		background-color: #fff;
		border-color: #fff;
	}

	.form-control:focus {
		color: #495057;
		background-color: #fff;
		border-color: #AE8E7F;
		outline: 0;
		box-shadow: 0 0 0 0.2rem rgba(226, 222, 219, 255);
	}

	.sidebar.toggled .nav-item .collapse .collapse-inner .collapse-item.active,
	.sidebar.toggled .nav-item .collapsing .collapse-inner .collapse-item.active {
		color: #A38871;
		font-weight: 800;
	}

	.input-group-append span {
		color: #fff;
		background-color: #AE8E7F;
		border-color: #AE8E7F;
	}

	.input-group-prepend span {
		color: #fff;
		background-color: #AE8E7F;
		border-color: #AE8E7F;
	}

	.dropdown-item.active, .dropdown-item:active {
		color: #fff;
		background-color: #AE8E7F;
	}
</style>
<body id="page-top">
	<div id="wrapper">
		
		<?php echo $this->load->view($left_content); ?>

		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content">
				
				<?php echo $this->load->view($header); ?>

				<?php echo $this->load->view($content); ?>

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
			// .then((result) => {
			// 	if (result.isConfirmed) {
			// 		window.location.href = ("<?php // site_url('Master_Data/hapusUkuran/') ?>" + id);
			// 	}
			// })
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
			// .then((result) => {
			// 	if (result.isConfirmed) {
			// 		window.location.href = ("<?= site_url('Master_Data/hapusWarna/') ?>" + id);
			// 	}
			// })
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
			// .then((result) => {
			// 	if (result.isConfirmed) {
			// 		window.location.href = ("<?php //echo site_url('Master_Data/hapusKategori/') ?>" + id);
			// 	}
			// })
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
				confirmButtonText: 'Terima!'
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
				title: 'Are you sure you want to Reject '+nama+'?',
				icon: 'question',
				input: 'text',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, Reject!'
			}).then((result) => {
				// console.log(result);
				if (result.isConfirmed) {
					window.location.href = ("<?= site_url('Master_Data/tolakRekening/') ?>" + id +'/'+result.value);
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

</script>
</body>
</html>