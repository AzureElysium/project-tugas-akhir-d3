<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>DJ Resto | Kelola Produk Makanan</title>

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/media/css/style-liberty.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/media/sweetalert2-9.10.12/dist/sweetalert2.css">

	<!-- Script -->
	<script type="text/javascript" src="<?php echo base_url()?>/media/sweetalert2-9.10.12/dist/sweetalert2.all.js"></script>

	<!-- Font -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/media/css/font-google.css">

	<!-- Icon -->
	<link rel="icon" type="image/png" href="<?php echo base_url()?>/media/icons/cashier_icon.png">
</head>
<body>
	<div class="se-pre-con"></div>

	<section>
		<!-- Menu -->
		<div class="sidebar-menu sticky-sidebar-menu">
			<div class="logo">
				<h1><a href="index.php">DJ Resto</a></h1>
			</div>

			<div class="sidebar-menu-inner">
				<ul class="nav nav-pills nav-stacked custom-nav">
					<li><a href="index.php"><i class="fa fa-tachometer"></i><span> Beranda</span></a></li>

					<li><a href="data_akun.php"><i class="fa fa-users"></i> <span>Kelola Akun</span></a></li>

					<li><a href="data_meja.php"><i class="fa fa-table"></i> <span>Kelola Meja</span></a></li>

					<li class="menu-list">
						<a href="#"><i class="fa fa-cubes"></i><span>Kelola Bahan Baku <i class="lnr lnr-chevron-right"></i></span></a>
						<ul class="sub-menu-list">
							<li><a href="data_supp.php">Data Supplier</a></li>
							<li><a href="data_bb.php">Data Bahan Baku</a></li>
							<li><a href="pembelian_bb.php">Pembelian Bahan Baku</a></li>
						</ul>
					</li>

					<li class="menu-list">
						<a href="#"><i class="fa fa-cutlery"></i><span>Kelola Produk <i class="lnr lnr-chevron-right"></i></span></a>
						<ul class="sub-menu-list">
							<li><a href="produk_makanan.php">Makanan</a></li>
							<li><a href="produk_minuman.php">Minuman</a></li>
						</ul>
					</li>

					<li class="menu-list">
						<a href="#"><i class="fa fa-money"></i><span>Laporan <i class="lnr lnr-chevron-right"></i></span></a>
						<ul class="sub-menu-list">
							<li><a href="trans_penjualan.php">Total Penjualan</a></li>
							<li><a href="pen_produk.php">Penjualan Produk</a></li>
							<li><a href="bbkeluar.php">Bahan Baku Keluar</a></li>
						</ul>
					</li>
				</ul>

				<div class="footer-enhanced text-center">
					<p>© 2020 Aplikasi Penjualan</p>
				</div>
			</div>
		</div>
		<!-- End Menu -->

		<!-- Header -->
		<div class="header sticky-header">
			<div class="menu-right">
				<div class="navbar user-panel-top">
					<!-- Tanggal & Waktu -->
					<div class="clock-logo">
						<i class="fa fa-calendar"></i>&nbsp;
						<span>
							<?php
								function tgl_indo($tanggal) {
									$bulan = array(
										1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
									);
									$pecahkan = explode('-', $tanggal);

									return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
								}
								date_default_timezone_set('Asia/Jakarta');
								echo tgl_indo(date('Y-m-d'));
							?>
						</span>
					</div>

					<div class="clock-logo ml-2">
						<i class="fa fa-clock-o"></i>&nbsp;
						<span class="jam"></span><span> WIB</span>
						<script type="text/javascript">
							function jam() {
								var time = new Date(),
									hours = time.getHours(),
									minutes = time.getMinutes(),
									seconds = time.getSeconds();

								document.querySelectorAll('.jam')[0].innerHTML = harold(hours) + ":" + harold(minutes) + ":" + harold(seconds);

								function harold(standIn) {
									if(standIn < 10) {
										standIn = '0' + standIn
									}
									return standIn;
								}
							}
							setInterval(jam, 1000);
						</script>
					</div>
					<!-- End Tanggal & Waktu -->

					<!-- Profil -->
					<div class="user-dropdown-details d-flex">
						<div class="profile_details">
							<ul>
								<li class="dropdown profile_details_drop">
									<?php $user = mysqli_fetch_object($data1); ?>
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" id="dropdownMenu1" aria-haspopup="true" aria-expanded="false">
										<div class="profile_img">
											<img src="<?php echo base_url()?>/media/img/<?php echo $user->file?>" class="rounded-circle" alt="">
										</div>
									</a>

									<ul class="dropdown-menu drp-mnu" aria-labelledby="dropdownMenu1">
										<li class="user-info">
											<center><h5 class="user-name"><?php echo $username?></h5>
											<span class="status"><?php echo $level==1?'(Pengelola)':'(Kasir)'?></span></center>
										</li>
										<li><a href="#modal_infoProfil" data-toggle="modal"><i class="lnr lnr-user"></i> Info Profil</a></li>
										<li class="logout"><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
					<!-- End Profil -->
				</div>
			</div>
		</div>
		<!-- End Header -->

		<!-- Main Body -->
		<div class="main-content">
			<div class="container-fluid content-top-gap">
				<!-- Breadcrumb -->
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb my-breadcrumb">
						<li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
						<li class="breadcrumb-item"><a href="#">Kelola Produk</a></li>
						<li class="breadcrumb-item active" aria-current="page">Makanan</li>
					</ol>
				</nav>
				<!-- End Breadcrumb -->

				<!-- Tabel Makanan -->
				<div class="accordions pt-3">
					<div class="row">
						<div class="col-lg-12">
							<div class="card card_border border-primary-top">
								<div class="card-header chart-grid__header">
									Tabel Produk Makanan
								</div>

								<div class="card-body">
									<a href="tambah_produkMakanan.php" class="btn btn-primary text-light mb-3"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah Makanan</a>

									<div class="card card_border border-top shadow p-3">
										<div class="table-responsive">
											<table id="table_infoMakanan" class="display" style="width: 100%;">
												<thead>
													<tr>
														<th>Nama Makanan</th>
														<th>Kode Produk</th>
														<th>Kategori Produk</th>
														<th>Harga Satuan</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php while($makanan = mysqli_fetch_object($data2)) { ?>
														<tr>
															<td><?php echo $makanan->nama_produk?></td>
															<td><span class="badge badge-success"><?php echo $makanan->kd_produk?></span></td>
															<td><?php echo $makanan->kategori_produk?></td>
															<td><?php echo rupiah($makanan->harga)?></td>
															<td>
																<a href="ubah_produkMakanan.php?kd_produk=<?php echo $makanan->kd_produk?>" class="btn btn-warning text-light mr-2"><i class="fa fa-pencil"></i></a>
																<a href="hapus_produkMakanan.php?kd_produk=<?php echo $makanan->kd_produk?>" class="btn btn-danger text-light btnHapus" data-nama="<?php echo $makanan->nama_produk?>"><i class="fa fa-trash"></i></a>
															</td>
														</tr>
													<?php } ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End Tabel Makanan -->

				<!-- Modal Hapus Makanan -->
				<div class="modal fade modalMakanan" tabindex="-1" role="dialog" aria-labelledby="HapusMakanan" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-tittle">Konfirmasi</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>

							<div class="modal-body">
								Apakah Anda ingin menghapus makanan <b id="nama"></b> ?
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-warning text-light btnYa">Ya</button>
								<button type="button" class="btn btn-success text-light" data-dismiss="modal">Tidak</button>
							</div>
						</div>
					</div>
				</div>
				<!-- End Hapus Makanan -->

				<!-- Modal Info Profil -->
				<div class="modal fade" id="modal_infoProfil" tabindex="-1" role="dialog" aria-labelledby="InfoProfil" aria-hidden="true">
					<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-tittle" id="InfoProfil">Info Profil</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>

							<div class="modal-body text-center">
								<div class="card text-center card_border py-1">
									<div class="card-body">
										<img class="rounded-circle" src="<?php echo base_url()?>/media/img/<?php echo $user->file?>" alt="" width="115" height="115">
										<h5 class="card__title mb-3 mt-2"><?php echo @$user->nama?></h5>
													
										<div class="table-responsive">
											<table class="table table-sm text-left">
												<tr>
													<td><p>No.&nbsp;KTP</p></td>
													<td><p>&nbsp;:&nbsp;</p></td>
													<td><p><b><?php echo @$user->no_ktp?></b></p></td>
												</tr>
												<tr>
													<td><p>Jenis&nbsp;Kelamin</p></td>
													<td><p>&nbsp;:&nbsp;</p></td>
													<td><p><b><?php echo @$user->jk?></b></p></td>
												</tr>
												<tr>
													<td><p>Agama</p></td>
													<td><p>&nbsp;:&nbsp;</p></td>
													<td><p><b><?php echo @$user->agama?></b></p></td>
												</tr>
												<tr>
													<td><p>Tempat&nbsp;Lahir</p></td>
													<td><p>&nbsp;:&nbsp;</p></td>
													<td><p><b><?php echo @$user->tempat_lahir?></b></p></td>
												</tr>
												<tr>
													<td><p>Tanggal&nbsp;Lahir</p></td>
													<td><p>&nbsp;:&nbsp;</p></td>
													<td><p><b><?php echo date("d-m-Y", strtotime(@$user->tgl_lahir))?></b></p></td>
												</tr>
												<tr>
													<td><p>Alamat</p></td>
													<td><p>&nbsp;:&nbsp;</p></td>
													<td><p><b><?php echo @$user->alamat?></b></p></td>
												</tr>
												<tr>
													<td><p>E-mail</p></td>
													<td><p>&nbsp;:&nbsp;</p></td>
													<td><p><b><?php echo @$user->email?></b></p></td>
												</tr>
												<tr style="">
													<td><p>No.&nbsp;HP</p></td>
													<td><p>&nbsp;:&nbsp;</p></td>
													<td><p><b><?php echo @$user->no_hp?></b></p></td>
												</tr>
											</table>
										</div>
									</div>
								</div>
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
							</div>
						</div>
					</div>
				</div>
				<!-- End Modal -->
			</div>
		</div>
		<!-- End Main Body -->
	</section>

	<!-- Move Top -->
	<button onclick="topFunction()" id="movetop" class="bg-primary" title="Ke Atas!">
		<span class="fa fa-angle-up"></span>
	</button>
	<script type="text/javascript">
		window.onscroll = function() {
			scrollFunction()
		}

		function scrollFunction() {
			if(document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
				document.getElementById("movetop").style.display = "block";
			} else {
				document.getElementById("movetop").style.display = "none";
			}
		}

		function topFunction() {
			document.body.scrollTop = 0;
			document.documentElement.scrollTop = 0;
		}
	</script>
	<!-- End Move Top -->

	<script type="text/javascript" src="<?php echo base_url()?>/media/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>/media/js/jquery-1.10.2.min.js"></script>

	<!-- Chart JS -->
	<script type="text/javascript" src="<?php echo base_url()?>/media/js/Chart.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>/media/js/utils.js"></script>

	<!-- Different Scripts of Charts. Ex. Barchart, Linechart -->
	<script type="text/javascript" src="<?php echo base_url()?>/media/js/bar.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>/media/js/linechart.js"></script>

	<script type="text/javascript" src="<?php echo base_url()?>/media/js/jquery.nicescroll.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>/media/js/scripts.js"></script>

	<!-- loading-gif js -->
	<script type="text/javascript" src="<?php echo base_url()?>/media/js/modernizr.js"></script>
	<script type="text/javascript">
		$(window).load(function() {
			$(".se-pre-con").fadeOut("slow");
		});
	</script>
	<!-- End loading-gif -->

	<!-- Data Tables -->
	<script type="text/javascript">
		$(document).ready(function() {
			$('#table_infoMakanan').DataTable({
				"order": [[1, 'asc']]
			});
		});
	</script>
	<script type="text/javascript" src="<?php echo base_url()?>/media/js/jquery.dataTables.min.js"></script>
	<!-- End Data Tables -->

	<!-- Modal Hapus Makanan -->
	<script type="text/javascript">
		$(function() {
			$(".btnHapus").on("click", function(e) {
				e.preventDefault();

				var tr = $(this).parent().parent();

				$(".modalMakanan").modal('show');
				var nama = $(this).data('nama');
				$('#nama').text(nama);

				var href = $(this).attr('href');

				$('.btnYa').off();
				$('.btnYa').on('click', function() {
					$.ajax({
						'url'		: href,
						'type'		: 'POST',
						'success'	: function(result) {
							if(result == 1) {
								$(".modalMakanan").modal('hide');
								tr.fadeOut();

								const Toast = Swal.mixin({
									toast: true,
									position: 'top-end',
									showConfirmButton: false,
									timer: 3000
								});

								Toast.fire({
									icon: 'success',
									title: 'Data Terhapus!'
								})
							}
						}
					});
				});
			});
		});
	</script>
	<!-- End Hapus Makanan -->

	<!-- Bootstrap Core JavaScript -->
	<script type="text/javascript" src="<?php echo base_url()?>/media/js/bootstrap.min.js"></script>
</body>
</html>