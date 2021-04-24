<?php 
if (!$this->session->has_userdata('admin')){
	redirect('site');
	exit;
}

$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$url_count = $this->uri->total_segments();
$edit = $this->uri->segment($url_count-1);
?>
<style>
	.sidebar-light .sidebar-brand {
		color: #fafafa;
		background-color: #02b0f5;
	}
</style>
<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('/dashboard'); ?>">
		<div class="sidebar-brand-icon">
			<img src="<?php //echo base_url('/assets/img/logo/logo2.png'); ?>">
		</div>
		<!-- <div class="sidebar-brand-text mx-7">BigJill Official</div> -->
	</a>
	<hr class="sidebar-divider my-0">

	<!-- Dashboard -->
	<li class="nav-item <?php if($url == site_url('/dashboard')){echo "active";} ?>">
		<a class="nav-link" href="<?php echo site_url('/dashboard'); ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
		</li>
		<hr class="sidebar-divider">

		<!-- Features -->
		<div class="sidebar-heading">
			Features
		</div>
		<!-- Menu Data Master -->
		<li class="nav-item <?php if($url == site_url('/Master_Data/ukuran') || $url == site_url('/Master_Data/ukuranForm') || $url == site_url('/Master_Data/warna')|| $url == site_url('/Master_Data/warnaForm') || $url == site_url('/Master_Data/kategori') || $url == site_url('/Master_Data/kategoriForm') || $url == site_url('/Master_Data/barang') || $url == site_url('/Master_Data/barangForm') || $url == site_url('/Master_Data/user') || $url == site_url('/Master_Data/userForm') || $edit=='editUkuranForm' || $edit=='editWarnaForm' || $edit=='editKategoriForm' || $edit=='editBarangForm' || $edit=='editUserForm' || $url == site_url('/Master_Data/lokasi') || $url == site_url('/Master_Data/lokasiForm')  || $edit=='editLokasiForm' || $url == site_url('/Master_Data/wa') || $url == site_url('/Master_Data/waForm')  || $edit=='editWAForm'){echo 'active';} ?>">

			<a class="nav-link <?php if($url == site_url('/Master_Data/ukuran') || $url == site_url('/Master_Data/ukuranForm') || $url == site_url('/Master_Data/warna')|| $url == site_url('/Master_Data/warnaForm') || $url == site_url('/Master_Data/kategori') || $url == site_url('/Master_Data/kategoriForm') || $url == site_url('/Master_Data/barang') || $url == site_url('/Master_Data/barangForm') || $url == site_url('/Master_Data/user') || $url == site_url('/Master_Data/userForm') || $edit=='editUkuranForm' || $edit=='editWarnaForm' || $edit=='editKategoriForm' || $edit=='editBarangForm' || $edit=='editUserForm' ||$url == site_url('/Master_Data/lokasi') || $url == site_url('/Master_Data/lokasiForm')  || $edit=='editLokasiForm' || $url == site_url('/Master_Data/wa') || $url == site_url('/Master_Data/waForm')  || $edit=='editWAForm'){echo 'collapsed';} ?>" href="#" data-toggle="collapse" data-target="#dataMaster" aria-expanded="true"
				aria-controls="dataMaster">
				<i class="fab fa-fw fa-wpforms"></i>
				<span>Data Master</span>
			</a>
			<div id="dataMaster" class="collapse <?php if($url == site_url('/Master_Data/ukuran') || $url == site_url('/Master_Data/ukuranForm') || $url == site_url('/Master_Data/warna') || $url == site_url('/Master_Data/warnaForm') || $url == site_url('/Master_Data/kategori') || $url == site_url('/Master_Data/kategoriForm') || $url == site_url('/Master_Data/barang') || $url == site_url('/Master_Data/barangForm') || $url == site_url('/Master_Data/user') || $url == site_url('/Master_Data/userForm') || $edit=='editUkuranForm' || $edit=='editWarnaForm' || $edit=='editKategoriForm' || $edit=='editBarangForm' || $edit=='editUserForm' || $url == site_url('/Master_Data/lokasi') || $url == site_url('/Master_Data/lokasiForm')  || $edit=='editLokasiForm' || $url == site_url('/Master_Data/wa') || $url == site_url('/Master_Data/waForm')  || $edit=='editWAForm'){echo 'show';} ?>" aria-labelledby="headingForm" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<h6 class="collapse-header">Data Master</h6>

					<a class="collapse-item <?php if($url == site_url('/Master_Data/bank') || $url == site_url('/Master_Data/bankForm')  || $edit=='editUkuranForm' ){echo 'active';} ?>" href="<?php echo site_url('/Master_Data/bank'); ?>">Bank</a>

					<a class="collapse-item <?php if($url == site_url('/Master_Data/listKonfirmasi') || $url == site_url('/Master_Data/listKonfirmasiForm') || $edit=='listKonfirmasiForm'){echo "active";} ?>" href="<?php  echo site_url('/Master_Data/listKonfirmasi'); ?>">Daftar Konfirmasi</a>

					<a class="collapse-item <?php if($url == site_url('/Master_Data/listRekening') || $url == site_url('/Master_Data/listRekeningForm') || $edit=='listRekeningForm'){echo "active";} ?>" href="<?php  echo site_url('/Master_Data/listRekening'); ?>">Daftar Rekening</a>

					<!-- <a class="collapse-item <?php // if($url == site_url('/Master_Data/kategori') || $url == site_url('/Master_Data/kategoriForm')  || $edit=='editKategoriForm' ){echo "active";} ?>" href="<?php //echo site_url('/Master_Data/kategori'); ?>">Kategori</a> -->

					<!-- <a class="collapse-item <?php //if($url == site_url('/Master_Data/barang') || $url == site_url('/Master_Data/barangForm')  || $edit=='editBarangForm'){echo "active";} ?>" href="<?php //echo site_url('/Master_Data/barang'); ?>">Barang</a> -->

					<a class="collapse-item <?php if($url == site_url('/Master_Data/user') || $url == site_url('/Master_Data/userForm')  || $edit=='editUserForm'){echo "active";} ?>" href="<?php echo site_url('/Master_Data/user'); ?>">Admin</a>

					<!-- <a class="collapse-item <?php// if($url == site_url('/Master_Data/lokasi') || $url == site_url('/Master_Data/lokasiForm')  || $edit=='editLokasiForm'){echo "active";} ?>" href="<?php //echo site_url('/Master_Data/lokasi'); ?>">Lokasi</a> -->

					<!-- <a class="collapse-item <?php //if($url == site_url('/Master_Data/wa') || $url == site_url('/Master_Data/waForm')  || $edit=='editWAForm'){echo "active";} ?>" href="<?php //echo site_url('/Master_Data/wa'); ?>">Nomor WA</a> -->
				</div>
			</div>
		</li>
		<!-- End Menu Data Master -->

		<!-- Menu Setting -->
		<hr class="sidebar-divider">
		<div class="sidebar-heading">
			Settings
		</div>

		<!-- Menu Change Password -->
		<li class="nav-item <?php if($url == site_url('/Settings/changePass')){echo "active";} ?>">
			<a class="nav-link" href="<?php echo site_url('/Settings/changePass'); ?>"> 
				<i class="fas fa-fw fa fa-cogs"></i>
				<span>Change Password</span>
			</a>
		</li>

		<hr class="sidebar-divider">
		<div class="version">Version 1.1</div>
	</ul>