<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>DJ Resto | Beranda</title>

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/media/css/style-liberty.css">

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
					<li class="active"><a href="index.php"><i class="fa fa-tachometer"></i><span> Beranda</span></a></li>

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
				<div class="welcome-msg pt-3 pb-4">
					<h1>Hai <span class="text-primary"><?php echo @$user->nama?></span>, Selamat Datang Kembali!</h1>
					<p>Aplikasi Penjualan Sederhana.</p>
				</div>

				<!-- Statistik Penjualan -->
				<div class="statistics">
					<div class="row">
						<div class="col-xl-6 pr-xl-2">
							<div class="row">
								<div class="col-sm-6 pr-sm-2 statistics-grid">
									<div class="card card_border border-primary-top p-4">
										<i class="fa fa-dollar"></i>
										<h3 class="text-success number">
											<?php
												$a = mysqli_fetch_array($result2);
												echo rupiah($a['total1']);
											?>
										</h3>
										<p class="stat-text">Penjualan Hari Ini</p>
									</div>
								</div>

								<div class="col-sm-6 pl-sm-2 statistics-grid">
									<div class="card card_border border-primary-top p-4">
										<i class="fa fa-check-square-o"></i>
										<h3 class="text-secondary number">
											<?php
												$b = mysqli_fetch_array($result3);
												echo $b['total2'] . " Buah";
											?>
										</h3>
										<p class="stat-text">Transaksi Hari Ini</p>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-6 pl-xl-2">
							<div class="row">
								<div class="col-sm-6 pr-sm-2 statistics-grid">
									<div class="card card_border border-primary-top p-4">
										<i class="fa fa-dollar"></i>
										<h3 class="text-success number">
											<?php
												$c = mysqli_fetch_array($result4);
												echo rupiah($c['total3']);
											?>
										</h3>
										<p class="stat-text">Total Penjualan</p>
									</div>
								</div>

								<div class="col-sm-6 pl-sm-2 statistics-grid">
									<div class="card card_border border-primary-top p-4">
										<i class="fa fa-check-square-o"></i>
										<h3 class="text-secondary number">
											<?php
												$d = mysqli_fetch_array($result5);
												echo $d['total4'] . " Buah";
											?>
										</h3>
										<p class="stat-text">Total Transaksi</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End Statistik Penjualan -->

				<!-- Tabel Penjualan Produk per hari & Bahan Baku Keluar per hari -->
				<div class="accordions pt-3">
					<div class="row">
						<div class="col-lg-6">
							<div class="card card_border border-primary-top">
								<div class="card-header chart-grid__header">
									Penjualan Produk Pada Tanggal <b><?php date_default_timezone_set('Asia/Jakarta'); echo date('d M Y'); ?></b>
								</div>

								<div class="card-body">
									<ul class="list-group">
										<?php
											if($result6->num_rows > 0) {
												while($row = $result6->fetch_assoc()) {
													$kd_produk = $row['kd_produk'];
													$nama_produk = $row['nama_produk'];
													$jumlah_terjual = $row['TotalQty'];
										?>
											<li class="list-group-item flex-column align-items-start">
												<div class="d-flex justify-content-between">
													<h5 class="mb-1"><?php echo $nama_produk?></h5>
													<?php if(substr($kd_produk, -5, 2) == 'MK') { ?>
														<small><span class="badge badge-success"><?php echo $kd_produk?></span></small>
													<?php } else { ?>
														<small><span class="badge badge-danger"><?php echo $kd_produk?></span></small>
													<?php } ?>
												</div>
												<p>Jumlah Terjual :&nbsp;&nbsp;<span class="badge badge-info"><?php echo $jumlah_terjual?> pcs</span></p>
											</li>
										<?php } } else { ?>
											<li class="list-group-item flex-column align-items-start">
												<div class="d-flex justify-content-between">
													<h5 class="mb-1">Tidak ada Item</h5>
												</div>
											</li>
										<?php } ?>
									</ul>
								</div>
							</div>
						</div>

						<div class="col-lg-6">
							<div class="card card_border border-primary-top">
								<div class="card-header chart-grid__header">
									Bahan Baku yang Keluar Pada Tanggal <b><?php date_default_timezone_set('Asia/Jakarta'); echo date('d M Y'); ?></b>
								</div>

								<div class="card-body">
									<ul class="list-group">
										<?php
											if($result7->num_rows > 0) {
												while($row2 = $result7->fetch_assoc()) {
													$kd_bahanbaku = $row2['kd_bahanbaku'];
													$nama_bahanbaku = $row2['nama_bahanbaku'];
													$jumlah_terpakai = $row2['JumlahTerpakai'];
										?>
											<li class="list-group-item flex-column align-items-start">
												<div class="d-flex justify-content-between">
													<h5 class="mb-1"><?php echo $nama_bahanbaku?></h5>
													<small><span class="badge badge-success"><?php echo $kd_bahanbaku?></span></small>
												</div>
												<p>Jumlah Terpakai :&nbsp;&nbsp;<span class="badge badge-info"><?php echo floatval($jumlah_terpakai)?> Kg</span></p>
											</li>
										<?php } } else { ?>
											<li class="list-group-item flex-column align-items-start">
												<div class="d-flex justify-content-between">
													<h5 class="mb-1">Tidak ada Item</h5>
												</div>
											</li>
										<?php } ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End Tabel -->

				<!-- Chart Penjualan
				<div class="chart">
					<div class="row">
						<div class="col-lg-12 chart-grid">
							<div class="card text-center card_border border-primary-top">
								<div class="card-header chart-grid__header">
									Grafik Total Penjualan Per Bulan
								</div>

								<div class="card-body">
									<div id="container">
										<canvas id="linechart"></canvas>
									</div>

									<div class="card-footer text-muted chart-grid__footer">
										Tahun <?php date_default_timezone_set('Asia/Jakarta'); echo date('Y');?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				End Chart Penjualan -->

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

	<!-- Bootstrap Core JavaScript -->
	<script type="text/javascript" src="<?php echo base_url()?>/media/js/bootstrap.min.js"></script>
</body>
</html>