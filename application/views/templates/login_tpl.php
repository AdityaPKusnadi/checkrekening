<?php 
if ($this->session->has_userdata('admin')){
	redirect('dashboard');
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
	<meta name="author" content="Marcellino" />

	<title>Login Aplikasi</title>

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
										<h1 class="h4 text-gray-900 mb-4">Login Aplikasi</h1>
										<hr>
									</div>

									<!-- Alert jika gagal login -->
									<?php if ($this->session->flashdata('status') == 'failed'): ?>
										<div class="alert alert-danger alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>		
											<span>Username atau Password Salah</span>
										</div>
									<?php endif; ?>

									<?php if ($this->session->flashdata('status') == 'daftarsuccess'): ?>
										<div class="alert alert-success alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>		
											<span>Berhasil Daftar</span>
										</div>
										<?php endif; ?>

										<form class="user" action="<?php echo site_url('/checkrekening/loginuser'); ?>" method="post">
											<div class="form-group">
												<input type="text" id="username" name="username" class="form-control" placeholder="Username atau Email" value="<?php if(isset($_COOKIE["admin_loginbl"])) { echo $_COOKIE["admin_loginbl"]; } ?>" <?php if(!isset($_COOKIE["admin_loginbl"])) { echo "autofocus"; } ?> required>
											</div>
											<div class="form-group">
												<input type="password" id="password" name="password" class="form-control" placeholder="Password" <?php if(isset($_COOKIE["admin_loginbl"])) { echo "autofocus"; } ?> required>
											</div>
											<p>Belum Punya Akun? <a href="<?= site_url('/checkrekening/signup') ?>">Daftar Sekarang!</a></p>
											<div class="form-group">
												<div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
													<input type="checkbox" class="custom-control-input" id="remember" name="remember" <?php if(isset($_COOKIE["admin_loginbl"])) { echo "checked"; } ?>>
													<label class="custom-control-label" for="remember">Remember
													Me</label>
												</div>
											</div>
											<div class="form-group">
												<input class="btn btn-info btn-block" type="submit" value="Log In" style="">
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
	</html>