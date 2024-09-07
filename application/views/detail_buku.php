<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="title">
							<h4>Buku Detail</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.html">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Buku Detail</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
			<div class="product-wrap">
				<div class="product-detail-wrap mb-30">
					<div class="product-detail-desc pd-20 card-box height-100-p">
						<div class="row">
							<div class="col-lg-6 col-md-12 col-sm-12">
								<div class="slick-list draggable">
									<div class="slick-track" style="opacity: 1;">
										<div class="product-slide slick-slide slick-current slick-active"
											data-slick-index="0" aria-hidden="false"
											style="width: 401px; left: 0px; top: 0px; z-index: 999; opacity: 1;"
											tabindex="0">
											<img src="<?= base_url('assets/upload/buku/'.$buku->cover)?>" alt="">
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-12 col-sm-12">
								<h3 class="mb-20 pt-20"><?= $buku->judul; ?></h3>
								<label for="">Sipnosis : </label>
								<p><?= $buku->sipnosis; ?></p>
								<hr>
								<div class="price">
									<div>
										<label>Kategori : </label>
										<h6><?= $buku->nama_kategori; ?></h6>
										<hr>
										<label for="">Penulis : </label>
										<h6><?= $buku->penulis; ?></h6>
										<hr>
										<label for="">Penerbit : </label>
										<h6><?= $buku->penerbit; ?></h6>
										<hr>
										<label for="">Tahun Terbit : </label>
										<h6><?= $buku->tahun_terbit; ?></h6>
									</div>
								</div>
								<div class="mx-w-150">
									<div class="form-group">
										<label class="text-blue">Stok Buku : </label>
										<span><?= $buku->stok; ?></span>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-6">
										<?php if($buku->stok != 0) { ?>
											<button class="btn btn-primary btn-block md-2" data-toggle="modal"
											data-target="#Medium-modal<?= $buku->id_buku; ?>">Pinjam Buku</button>
										<?php } elseif($buku->stok == 0){ ?>
											<button class="btn btn-primary btn-block md-2"<?= $buku->id_buku; ?>">Stok Habis</button>
										<?php } ?>
										<div class="modal fade" id="Medium-modal<?= $buku->id_buku; ?>" tabindex="-1"
											role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;"
											aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title" id="myLargeModalLabel"> Form Pinjam
														</h4>
														<button type="button" class="close" data-dismiss="modal"
															aria-hidden="true">×</button>
													</div>
													<div class="modal-body">
														<form action="<?= base_url('peminjaman/add/' . $buku->id_buku)?>" method="post">
															<input type="hidden" name="id_user" id="">
															<div class="form-group">
																<label>Tanggal Mengembalikan Buku</label>
																<input class="form-control" type="date"
																	name="lama_pinjam" placeholder="lama_pinjam">
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
									</div>
									<div class="col-md-6 col-6">
										<a href="<?= base_url('buku')?>"
											class="btn btn-outline-primary btn-block">Kembali</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="bg-white border-radius-4 box-shadow mb-30">
				<div class="row no-gutters">
					<div class="col-lg-12 col-md-8 col-sm-12">
						<div class="chat-detail">
							<div class="chat-profile-header clearfix">
								<div class="left">
									<div class="clearfix">
										<div class="chat-profile-name">
											<h3>Ulasan</h3>
										</div>
									</div>
								</div>
							</div>
							<div class="chat-box">
								<div class="chat-desc customscroll mCustomScrollbar _mCS_5">
									<div id="mCSB_5" class="mCustomScrollBox mCS-dark-2 mCSB_vertical mCSB_inside"
										tabindex="0" style="max-height: none;">
										<div id="mCSB_5_container" class="mCSB_container"
											style="position: relative; top: 0px; left: 0px;" dir="ltr">
											<ul>
												<?php $no=1; foreach($ulasan as $row){?>
												<li class="clearfix">
													<span class="chat-img">
														<img src="<?= base_url('assets/deskapp/')?>vendors/images/chat-img1.jpg" alt=""
															class="mCS_img_loaded">
													</span>
													<div class="chat-body clearfix">
														<label for=""><?= $row['nama_lengkap']?></label>
														<p><?= $row['ulasan']?></p>
														<small>Ratting : <?= $row['rating']?></small>
													</div>
												</li>
												<?php $no++; } ?>
											</ul>
										</div>
										<div id="mCSB_5_scrollbar_vertical"
											class="mCSB_scrollTools mCSB_5_scrollbar mCS-dark-2 mCSB_scrollTools_vertical mCSB_scrollTools_onDrag_expand"
											style="display: block;">
											<div class="mCSB_draggerContainer">
												<div id="mCSB_5_dragger_vertical" class="mCSB_dragger"
													style="position: absolute; min-height: 30px; display: block; height: 147px; max-height: 474.594px; top: 0px;">
													<div class="mCSB_dragger_bar" style="line-height: 30px;"></div>
												</div>	
												<div class="mCSB_draggerRail"></div>
											</div>
										</div>
									</div>
								</div>
								<form action="<?= base_url('ulasan/tambah_ulasan/'. $buku->id_buku )?>" method="post">
								<div class="chat-footer">
									<div class="file-upload">
										<a>
											<select name="rating" required>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
											</select>
										</a>	
									</div>
									<div class="chat_text_area">
										<textarea placeholder="Isikan Ulasan" name="ulasan" required></textarea>
									</div>
									<div class="chat_send">
										<button class="btn btn-link" type="submit">
											<i class="icon-copy ion-paper-airplane"></i>
										</button>
									</div>
								</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
