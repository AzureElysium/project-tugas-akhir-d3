<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>DJ Resto | Status Meja</title>

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

					<li class="active"><a href="status_meja.php"><i class="fa fa-table"></i><span> Status Meja</span></a></li>

					<li><a href="detail_trans.php"><i class="fa fa-list-ul"></i> <span>Detail Transaksi</span></a></li>
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
						<li class="breadcrumb-item active" aria-current="page">Status Meja</li>
					</ol>
				</nav>
				<!-- End Breadcrumb -->

				<!-- Tabel Ceklis Meja -->
				<div class="accordions pt-3">
					<div class="row">
						<div class="col-lg-6">
							<div class="card card_border border-primary-top">
								<div class="card-header chart-grid__header">
									Tabel Status Meja
								</div>

								<div class="card-body">
									<table class="table table-bordered">
										<thead class="text-primary" style="background-color: #eee;">
											<tr>
												<th>Nama Meja</th>
												<th>Status Meja</th>
											</tr>
										</thead>
										<tbody>
											<?php
												if($data3->num_rows > 0) {
													while($row = $data3->fetch_assoc()) {
														$nama_meja		= $row['nama_meja'];
														$status_meja	= $row['status_meja'];
											?>
												<tr>
													<td><?php echo $nama_meja?></td>
													<?php if($status_meja == 0) { ?>
														<td><span class="badge badge-success">Kosong</span></td>
													<?php } else { ?>
														<td><span class="badge badge-danger">Terisi</span></td>
													<?php } ?>
												</tr>
											<?php } } else { ?>
												<tr>
													<td colspan="4" class="text-center">Tidak ada Item</td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="col-lg-6">
							<div class="card card_border border-primary-top">
								<div class="card-header chart-grid__header">
									Tabel Pembayaran
								</div>

								<div class="card-body">
									<?php if(!empty($error)) { ?>
										<div class="alert alert-danger alert-dismissible">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<b class="text-dark"><?php echo $error?></b>
										</div>
									<?php } ?>

									<?php if(!empty($error2)) { ?>
										<div class="alert alert-danger alert-dismissible">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<b class="text-dark"><?php echo $error2?></b>
										</div>
									<?php } ?>

									<table class="table table-bordered table-hover">
										<thead class="text-primary" style="background-color: #eee;">
											<tr>
												<th>Nama Meja</th>
												<th>Nama Pembeli</th>
												<th class="text-center">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$no = 1;
												if($data2->num_rows > 0) {
													while($row = $data2->fetch_assoc()) {
														$kd_meja		= $row['kd_meja'];
														$kd_transaksi	= $row['kd_transaksi'];
														$nama_meja		= $row['nama_meja'];
														$total_bayar	= $row['total_bayar'];
														$nama_pembeli	= $row['nama_pembeli'];
											?>
												<tr>
													<td><?php echo $nama_meja?></td>
													<td><?php echo $nama_pembeli?></td>
													<td class="text-center">
														<button type="button" id="ceklis_meja" class="btn btn-info text-light" data-kdmeja="<?php echo $kd_meja?>" data-kdtransaksi="<?php echo $kd_transaksi?>" data-totalbayar="<?php echo $total_bayar?>" data-namapembeli="<?php echo $nama_pembeli?>"><i class="fa fa-check"></i></button>
													</td>
												</tr>
											<?php } } else { ?>
												<tr>
													<td colspan="6" class="text-center">Tidak ada Item</td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End Tabel -->

				<!-- Modal Ceklis Meja -->
				<div class="modal fade modalCeklisMeja" tabindex="-1" role="dialog" aria-labelledby="CeklisMeja" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-tittle">Pembayaran Atas Nama <b id="nama"></b></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>

							<form method="POST" action="ceklis_meja.php">
								<div class="modal-body">
									<input type="hidden" name="kd_meja" id="kd_meja">
									<input type="hidden" name="kd_transaksi" id="kd_transaksi">

									<div class="form-group mb-4">
										<label class="input__label">Total Bayar (Rp)</label>
										<input type="number" name="total_bayar" id="total_bayar" class="form-control input-style" readonly>
									</div>

									<div class="form-group mb-4">
										<label class="input__label">Bayar (Rp)</label>
										<input type="number" min="1" name="bayar" id="bayar" class="form-control input-style" required>
									</div>

									<div class="form-group">
										<label class="input__label">Kembalian (Rp)</label>
										<input type="number" name="kembalian" id="kembalian" class="form-control input-style" readonly>
									</div>
								</div>

								<div class="modal-footer">
									<button type="submit" class="btn btn-primary text-light"><i class="fa fa-print"></i> Cetak Transaksi</button>
									<button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-chevron-left"></i> Kembali</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- Modal Ceklis Meja -->

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

	<!-- Script Proses -->
	<script type="text/javascript">
		function calculate() {
			var total_bayar = $('#total_bayar').val();
			var bayar = $('#bayar').val();
			bayar != 0 ? $('#kembalian').val(bayar - total_bayar) : $('#kembalian').val(0);
		}

		$(document).on('keyup mouseup', '#bayar', function() {
			if($('#bayar').val() == '') {
				$('#kembalian').val('');
				return;
			} else {
				calculate();
			}
		});

		$(document).ready(function() {
			calculate();
		});
	</script>
	<!-- End Script Proses -->

	<!-- Modal Ceklis Meja -->
	<script type="text/javascript">
		$(document).on('click', '#ceklis_meja', function(e) {
			e.preventDefault();

			$('.modalCeklisMeja').modal('show');
			var kd_meja = $(this).data('kdmeja');
			var kd_transaksi = $(this).data('kdtransaksi');
			var nama_pembeli = $(this).data('namapembeli');
			var total_bayar = $(this).data('totalbayar');

			$('#kd_meja').val(kd_meja);
			$('#kd_transaksi').val(kd_transaksi);
			$('#nama').text(nama_pembeli);
			$('#total_bayar').val(total_bayar);
		});
	</script>
	<!-- End Modal Ceklis Meja -->

	<!-- Bayar Tunai -->
	<script type="text/javascript">
		$(function() {
			$("input[id=bayar]").bind({
				keydown: function(e) {
					if(e.shiftKey===true) {
						if(e.which==9) {
							return true;
						}
						return false;
					}

					if(e.which>57) {
						if(e.which>=96 && e.which<=105) {
							return true;
						}
						return false;
					}

					if(e.which==32) {
						return false;
					}
					return true;
				}
			});
		});
	</script>
	<!-- End Bayar Tunai -->

	<!-- Bootstrap Core JavaScript -->
	<script type="text/javascript" src="<?php echo base_url()?>/media/js/bootstrap.min.js"></script>
</body>
</html>