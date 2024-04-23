<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>DJ Resto | Data Bahan Baku</title>

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
						<li class="breadcrumb-item"><a href="#">Kelola Bahan Baku</a></li>
						<li class="breadcrumb-item active" aria-current="page">Data Bahan Baku</li>
					</ol>
				</nav>
				<!-- End Breadcrumb -->

				<!-- Tabel Bahan Baku -->
				<div class="accordions pt-3">
					<div class="row">
						<div class="col-lg-12">
							<div class="card card_border border-primary-top">
								<div class="card-header chart-grid__header">
									Tabel Bahan Baku
								</div>

								<div class="card-body">
									<a href="tambah_bb.php" class="btn btn-primary text-light mb-3"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah Bahan Baku</a>

									<div class="card card_border border-top shadow p-3 mb-4">
										<?php if(!empty($success)) { ?>
											<div class="alert alert-success alert-dismissible">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<b class="text-dark"><?php echo $success?></b>
											</div>
										<?php } ?>

										<?php if(!empty($error)) { ?>
											<div class="alert alert-danger alert-dismissible">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<b class="text-dark"><?php echo $error?></b>
											</div>
										<?php } ?>

										<?php if(!empty($success2)) { ?>
											<div class="alert alert-success alert-dismissible">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<b class="text-dark"><?php echo $success2?></b>
											</div>
										<?php } ?>

										<?php if(!empty($error2)) { ?>
											<div class="alert alert-danger alert-dismissible">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<b class="text-dark"><?php echo $error2?></b>
											</div>
										<?php } ?>

										<?php if(!empty($errorjumlahbb)) { ?>
											<div class="alert alert-danger alert-dismissible">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<b class="text-dark"><?php echo $errorjumlahbb?></b>
											</div>
										<?php } ?>

										<div class="table-responsive">
											<table id="table_dataBahanBaku" class="display" style="width: 100%;">
												<thead>
													<tr>
														<th>Nama Bahan Baku</th>
														<th>Kode Bahan Baku</th>
														<th>Jumlah Tersedia</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php while($bb = mysqli_fetch_object($data2)) { ?>
														<tr>
															<td><?php echo $bb->nama_bahanbaku?></td>
															<td><span class="badge badge-success"><?php echo $bb->kd_bahanbaku?></span></td>
															<td><?php echo $bb->jumlah_bahanbaku?> Kg</td>
															<td>
																<a href="ubah_bb.php?kd_bahanbaku=<?php echo $bb->kd_bahanbaku?>" class="btn btn-warning text-light mr-2"><i class="fa fa-pencil"></i></a>
																<a href="hapus_bb.php?kd_bahanbaku=<?php echo $bb->kd_bahanbaku?>" class="btn btn-danger text-light btnHapus" data-nama="<?php echo $bb->nama_bahanbaku?>"><i class="fa fa-trash"></i></a>
															</td>
														</tr>
													<?php } ?>
												</tbody>
											</table>
										</div>
									</div>

									<div class="card card_border border-primary-top shadow p-3">
										<div class="card-header chart-grid__header text-center">
											Tabel Stok Bahan Baku yang Dibeli
										</div>

										<div class="card-body">
											<table class="table table-bordered table-hover">
												<thead class="text-primary" style="background-color: #eee;">
													<tr>
														<th class="text-center">No.</th>
														<th>Nama Bahan Baku</th>
														<th>Jumlah Beli</th>
														<th>Nama Supplier</th>
														<th class="text-center">Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php
														$no = 1;
														if($data3->num_rows > 0) {
															while($pembelianbb = $data3->fetch_assoc()) {
																$kd_bahanbaku = $pembelianbb['kd_bahanbaku'];
																$kd_supplier = $pembelianbb['kd_supplier'];
																$nama_supplier = $pembelianbb['nama_supplier'];
																$nama_bahanbaku = $pembelianbb['nama_bahanbaku'];
																$jumlah_beli = $pembelianbb['jumlah_beli'];
													?>
														<tr>
															<td class="text-center"><?php echo $no++?></td>
															<td><?php echo $nama_bahanbaku?></td>
															<td><span class="badge badge-success"><?php echo $jumlah_beli?> Kg</span></td>
															<td><?php echo $nama_supplier?></td>
															<td class="text-center">
																<a href="updatedeletepembelianbb.php?kd_bahanbaku=<?php echo $kd_bahanbaku?>&kd_supplier=<?php echo $kd_supplier?>" data-namasupp="<?php echo $nama_supplier?>" data-namabb="<?php echo $nama_bahanbaku?>" data-jumlahbeli="<?php echo $jumlah_beli?>" class="btn btn-info text-light btnCeklis mr-2"><i class="fa fa-check"></i></a>
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
					</div>
				</div>
				<!-- End Tabel Bahan Baku -->

				<!-- Modal Hapus Bahan Baku -->
				<div class="modal fade modalBahanBaku" tabindex="-1" role="dialog" aria-labelledby="HapusBahanBaku" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-tittle">Konfirmasi</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>

							<div class="modal-body">
								Apakah Anda ingin menghapus bahan baku <b id="nama"></b> ?
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-warning text-light btnYa">Ya</button>
								<button type="button" class="btn btn-success text-light" data-dismiss="modal">Tidak</button>
							</div>
						</div>
					</div>
				</div>
				<!-- End Hapus Bahan Baku -->

				<!-- Modal Ceklis -->
				<div class="modal fade modalCeklis" tabindex="-1" role="dialog" aria-labelledby="Ceklis" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-tittle">Konfirmasi</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>

							<div class="modal-body">
								Apakah Anda telah melakukan pembelian bahan baku <b id="namabb"></b> pada <b id="namasupp"></b> ?
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-warning text-light btnYes">Ya</button>
								<button type="button" class="btn btn-success text-light" data-dismiss="modal">Tidak</button>
							</div>
						</div>
					</div>
				</div>
				<!-- End Ceklis -->

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
			$('#table_dataBahanBaku').DataTable({
				"order": [[1, 'asc']]
			});
		});
	</script>
	<script type="text/javascript" src="<?php echo base_url()?>/media/js/jquery.dataTables.min.js"></script>
	<!-- End Data Tables -->

	<!-- Script Proses -->
	<script type="text/javascript">
		$(function() {
			$(".btnHapus").on("click", function(e) {
				e.preventDefault();

				var tr = $(this).parent().parent();

				$(".modalBahanBaku").modal('show');
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
								$(".modalBahanBaku").modal('hide');
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

			$(".btnCeklis").on("click", function(event) {
				event.preventDefault();

				var jumlah_beli = $(this).data('jumlahbeli');

				$(".modalCeklis").modal('show');
				var namabb = $(this).data('namabb');
				var namasupp = $(this).data('namasupp');
				$('#namabb').text(namabb);
				$('#namasupp').text(namasupp);

				var href2 = $(this).attr('href');

				$('.btnYes').off();
				$('.btnYes').on('click', function() {
					$.ajax({
						'url'		: href2,
						'type'		: 'POST',
						'data'		: {jumlah_beli},
						'success'	: function(result) {
							if(result == 1) {
								$(".modalCeklis").modal('hide');

								Swal.fire({
									icon: 'success',
								  	title: 'Sukses!',
								  	text: 'Data bahan baku ' + namabb + ' berhasil ditambah.'
								}).then(function() {
									window.location = "<?php echo base_url()?>/data_bb.php";
								});
							}
						}
					});
				});
			});
		});
	</script>
	<!-- End Script Proses -->

	<!-- Bootstrap Core JavaScript -->
	<script type="text/javascript" src="<?php echo base_url()?>/media/js/bootstrap.min.js"></script>
</body>
</html>