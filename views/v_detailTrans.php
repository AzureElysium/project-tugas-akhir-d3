<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>DJ Resto | Detail Transaksi</title>

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
					<li><a href="index.php"><i class="fa fa-tachometer"></i> <span>Beranda</span></a></li>

					<li class="menu-list">
						<a href="#"><i class="fa fa-shopping-cart"></i><span>Transaksi Penjualan <i class="lnr lnr-chevron-right"></i></span></a>
						<ul class="sub-menu-list">
							<li><a href="trans_ditempat.php">Makan Ditempat</a></li>
							<li><a href="trans_dibawaPulang.php">Dibawa Pulang</a></li>
						</ul>
					</li>

					<li><a href="status_meja.php"><i class="fa fa-table"></i><span> Status Meja</span></a></li>

					<li class="active"><a href="detail_trans.php"><i class="fa fa-list-ul"></i> <span>Detail Transaksi</span></a></li>
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
						<li class="breadcrumb-item active" aria-current="page">Detail Transaksi</li>
					</ol>
				</nav>
				<!-- End Breadcrumb -->

				<!-- Tabel Detail Transaksi -->
				<div class="accordions pt-3">
					<div class="row">
						<div class="col-lg-12">
							<div class="card card_border border-primary-top">
								<div class="card-header chart-grid__header">
									Tabel Detail Transaksi
								</div>

								<div class="card-body">
									<div class="card card_border border-top shadow p-3">
										<div class="table-responsive">
											<table id="table_detTrans" class="display" style="width: 100%;">
												<thead>
													<tr>
														<th>Kode Transaksi</th>
														<th>Tgl & Waktu Transaksi</th>
														<th>Nama Kasir</th>
														<th>Nama Pembeli</th>
														<th>Total Bayar</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php while($dettrans = mysqli_fetch_object($data2)) { ?>
														<tr>
															<td><span class="badge badge-success"><?php echo $dettrans->kd_transaksi?></span></td>
															<td><?php echo date('d M Y H:i:s', strtotime($dettrans->tgl_transaksi))?></td>
															<td><?php echo $dettrans->nama?></td>
															<td><?php echo $dettrans->nama_pembeli?></td>
															<td><?php echo rupiah($dettrans->total_bayar)?></td>
															<td>
																<a href="showDetTransaksi.php?kd_transaksi=<?php echo $dettrans->kd_transaksi?>" type="button" class="btn btn-info text-light"><i class="fa fa-navicon"></i></a>
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
				<!-- End Tabel Detail Transaksi -->

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
			$('#table_detTrans').DataTable({
				"columnDefs": [{ type: 'date', targets: [1] }],
				"order": [[1, 'desc']]
			});
		});
	</script>
	<script type="text/javascript" src="<?php echo base_url()?>/media/js/jquery.dataTables.min.js"></script>
	<!-- End Data Tables -->

	<!-- Bootstrap Core JavaScript -->
	<script type="text/javascript" src="<?php echo base_url()?>/media/js/bootstrap.min.js"></script>
</body>
</html>