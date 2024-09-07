<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.html">
				<img src="<?= base_url('assets/deskapp/')?>vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
				<img src="<?= base_url('assets/deskapp/')?>vendors/images/deskapp-logo-white.svg" alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">	
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<?php if ($this->session->userdata('level') != 'peminjam') { ?>
						<li>
							<a href="<?= base_url('home')?>" class="dropdown-toggle no-arrow <?php if($halaman == 'home'){ echo 'active'; } ?>">
								<span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
							</a>
						</li>
						<li>
							<a href="<?= base_url('kategori')?>" class="dropdown-toggle no-arrow <?php if($halaman == 'kategori'){ echo 'active'; } ?>">
								<span class="micon dw dw-box-1"></span><span class="mtext">Kategori</span>
							</a>
						</li>
					<?php } ?>
                    <li>
						<a href="<?= base_url('buku')?>" class="dropdown-toggle no-arrow <?php if($halaman == 'buku'){ echo 'active'; } ?>">
                            <span class="micon dw dw-book-1"></span><span class="mtext">Buku</span>
						</a>
					</li>
					<?php if ($this->session->userdata('level') == 'peminjam') { ?>
						<li>
							<a href="<?= base_url('peminjaman') ?>" class="dropdown-toggle no-arrow <?php if($halaman == 'peminjaman'){ echo 'active'; } ?>">
								<span class="micon fa fa-address-book"></span><span class="mtext">Pinjaman</span>
							</a>
						</li>
					<?php } ?>
					<?php if ($this->session->userdata('level') != 'peminjam') { ?>
						<li>
							<a href="<?= base_url('peminjaman/detail') ?>" class="dropdown-toggle no-arrow <?php if($halaman == 'peminjaman'){ echo 'active'; } ?>">
								<span class="micon fa fa-address-book"></span><span class="mtext">Detail Pinjaman</span>
							</a>
						</li>
					<?php } ?>
					<?php if ($this->session->userdata('level') == 'admin') { ?>
						<li>
							<a href="<?= base_url('user')?>" class="dropdown-toggle no-arrow <?php if($halaman == 'user'){ echo 'active'; } ?>">
								<span class="micon dw dw-user-1"></span><span class="mtext">Pengguna</span>
							</a>
						</li>
					<?php } ?>
					<?php if ($this->session->userdata('level') == 'peminjam') { ?>
					<li>
						<a href="<?= base_url('koleksi') ?>" class="dropdown-toggle no-arrow <?php if($halaman == 'koleksi'){ echo 'active'; } ?>">
							<span class="micon fa fa-bookmark"></span><span class="mtext"> Koleksi </span>
						</a>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>