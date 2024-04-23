<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>DJ Resto | Detail Pembelian BB</title>

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
						<li class="breadcrumb-item"><a href="pembelian_bb.php">Kelola Pembelian BB</a></li>
						<li class="breadcrumb-item active" aria-current="page">Detail Pembelian BB</li>
					</ol>
				</nav>
				<!-- End Breadcrumb -->

				<!-- Form Tambah/Ubah Makanan -->
				<div class="accordions pt-3">
					<div class="card card_border border-primary-top">
						<div class="card-header chart-grid__header">
							Detail Pembelian Bahan Baku dengan Supplier <b><?php echo @$result->nama_supplier?></b>
						</div>

						<div class="card-body">
							<?php if(!empty($errorjmlbeli)) { ?>
								<div class="alert alert-danger alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<b class="text-dark"><?php echo $errorjmlbeli?></b>
								</div>
							<?php } ?>

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

							<div class="mb-4">
								<a href="pembelian_bb.php" class="btn btn-warning text-light"><i class="fa fa-chevron-left"></i>&nbsp;&nbsp;Kembali</a>

								<div class="form-group row pull-right">
									<label class="col-sm-5 col-form-label input__label">Total Harga Beli :</label>
									<div class="col-sm-7">
										<input type="text" id="tbeli" class="form-control input-style" readonly>
									</div>
								</div>
							</div>

							<table class="table table-bordered table-hover">
								<thead class="text-primary" style="background-color: #eee;">
									<tr>
										<th class="text-center">No.</th>
										<th>Nama Bahan Baku</th>
										<th>Jumlah Beli</th>
										<th>Harga per Kg</th>
										<th>Subtotal Harga Beli</th>
										<th class="text-center">Aksi</th>
									</tr>
								</thead>
								<tbody id="tabel_detpembelianbb">
									<?php include 'tampil_datadetpembelianbb.php';?>
								</tbody>
							</table>

							<div class="form-group text-center">
								<button type="button" id="btnCPembelianBB" class="btn btn-primary text-light text-light mt-2" data-kdsupplierrr="<?php echo $kd_supplier?>"><i class="fa fa-print"></i>&nbsp;&nbsp;Cetak Pembelian</button>
							</div>
						</div>
					</div>
				</div>
				<!-- End Form -->

				<!-- Modal Ubah Pembelian BB -->
				<div class="modal fade modalUbahPembelianBB" tabindex="-1" role="dialog" aria-labelledby="UbahPembelianBB" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-tittle">Ubah Data Pembelian <b id="nama2"></b></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>

							<form method="POST" action="ubah_datadetpembelianbb.php">
								<div class="modal-body">
									<div class="form-group">
										<input type="hidden" name="kd_supp" id="kd_supp">
										<input type="hidden" name="kd_bb" id="kd_bb">
										<label class="input__label">Jumlah Beli (Kg)</label>
										<input type="number" step="0.001" name="jumlah_beli" id="jumlah_beli" class="form-control input-style" required>
										<label class="input__label mt-4">Harga per Kg (Rp)</label>
										<input type="number" step="1" min="1" name="harga_kg" id="harga_kg" class="form-control input-style" required>
									</div>
								</div>

								<div class="modal-footer">
									<button type="submit" class="btn btn-success text-light"><i class="fa fa-save"></i> Simpan</button>
									<button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-chevron-left"></i> Kembali</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- End Ubah Pembelian BB -->

				<!-- Modal Hapus Pembelian BB -->
				<div class="modal fade modalDataPembelianBB" tabindex="-1" role="dialog" aria-labelledby="HapusPembelianBB" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-tittle">Konfirmasi</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>

							<div class="modal-body">
								Apakah Anda ingin menghapus data pembelian <b id="nama"></b> ?
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-warning text-light btnYa">Ya</button>
								<button type="button" class="btn btn-success text-light" data-dismiss="modal">Tidak</button>
							</div>
						</div>
					</div>
				</div>
				<!-- End Hapus Pembelian BB -->

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
		function rubah(angka) {
			var reverse = angka.toString().split('').reverse().join(''),
		   	ribuan = reverse.match(/\d{1,3}/g);
		   	ribuan = ribuan.join('.').split('').reverse().join('');
		   	return ribuan;
		}

		function calculate() {
			var value = 0;

			$('#tabel_detpembelianbb tr').each(function() {
				value += parseInt($(this).find('#thargabeli').text().replace(/Rp/g, "").replace(".", "").replace(",00", ""));
			});

			var value1 = value;
			if(isNaN(value1)) {
				$('#tbeli').val(0);
			} else {
				$('#tbeli').val('Rp' + rubah(value1) + ',00');
			}
		}

		$(document).on('click', '#btnCPembelianBB', function() {
			var kd_supplier = $(this).data('kdsupplierrr');
			var tbeli = $('#tbeli').val();

			if(tbeli == '0') {
				const Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 3000
				});

				Toast.fire({
					icon: 'error',
					title: 'Data Item kosong!'
				})
			} else {
				window.open (
					'<?php echo base_url()?>/cetak_pembelianbb.php?kd_supplier=' + kd_supplier,
					'_blank'
				);
			}
		});

		$(document).ready(function() {
			calculate();
		});
	</script>
	<!-- End Script Proses -->

	<!-- Modal Ubah Pembelian BB -->
	<script type="text/javascript">
		$(document).on('click', '.btnUbah', function(e) {
			e.preventDefault();

			$('.modalUbahPembelianBB').modal('show');
			var kd_supplier = $(this).data('kdsupplierr');
			var kd_bahanbaku = $(this).data('kdbahanbaku');
			var nama2 = $(this).data('namaa');
			var jumlahbeli = $(this).data('jumlahbeli');
			var hargakg = $(this).data('hargakg');
			$('#kd_supp').val(kd_supplier);
			$('#kd_bb').val(kd_bahanbaku);
			$('#nama2').text(nama2);
			$('#jumlah_beli').val(jumlahbeli);
			$('#harga_kg').val(hargakg);
		});
	</script>
	<!-- End Modal Ubah Pembelian BB -->

	<!-- Modal Hapus Pembelian BB -->
	<script type="text/javascript">
		$(document).on('click', '.btnHapus', function(e) {
			e.preventDefault();

			var tr = $(this).parent().parent();

			$('.modalDataPembelianBB').modal('show');
			var nama = $(this).data('nama');
			var kd_supplier = $(this).data('kdsupplier');
			$('#nama').text(nama);

			var href = $(this).attr('href');

			$('.btnYa').off();
			$('.btnYa').on('click', function() {
				$.ajax({
					url: href,
					type: 'POST',
					success: function(result) {
						if(result == 1) {
							$(".modalDataPembelianBB").modal('hide');
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
							});

							$('#tabel_detpembelianbb').load('<?php echo base_url()?>/tampil_datadetpembelianbb.php?kd_supplier=' + kd_supplier, function() {
								calculate();
							});
						}
					}
				});
			});
		});
	</script>
	<!-- End Modal Hapus Pembelian BB -->

	<!-- Bootstrap Core JavaScript -->
	<script type="text/javascript" src="<?php echo base_url()?>/media/js/bootstrap.min.js"></script>
</body>
</html>