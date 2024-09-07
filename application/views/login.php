<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180"
		href="<?= base_url('assets/deskapp/')?>vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32"
		href="<?= base_url('assets/deskapp/')?>vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16"
		href="<?= base_url('assets/deskapp/')?>vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&amp;display=swap"
		rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/deskapp/')?>vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/deskapp/')?>vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/deskapp/')?>vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');

	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
</head>

<body class="login-page">
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
					<img src="<?= base_url('assets/deskapp/')?>vendors/images/login-page-img.png" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Login ^_^</h2>
						</div>
						<form action="<?= base_url('auth/login')?>" method="post">
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg" placeholder="Username" name="username" required>
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="password" class="form-control form-control-lg" name="password" placeholder="**********" required>
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<button type="submit" class="btn btn-primary btn-lg btn-block">Sign In</button>
									</div>
									<div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373"
										style="color: rgb(112, 115, 115);">OR</div>
									<div class="input-group mb-2">
										<a class="btn btn-outline-primary btn-lg btn-block"
											href="<?= base_url('register')?>">Register To Create Account</a>
									</div>
									<?php if($this->session->flashdata('notif')): ?>
										<div id="hilang" class="alert alert-success alert-dismissible fade show" role="alert">
											<?php echo $this->session->flashdata('notif'); ?>
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">×</span>
											</button>
										</div>
										</div>
									<?php endif; ?>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="<?= base_url('assets/deskapp/')?>vendors/scripts/core.js"></script>
	<script src="<?= base_url('assets/deskapp/')?>vendors/scripts/script.min.js"></script>
	<script src="<?= base_url('assets/deskapp/')?>vendors/scripts/process.js"></script>
	<script src="<?= base_url('assets/deskapp/')?>vendors/scripts/layout-settings.js"></script>
	<script>
		$('#hilang').delay('slow').slideDown('slow').delay(2500).slideUp(500);
	</script>

</body>

</html>
