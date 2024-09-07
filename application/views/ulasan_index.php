<?php if($this->session->userdata('role') != 'peminjam'){ ?>
<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="pd-20 card-box mb-30">
				<div class="clearfix mb-20">
					<div class="pull-left">
						<h4 class="text-blue h4">Ulasan Table</h4>
					</div>
				</div>
				<table class="table table-bordered mt-2">
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col">Username</th>
							<th scope="col">Judul Buku</th>
							<th scope="col">Cover</th>
							<th scope="col">Ulasan</th>
							<th scope="col">Rating</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach($ulasan as $row){?>
						<tr>
							<th scope="row"><?= $no; ?></th>
							<td scope="row"><?= $row['username']?></td>
							<td scope="row"><?= $row['judul']?></td>
							<td scope="row">
								<a href="<?= base_url('assets/upload/buku/'.$row['cover'])?>">
									<img src="<?= base_url('assets/upload/buku/'.$row['cover'])?>" width="70" height="70" alt="">
								</a>
							</td>
							<td scope="row"><?= $row['ulasan']?></td>
							<td scope="row"><?= $row['rating']?></td>
							<td scope="row">
								<a class="btn btn-primary" href="<?= base_url('ulasan_tambah/hapus_ulasan/'. $row['id_ulasan']); ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">Hapus</a>
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

<?php if($this->session->userdata('role') == 'peminjam'){ ?>
<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="pd-20 card-box mb-30">
				<div class="clearfix mb-20">
					<div class="pull-left">
						<h4 class="text-blue h4">Ulasan Table</h4>
					</div>
				</div>
				<table class="table table-bordered mt-2">
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col">Judul Buku</th>
							<th scope="col">Cover</th>
							<th scope="col">Ulasan</th>
							<th scope="col">Rating</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach($ulasan as $row){?>
						<tr>
							<th scope="row"><?= $no; ?></th>
							<td scope="row"><?= $row['judul']?></td>
							<td scope="row">
								<a href="<?= base_url('assets/upload/buku/'.$row['cover'])?>">
									<img src="<?= base_url('assets/upload/buku/'.$row['cover'])?>" width="70" height="70" alt="">
								</a>
							</td>
							<td scope="row"><?= $row['ulasan']?></td>
							<td scope="row"><?= $row['rating']?></td>
							<td scope="row">
								<a class="btn btn-primary" href="<?= base_url('ulasan_tambah/hapus_ulasan/'. $row['id_ulasan']); ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">Hapus</a>
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