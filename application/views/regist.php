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
					<img src="<?= base_url('assets/deskapp/')?>vendors/images/register-page-img.png" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary"> Registrasi Account </h2>
						</div>
						<form action="<?= base_url('register/daftar')?>" method="post">
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg" name="username" placeholder="Username">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg" name="nama_lengkap" placeholder="Nama Lengkap">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="no_telp" placeholder="No Hp">
                                    </div>
                                </div>
                            </div>
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg" name="alamat" placeholder="Alamat">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="password" class="form-control form-control-lg" name="password" placeholder="**********">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-2">
										<button type="submit" class="btn btn-primary btn-lg btn-block"> Daftar</button>
									</div>
									<div class="input-group mb-0">
										<a class="btn btn-outline-primary btn-lg btn-block"
											href="<?= base_url('auth')?>">Login</a>
									</div>
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

</body>

</html>
