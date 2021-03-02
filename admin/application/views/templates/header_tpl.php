<?php 
if (!$this->session->has_userdata('admin')){
	redirect('site');
	exit;
}
?>
<style>
	.bg-navbar {
		background-color: #02b0f5;
	}
	.dropdown-item:hover, .dropdown-item:focus {
		color: #fff;
		text-decoration: none;
		background-color: #A38871;
	}
	.toggle:hover {
      color: #fff;
      background-color: #AE8E7F;
    }

    [id^=drop]:checked + ul {
      display: block;
      background: rgba(153, 115, 97, 0.85);
      padding: 15px 0;
      text-align: center;
    }
</style>
<!-- TopBar -->
<nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">

	<!-- SideBar Toogle -->
	<button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
		<i class="fa fa-bars"></i>
	</button>
	<!-- End Sidebar Toogle -->

	<!-- Menu Profile -->
	<ul class="navbar-nav ml-auto">
		<div class="topbar-divider d-none d-sm-block"></div>
		<li class="nav-item dropdown no-arrow">
			<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<img class="img-profile rounded-circle" src="<?php echo base_url('/assets/img/boy.png'); ?>" style="max-width: 60px">
				<span class="ml-2 d-none d-lg-inline text-white small"><?php echo $this->session->userdata('admin')->nama;?></span>
			</a>
			<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
				<a class="dropdown-item" href="<?php echo site_url('/Settings/changePass'); ?>">
					<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
					Change Password
				</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="javascript:void(0);" onclick="logout()">
					<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
					Logout
				</a>
			</div>
		</li>
	</ul>
	<!-- End Menu Profile -->

</nav>
<!-- End Topbar -->