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
		
		<?php echo $this->load->view('templates/left_content_tpl'); ?>

		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content">
				
				<?php echo $this->load->view('templates/header_tpl'); ?>

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
            <a href="<?= site_url('checkrekening/rekeningForm') ?>" type="button" class="btn btn-info"><i class="fas fa-plus"> Tambah</i></a>
          </div>
          <!-- Alert jika gagal delete -->
          <?php if ($this->session->flashdata('deleteRekening') == 'failed'): ?>
            <script>
              toastr.error('Gagal Menghapus Data','Berhasil',{"showDuration": "2000","closeButton": true,"timeOut": "5000"});
            </script>
          <?php endif; ?>

          <?php if ($this->session->flashdata('deleteRekening') == 'berhasil'): ?>
            <script>
              toastr.success('Berhasil Menghapus Data','Berhasil',{"showDuration": "2000","closeButton": true,"timeOut": "5000",});
            </script>
          <?php endif; ?>
          <!--  -->
          <div class="table-responsive p-3">
            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
              <thead class="thead-light">
                <tr>
                  <th width="1%">No</th>
                  <th width="1%">No Rek</th>
                  <th width="1%">Bank</th>
                  <th width="1%">Atas Nama</th>
                  <th width="30%">Kronologi</th>
				  <th width="30%">Status Approval</th>
                  <th width="15%">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no =1;
                foreach ($daftar as $d): 
			    $status = $d->delete =3?"<span class='badge badge-pill badge-success'>Di Setujui</span>":"<span class='badge badge-pill badge-danger'>Di Tolak</span>";
				?>
                  <tr>
                    <td><?= $no; ?></td>
                    <td><?= $d->rekening; ?></td>                    
                    <td><?= $d->singkatan; ?></td>
                    <td><?= $d->atas_nama; ?></td>
                    <td><?= $d->kronologi; ?></td>
					<td><?= $status ?></td>
                    <td>
					<button type="button" class="btn btn-warning" data-toggle="tooltip" data-target="#modalBarang" data-placement="bottom" title="View Data" onclick="viewdata(<?= $d->rekening_id; ?>)"><i class="fas fa-eye"></i></button>
					<?php if($d->deleted = 0): ?>
                      <a type="button" href="<?= site_url('checkrekening/editRekeningForm/'.$d->rekening_id) ?>" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Edit Data"><i class="fas fa-edit"></i></a>
                      <button type="button" class="btn btn-danger deleteRekening" data-toggle="tooltip" data-placement="bottom" title="Delete Data" data-id="<?= $d->rekening_id; ?>" data-nama="<?= $d->rekening; ?>"><i class="fas fa-trash"></i></button>
					  <?php endif; ?>
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
		function viewdata(id) {
		$.ajax({
		url: '<?= site_url('/checkrekening/ajaxrekening') ?>',
		type: "POST",
		data: {
			rekening_id: id,
		},
		success: function (res) {
		var obj = JSON.parse(res);
		// console.log(obj);

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
					window.location.href = ("<?= site_url('checkrekening/hapusRekening/') ?>" + id);
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

</script>
</body>
</html>