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
						<h4 class="text-blue h4">Kategori table</h4>
					</div>
				</div>
                <button class="btn btn-secondary md-2" data-toggle="modal" data-target="#Medium-modal">Tambah</button>
				<div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="myLargeModalLabel">Kategori Tambah </h4>
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							</div>
							<div class="modal-body">
								<form action="<?= base_url('kategori/simpan')?>" method="post">
									<div class="form-group">
										<label>Nama Kategori</label>
										<input class="form-control" type="text" name="nama_kategori" placeholder="nama kategori" required>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary">Save changes</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<table class="table table-bordered mt-2">
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col">Nama Kategori</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
                        <?php $no=1; foreach($kategori as $row){?>
						<tr>
							<th scope="row"><?= $no; ?></th>
							<td scope="row"><?= $row['nama_kategori'];?></td>
							<td>
                                <a class="btn btn-danger" onclick="return confirm('Apakah anda yakin ?');" href="<?=base_url('kategori/hapus/'.$row['id_kategori'])?>"><i class="icon-copy fi-trash"></i></a>
                                <button class="btn btn-secondary" data-toggle="modal" data-target="#Medium-modal<?= $row['id_kategori']?>"><i class="icon-copy fi-pencil"></i></button>
								<div class="modal fade" id="Medium-modal<?= $row['id_kategori']?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="myLargeModalLabel">Edit <?= $row['nama_kategori']?></h4>
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
											</div>
											<div class="modal-body">
												<form action="<?= base_url('kategori/update/'.$row['id_kategori'])?>" method="post">
													<input type="hidden" name="id_kategori">
													<div class="form-group">
														<label>Nama Kategori</label>
														<input class="form-control" type="text" name="nama_kategori" placeholder="nama kategori" required>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														<button type="submit" class="btn btn-primary">Save changes</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
                            </td>
						</tr>
						<?php $no++; }?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>