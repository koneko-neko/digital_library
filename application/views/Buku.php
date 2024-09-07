<?php if($this->session->userdata('level') != 'peminjam' ){?>
<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
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
		<div class="pd-20 card-box mb-30">
			<div class="clearfix mb-20">
				<div class="pull-left">
					<h4 class="text-blue h4">Buku Table</h4>
				</div>
			</div>
			<a href="<?= base_url('buku_tambah')?>" class="btn btn-secondary md-2">Tambah</a>
			<table class="table table-bordered mt-2">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col"> Judul Buku</th>
						<th scope="col">Penulis</th>
						<th scope="col">Penerbit</th>
						<th scope="col">Kategori</th>
						<!-- <th scope="col">Th Terbit</th> -->
						<th scope="col">Stok</th>
						<th scope="col">Cover</th>
						<th scope="col">Status</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; foreach($buku as $row){?>
					<tr>
						<th scope="row"><?= $no; ?></th>
						<td scope="row"><?= $row['judul']?></td>
						<td scope="row"><?= $row['penulis']?></td>
						<td scope="row"><?= $row['penerbit']?></td>
						<td scope="row"><?= $row['nama_kategori']?></td>
						<!-- <td scope="row"><?= $row['tahun_terbit']?></td> -->
						<td scope="row"><?= $row['stok']?></td>
						<td scope="row">
							<a href="<?= base_url('assets/upload/buku/'.$row['cover'])?>">
								<img src="<?= base_url('assets/upload/buku/'.$row['cover'])?>" width="70" height="70"
									alt="">
							</a>
						</td>
						<td scope="row"><?= $row['status']?></td>
						<td scope="row">
							<a class="btn btn-danger" href="<?= base_url('buku_tambah/hapus_buku/'. $row['id_buku']); ?>"
								onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?');"><i
									class="icon-copy fi-trash"></i></a>
								<button class="btn btn-secondary" data-toggle="modal"
									data-target="#Medium-modal<?= $row['id_buku']; ?>"><i
										class="icon-copy fi-pencil"></i></button>
								<div class="modal fade" id="Medium-modal<?= $row['id_buku']; ?>" tabindex="-1"
									role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;"
									aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="myLargeModalLabel">Update Buku </h4>
												<button type="button" class="close" data-dismiss="modal"
													aria-hidden="true">×</button>
											</div>
											<div class="modal-body">
												<form action="<?= base_url('buku_tambah/update/'.$row['id_buku'])?>"
													method="post" enctype="multipart/form-data">
													<input type="hidden" name="id_buku">
													<div class="form-group">
														<label>Judul Buku</label>
														<input class="form-control" name="judul" type="text"
															placeholder="Judul Buku" value="<?= $row['judul']?>"
															required>
													</div>
													<div class="form-group">
														<label>Penulis</label>
														<input class="form-control" name="penulis" type="text"
															value="<?= $row['penulis']?>" required>
													</div>
													<div class="form-group">
														<label>Penerbit</label>
														<input class="form-control" name="penerbit" type="text"
															value="<?= $row['penerbit']?>" required>
													</div>
													<div class="form-group">
														<label>Kategori</label>
														<select
															class="custom-select2 form-control select2-hidden-accessible"
															name="id_kategori" style="width: 100%; height: 38px;"
															data-select2-id="1" tabindex="-1" aria-hidden="true">
															<?php foreach($kategori as $aa) { ?>
															<option value="<?= $aa['id_kategori']?>">
																<?= $aa['nama_kategori']?></option>
															<?php } ?>
														</select>
													</div>
													<div class="form-group">
														<label>Tahun Terbit</label>
														<input class="form-control" name="tahun_terbit" type="date"
															value="<?= $row['tahun_terbit']?>" required>
													</div>
													<div class="form-group">
														<div class="form-group">
															<label>Sipnosis</label>
															<textarea class="form-control" name="sipnosis"
																value="<?= $row['sipnosis']?>"
																required><?= $row['sipnosis']?></textarea>
														</div>
														<div class="form-group">
															<label>Stok Buku</label>
															<input type="number" class="form-control" name="stok"
																value="<?= $row['stok']?>" required>
														</div>
														<div class="form-group">
															<label>Cover</label>
															<input type="file"
																class="form-control-file form-control height-auto"
																name="cover" accept="image/png, image/jpeg" required>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary"
																data-dismiss="modal">Close</button>
															<button type="submit" class="btn btn-primary">Save
																changes</button>
														</div>
												</form>
											</div>
										</div>
									</div>
								</div>
						</td>
					</tr>
					<?php $no++; } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
<?php } ?>
<!-- dasda -->

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
						<h4>Daftar Buku </h4>
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
					<?php foreach($buku as $row){?>
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
												<h4><a href="<?= base_url('buku/detail/'.$row['id_buku'])?>"><?= $row['judul']?></a></h4>
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
														</div>
														<a class="btn btn-danger mt-2" href="<?= base_url('koleksi/add/'. $row['id_buku'])?>"><i class="icon-copy fi-bookmark"></i></a>
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
