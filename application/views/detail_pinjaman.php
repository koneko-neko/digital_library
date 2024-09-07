
<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="pd-20 card-box mb-30">
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
				<div class="clearfix mb-20">
					<div class="pull-left">
						<h4 class="text-blue h4">Peminjaman Table</h4>
						<a href="<?= base_url('laporanDompdf')?>" class="btn btn-primary md-2">Pdf</a>
					</div>
				</div>
				<table class="table table-bordered mt-2">
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col">Nama Peminjam</th>
							<th scope="col">Judul Buku</th>
							<!-- <th scope="col">Kategori</th> -->
							<th scope="col"> Tanggal Pinjam </th>
							<th scope="col"> Tanggat Pinjam</th>
							<th scope="col"> Tanggal Dikembalikan </th>
							<th scope="col">Cover</th>
							<th scope="col">Status</th>
							<th scope="col">Opsi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach($peminjaman as $row){?>
						<tr>
							<th scope="row"><?= $no; ?></th>
							<td scope="row"><?= $row['nama_lengkap']?></td>
							<td scope="row"><?= $row['judul']?></td>
							<!-- <td scope="row"><?= $row['nama_kategori']?></td> -->
							<td scope="row"><?= $row['tgl_peminjaman']?></td>
							<td scope="row"><?= $row['lama_pinjam']?></td>
							<td scope="row"><?= $row['tgl_pengembalian']?></td>
							<td scope="row">
								<img src="<?= base_url('assets/upload/buku/'.$row['cover'])?>" width="70" height="70" alt="">
							</td>
							<td scope="row">
								<?php if($row['status'] == 'Dipinjam'){?>
									<p><span class="badge badge-warning">Dipinjam</span></p>
								<?php } elseif($row['status'] == 'Dikembalikan') { ?>
									<p><span class="badge badge-success">Dikembalikan</span></p>
								<?php } elseif($row['status'] == 'Proses'){?>
									<p><span class="badge badge-primary">Proses</span></p>
								<?php } elseif($row['status'] == 'Ditolak'){?>
									<p><span class="badge badge-danger">Ditolak</span></p>
								<?php } ?>
							</td>
							<td scope="row">
								<?php if($row['status'] == 'Dipinjam'){?>
									<a class="btn btn-primary" href="<?=  base_url('peminjaman/pengembalian/'. $row['id_peminjaman'] )?>" onclick="return confirm('Apakah anda yakin ?');">Return</a>
								<?php } elseif($row['status'] == 'Proses'){ ?>
									<a class="btn btn-success" href="<?=  base_url('peminjaman/setuju/'. $row['id_peminjaman'] )?>" onclick="return confirm('Apakah anda yakin ?');">Setujui</a>
									<a class="btn btn-danger mt-2" href="<?=  base_url('peminjaman/tolak/'. $row['id_peminjaman'] )?>" onclick="return confirm('Apakah anda yakin ?');">Tolak</a>
								<?php } ?>
							</td>
						</tr>
						<?php $no++; } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>