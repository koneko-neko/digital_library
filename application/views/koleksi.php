<?php if($this->session->userdata('level') == 'peminjam' ){?>
<div class="main-container">
	<div class="pd-ltr-20 height-100-p xs-pd-20-10">
		<?php if($this->session->flashdata('notif')): ?>
		<div id="hilang" class="alert alert-success alert-dismissible fade show" role="alert">
			<?php echo $this->session->flashdata('notif'); ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
		</div>
	</div>
	<script>
		$('#hilang').delay('slow').slideDown('slow').delay(2500).slideUp(500);

	</script>
	<?php endif; ?>
		<div class="min-height-200px">
		<div class="page-header">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="title">
						<h4>Daftar Koleksi </h4>
					</div>
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb">
							<li class="breadcrumb-item active" aria-current="page">Novel | Sejarah | Komik</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
		<div class="blog-wrap">
			<div class="container pd-0">
				<div class="row">
					<?php foreach($koleksi as $row){?>  
					<div class="col-md-4 col-sm-12">
						<div class="blog-list">
							<ul>
								<li>
									<div class="row no-gutters">
										<div class="col-lg-7 col-md-12 col-sm-12">
											<div class="blog-img"
												style="background: url(&quot;vendors/images/img2.jpg&quot;) center center no-repeat;">
												<img src="<?= base_url('assets/upload/buku/'.$row['cover'])?>" alt=""
													class="bg_img" style="display: none;">
												<div class="da-overlay">
													<div class="da-social">
														<?php if($row['status'] == 'tersedia'){?>
														<h5 style="text-transform: uppercase;"
															class="mb-10 color-white pd-20"><span
																class="badge badge-primary"><?= $row['status']?></span>
														</h5>
														<?php } elseif($row['status'] == 'kosong' ){ ?>
															<h5 style="text-transform: uppercase;"
															class="mb-10 color-white pd-20"><span
																class="badge badge-warning"><?= $row['status']?></span>
														</h5>
														<?php } ?>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-5 col-md-12 col-sm-12">
											<div class="blog-caption">
												<h4><a href="<?= base_url('Koleksi/detail/'.$row['id_buku'])?>"><?= $row['judul']?></a></h4>
												<div class="blog-by">
													<small><label for="">Genre:</label></small>
													<small><?= $row['nama_kategori']?></small>
													<small><label for="">Penulis:</label></small>
													<small><?= $row['penulis']?></small>
													<small><label for="">Penerbit:</label></small>
													<small><?= $row['penerbit']?></small>
													<div class="pt-10">
														<a href="<?= base_url('buku/detail/'. $row['id_buku'])?>"
															style="" class="btn btn-outline-primary mt-3">Lihat</a>
															<a class="btn btn-danger mt-2" href="<?= base_url('koleksi/hapus/'. $row['id_koleksi'])?>" onclick="return confirm('Apakah anda yakin ?');"><i class="icon-copy fi-trash"></i></a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<?php } ?>
