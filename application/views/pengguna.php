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
					<h4 class="text-blue h4">User Table</h4>
				</div>
			</div>
			<button class="btn btn-secondary md-2" data-toggle="modal" data-target="#Medium-modal">Tambah</button>
			<div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
				style="display: none;" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myLargeModalLabel">Pengguna Tambah </h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						</div>
						<div class="modal-body">
							<form action="<?= base_url('user/tambah_user')?>" method="post">
								<div class="input-group custom">
									<input type="text" class="form-control form-control-lg" name="username"
										placeholder="Username">
									<div class="input-group-append custom">
										<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
									</div>
								</div>
								<div class="input-group custom">
									<input type="text" class="form-control form-control-lg" name="nama_lengkap"
										placeholder="Nama Lengkap">
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
									<input type="text" class="form-control form-control-lg" name="alamat"
										placeholder="Alamat">
									<div class="input-group-append custom">
										<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
									</div>
								</div>
								<div class="input-group custom">
									<input type="password" class="form-control form-control-lg" name="password"
										placeholder="**********">
									<div class="input-group-append custom">
										<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
									</div>
								</div>
								<div class="input-group custom">
									<select class="custom-select form-control" name="level">
										<option value="admin">Admin</option>
										<option value="petugas">Petugas</option>
									</select>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="input-group mb-2">
											<button type="submit" class="btn btn-primary btn-lg btn-block">
												Daftar</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<table class="table table-bordered mt-2">
				<thead>
					<tr>
						<th scope="col"> No </th>
						<th scope="col"> Username </th>
						<th scope="col"> Nama </th>
						<th scope="col"> Email </th>
						<th scope="col"> Alamat </th>
						<th scope="col"> No Hp </th>
						<th scope="col"> level </th>
						<th scope="col"> Aksi </th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; foreach($user as $row){?>
					<tr>
						<th scope="row"><?= $no; ?></th>
						<td scope="row"><?= $row['username']; ?></td>
						<td scope="row"><?= $row['nama_lengkap']; ?></td>
						<td scope="row"><?= $row['email']; ?></td>
						<td scope="row"><?= $row['alamat']; ?></td>
						<td scope="row"><?= $row['no_telp']; ?></td>
						<td scope="row"><span><?= $row['level']; ?></span></td>
						<td scope="row">
							<a class="btn btn-danger" onclick="return confirm('Apakah anda yakin ?');"
								href="<?= base_url('user/hapus/'.$row['id_user'])?>"><i class="icon-copy fi-trash"></i></a>
							<button class="btn btn-secondary md-2" data-toggle="modal"
								data-target="#Medium-modal<?=$row['id_user']?>"><i class="icon-copy fi-pencil"></i></button>
							<div class="modal fade" id="Medium-modal<?=$row['id_user']?>" tabindex="-1" role="dialog"
								aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myLargeModalLabel">Edit User </h4>
											<button type="button" class="close" data-dismiss="modal"
												aria-hidden="true">×</button>
										</div>
										<div class="modal-body">
											<form action="<?= base_url('user/update/'.$row['id_user'])?>" method="post">
												<input type="hidden" name="id_user">
												<div class="input-group custom">
													<input type="text" class="form-control form-control-lg"
														name="nama_lengkap" value="<?=$row['username']?>" readonly>
													<div class="input-group-append custom">
														<span class="input-group-text"><i
																class="icon-copy dw dw-user1"></i></span>
													</div>
												</div>
												<div class="input-group custom">
													<input type="text" class="form-control form-control-lg"
														name="nama_lengkap" value="<?=$row['nama_lengkap']?>">
													<div class="input-group-append custom">
														<span class="input-group-text"><i
																class="icon-copy dw dw-user1"></i></span>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<input type="email" class="form-control" name="email"
																value="<?=$row['email']?>">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<input type="text" class="form-control" name="no_telp"
																 value="<?=$row['no_telp']?>">
														</div>
													</div>
												</div>
												<div class="input-group custom">
													<input type="text" class="form-control form-control-lg"
														name="alamat" value="<?=$row['alamat']?>">
													<div class="input-group-append custom">
														<span class="input-group-text"><i
																class="icon-copy dw dw-user1"></i></span>
													</div>
												</div>
												<div class="input-group custom">
													<select class="custom-select form-control" name="level">
														<option value="admin">Admin</option>
														<option value="petugas">Petugas</option>
													</select>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="input-group mb-2">
															<button type="submit"
																class="btn btn-primary btn-lg btn-block">
																Update</button>
														</div>
													</div>
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
