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
						<h4 class="text-blue h4">Peminjaman Table</h4>
					</div>
				</div>
				<table class="table table-bordered mt-2">
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col">Judul Buku</th>
							<th scope="col">Kategori</th>
							<th scope="col"> Tanggal Pinjam </th>
							<th scope="col"> Lama Pinjam </th>
							<th scope="col">Cover</th>
							<th scope="col">Status</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach($buku as $row){?>
						<?php if($row['status'] != 'Dikembalikan'){?>
						<tr>
							<th scope="row"><?= $no; ?></th>
							<td scope="row"><?= $row['judul']?></td>
							<td scope="row"><?= $row['nama_kategori']?></td>
							<td scope="row"><?= $row['tgl_peminjaman']?></td>
							<td scope="row"><?= $row['lama_pinjam']?></td>
							<td scope="row">
								<img src="<?= base_url('assets/upload/buku/'.$row['cover'])?>" width="70" height="70"
									alt="">
							</td>
							
							<td scope="row">								
								<?php if($row['status'] == 'Dipinjam'){?>
									<p><span class="badge badge-success">Dipinjam</span></p>
								<?php } elseif($row['status'] == 'Ditolak') { ?>
									<p><span class="badge badge-danger">DItolak</span></p>
								<?php } elseif($row['status'] == 'Proses'){?>
									<p><span class="badge badge-warning">Proses</span></p>
								<?php } ?></span>
							</td>
						</tr>
						<?php } ?>
						<?php $no++; } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
