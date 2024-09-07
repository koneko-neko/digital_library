<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="pd-20 card-box mb-30">
				<div class="clearfix mb-20">
					<div class="pull-left">
						<h4 class="text-blue h4">Buku Table</h4>
					</div>
				</div>
                <form action="<?= base_url('buku_tambah/add')?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Judul Buku</label>
                        <input class="form-control" name="judul" type="text" placeholder="Judul Buku" required>
                    </div>
                    <div class="form-group">
                        <label>Penulis</label>
                        <input class="form-control" name="penulis" type="text" required>
                    </div>
                    <div class="form-group">
                        <label>Penerbit</label>
                        <input class="form-control" name="penerbit" type="text" required>
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="custom-select2 form-control select2-hidden-accessible" name="id_kategori" style="width: 100%; height: 38px;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <?php $no=1; foreach($kategori as $aa) { ?>
							<option value="<?= $aa['id_kategori']?>"><?= $aa['nama_kategori']?></option>
							<?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tahun Terbit</label>
                        <input class="form-control" name="tahun_terbit" type="date" required>
                    </div>
                    <div class="form-group">
                    <div class="form-group">
                        <label>Sipnosis</label>
                        <textarea class="form-control" name="sipnosis" required></textarea >
                    </div>
                    <div class="form-group">
                        <label>Stok Buku</label>
                        <input type="number" class="form-control" name="stok" required/>
                    </div>
                    <div class="form-group">
                        <label>Cover</label>
                        <input type="file" class="form-control-file form-control height-auto" name="cover" accept="image/png, image/jpeg" required> 
                    </div>
                    <a href="<?= base_url('buku')?>" class="btn btn-secondary" data-dismiss="modal">Close</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
			</div>
		</div>
	</div>
</div>