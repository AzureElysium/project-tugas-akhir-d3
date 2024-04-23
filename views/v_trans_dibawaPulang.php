<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>DJ Resto | Transaksi Penjualan - Dibawa Pulang</title>

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
						<li class="breadcrumb-item"><a href="#">Transaksi Penjualan</a></li>
						<li class="breadcrumb-item active" aria-current="page">Dibawa Pulang</li>
					</ol>
				</nav>
				<!-- End Breadcrumb -->

				<!-- Form Transaksi Penjualan Dibawa Pulang -->
				<div class="accordions pt-3">
					<div class="card card_border border-primary-top">
						<div class="card-header chart-grid__header">
							Form Transaksi Penjualan - Dibawa Pulang
						</div>

						<div class="card-body">
							<div class="row border-bottom">
								<div class="col-lg-6 border-right">
									<div class="form-group row mb-4">
										<?php
											$dat = mysqli_fetch_array($data2);
											$kodeTrans = $dat['kdTerbesar'];

											$urutan = (int) substr($kodeTrans, 2, 4);
											$urutan++;

											$huruf = 'TR';
											$kodeTrans = $huruf . sprintf("%04s", $urutan);
										?>

										<label class="col-sm-4 col-form-label input__label">Kode Transaksi :</label>
										<div class="col-sm-8">
											<input type="text" name="kd_transaksi" id="kd_transaksi" class="form-control input-style" value="<?php echo $kodeTrans?>" readonly>
										</div>
									</div>

									<div class="form-group row mb-4">
										<label class="col-sm-4 col-form-label input__label">Nama Kasir :</label>
										<div class="col-sm-8">
											<input type="hidden" name="kd_user" id="kd_user" value="<?php echo @$user->kd_user?>">
											<input type="text" name="nama_kasir" id="nama_kasir" class="form-control input-style" value="<?php echo @$user->nama?>" readonly>
										</div>
									</div>

									<div class="form-group row mb-4">
										<label class="col-sm-4 col-form-label input__label">Tgl Transaksi :</label>
										<div class="col-sm-8">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text bg-light text-primary"><i class="fa fa-calendar"></i></span>
												</div>

												<input type="date" name="tgl_transaksi" id="tgl_transaksi" class="form-control input-style" value="<?php date_default_timezone_set("Asia/Jakarta"); echo date("Y-m-d");?>" readonly>
											</div>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-4 col-form-label input__label">Nama Pembeli :</label>
										<div class="col-sm-8">
											<input type="text" name="nama_pembeli" id="nama_pembeli" class="form-control input-style" placeholder="Isi Nama Pembeli">
										</div>
									</div>
								</div>

								<div class="col-lg-6">
									<h1 class="text-right mb-4" style="font-size: 55px; font-family: Impact;">Rp<span id="total_bayar"></span>,00</h1>

									<div id="produk">
										<div class="form-group row mb-4">
											<label class="col-sm-4 col-form-label input__label">Kode Produk :</label>
											<div class="col-sm-8">
												<input list="list_produk" name="kd_produk" id="kd_produk" class="form-control input-style" placeholder="Isi Kode Produk" autocomplete="off" onchange="changevalue1(this.value)">
													<datalist id="list_produk">
														<?php
															$jsArray1 = "var data3 = new Array();\n";

															while($row2 = mysqli_fetch_array($data3)) {
														?>
															<option value="<?php echo $row2['kd_produk']?>"><?php echo $row2['nama_produk']?></option>
															<?php
																$jsArray1 .= "data3['" . $row2['kd_produk'] . "'] = {nama_produk:'" . $row2['nama_produk'] . "',harga:'" . $row2['harga'] . "'};\n";
															?>
														<?php } ?>
													</datalist>
												</input>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-6">
												<div class="form-group mb-4">
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text bg-light text-primary"><i class="fa fa-cutlery"></i></span>
														</div>

														<input type="text" name="nama_produk" id="nama_produk" class="form-control input-style" readonly>
													</div>
												</div>
											</div>

											<div class="col-sm-6">
												<div class="form-group mb-4">
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text bg-light text-primary"><i class="fa fa-dollar"></i></span>
														</div>

														<input type="text" name="harga" id="harga" class="form-control input-style" readonly>
													</div>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-6">
												<div class="form-group mb-4">
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text bg-light text-primary"><i class="fa fa-plus-circle"></i></span>
														</div>

														<input type="number" min="1" name="qty" id="qty" class="form-control input-style" placeholder="Isi Qty">
													</div>
												</div>
											</div>

											<div class="col-sm-6 mt-1">
												<button type="button" name="tambah_detTransaksi" id="tambah_detTransaksi" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</button>
											</div>
										</div>
									</div>
								</div>
							</div>

							<table class="table table-bordered table-hover mt-4 mb-4">
								<thead class="text-primary" style="background-color: #eee;">
									<tr>
										<th class="text-center">No.</th>
										<th>Kode Produk</th>
										<th>Nama Produk</th>
										<th>Harga</th>
										<th class="text-center">Qty</th>
										<th>Sub Total</th>
										<th class="text-center">Aksi</th>
									</tr>
								</thead>
								<tbody id="tabel_detTransaksi">
									<?php include 'tampil_detTransaksiDibawaPulang.php';?>
								</tbody>
							</table>

							<div class="form-group mb-4">
								<label class="form-label input__label">Bayar Tunai (Rp)</label>
								<input type="number" name="bayar" id="bayar" class="form-control input-style col-sm-3" placeholder="Isi Jumlah Bayar" required>
							</div>

							<div class="form-group">
								<label class="form-label input__label">Kembalian (Rp)</label>
								<input type="number" name="kembalian" id="kembalian" class="form-control input-style col-sm-3 mb-4" readonly>
							</div>

							<div class="text-center">
								<button type="button" name="proses_transaksi" id="proses_transaksi" class="btn btn-success"><i class="fa fa-send-o"></i> Proses Transaksi</button>
							</div>
						</div>
					</div>
				</div>
				<!-- End Form -->

				<!-- Modal Simpan Transaksi -->
				<div class="modal fade modalSimpanTransaksi" tabindex="-1" role="dialog" aria-labelledby="SimpanTransaksi" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-tittle">Transaksi Sukses!</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Tutup" onClick="window.location.reload()">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>

							<div class="modal-body">
								Silahkan klik button di bawah untuk melanjutkan.
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-primary text-light mr-auto btnCTransaksi"><i class="fa fa-print"></i> Cetak Transaksi</button>
								<button type="button" class="btn btn-primary text-light mr-auto btnCMenu"><i class="fa fa-print"></i> Cetak Menu</button>
								<button type="button" class="btn btn-dark" data-dismiss="modal" onClick="window.location.reload()"><i class="fa fa-chevron-left"></i> Kembali</button>
							</div>
						</div>
					</div>
				</div>
				<!-- End Simpan Transaksi -->

				<!-- Modal Hapus Data Detail Transaksi -->
				<div class="modal fade modalDataDetTransaksi" tabindex="-1" role="dialog" aria-labelledby="HapusDataDetTransaksi" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-tittle">Konfirmasi</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>

							<div class="modal-body">
								Apakah Anda ingin menghapus item <b id="nama"></b> ?
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-warning text-light btnYa">Ya</button>
								<button type="button" class="btn btn-success text-light" data-dismiss="modal">Tidak</button>
							</div>
						</div>
					</div>
				</div>
				<!-- End Hapus Data Detail Transaksi -->

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
		$(document).on('click', '#tambah_detTransaksi', function() {
			var kd_transaksi = $('#kd_transaksi').val();
			var kd_produk = $('#kd_produk').val();
			var harga = $('#harga').val().replace(/Rp/g, "").replace(".", "").replace(".", "").replace(".", "").replace(/,00/g, "");
			var qty = $('#qty').val();

			if(kd_produk == '') {
				const Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 3000
				});

				Toast.fire({
					icon: 'error',
					title: 'Tolong pilih Kode Produk!'
				})
				$('#kd_produk').focus();
			} else if(qty == '') {
				const Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 3000
				});

				Toast.fire({
					icon: 'error',
					title: 'Tolong diisi Qty!'
				})
				$('#qty').val('');
				$('#qty').focus();
			} else if(qty < 1) {
				const Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 3000
				});

				Toast.fire({
					icon: 'error',
					title: 'Qty tidak boleh kurang dari 1!'
				})
				$('#qty').val('');
				$('#qty').focus();
			} else {
				$.ajax({
					type: 'POST',
					url: '<?php echo base_url()?>/tambah_detTransaksiDibawaPulang.php',
					data: ({'tambah_detTransaksi' : true, 'kd_transaksi' : kd_transaksi, 'kd_produk' : kd_produk, 'harga' : harga, 'qty' : qty}),
					success: function() {
						const Toast = Swal.mixin({
							toast: true,
							position: 'top-end',
							showConfirmButton: false,
							timer: 3000
						});

						Toast.fire({
							icon: 'success',
							title: 'Berhasil tambah data Item!'
						});

						$('#kd_produk').val('');
						$('#nama_produk').val('');
						$('#harga').val('');
						$('#qty').val('');
						$('#kd_produk').focus();
						$('#tabel_detTransaksi').load('<?php echo base_url()?>/tampil_detTransaksiDibawaPulang.php', function() {
							calculate();
						});
					}
				});
			}
		});

		$(document).on('click', '.btnHapus', function(e) {
			e.preventDefault();

			var tr = $(this).parent().parent();

			$('.modalDataDetTransaksi').modal('show');
			var nama = $(this).data('nama');
			var qty = $(this).data('qty');
			$('#nama').text(nama);

			var href = $(this).attr('href');

			$('.btnYa').off();
			$('.btnYa').on('click', function() {
				$.ajax({
					url: href,
					type: 'POST',
					data: {'qty' : qty},
					success: function(result) {
						if(result == 1) {
							$('.modalDataDetTransaksi').modal('hide');
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

							$('#tabel_detTransaksi').load('<?php echo base_url()?>/tampil_detTransaksiDibawaPulang.php', function() {
								calculate();
							});
						}
					}
				});
			});
		});

		function calculate() {
			var sub_total = 0;
			$('#tabel_detTransaksi tr').each(function() {
				sub_total += parseInt($(this).find('#subtotal').text().replace(/Rp/g, "").replace(".", "").replace(/,00/g, ""));
			});
			isNaN(sub_total) ? $('#total_bayar').text(0) : $('#subtotal').val(sub_total);

			var total_bayar = sub_total;
			if(isNaN(total_bayar)) {
				$('#total_bayar').text(0);
			} else {
				$('#total_bayar').text(total_bayar);
			}

			var bayar = $('#bayar').val();
			bayar != 0 ? $('#kembalian').val(bayar - total_bayar) : $('#kembalian').val(0);
		}

		$(document).on('keyup mouseup', '#bayar', function() {
			if($('#bayar').val() == "") {
				$('#kembalian').val('');
				return;
			} else {
				calculate();
			}
		});

		$(document).on('click', '#proses_transaksi', function() {
			var kd_transaksi = $('#kd_transaksi').val();
			var kd_user = $('#kd_user').val();
			var nama_pembeli = $('#nama_pembeli').val();
			var total_bayar = $('#total_bayar').text();
			var bayar = $('#bayar').val();
			var kembalian = $('#kembalian').val();

			if(nama_pembeli == "") {
				const Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 3000
				});

				Toast.fire({
					icon: 'error',
					title: 'Tolong diisi Nama Pembeli!'
				})
				$('#nama_pembeli').focus();
			} else if(total_bayar == '0') {
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
				$('#kd_produk').focus();
			} else if(bayar == "") {
				const Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 3000
				});

				Toast.fire({
					icon: 'error',
					title: 'Tolong diisi Jumlah Bayar!'
				})
				$('#bayar').val('');
				$('#bayar').focus();
			} else if(kembalian < 0) {
				const Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 3000
				});

				Toast.fire({
					icon: 'error',
					title: 'Jumlah Bayar kurang!'
				})
				$('#bayar').val('');
				$('#kembalian').val('');
				$('#bayar').focus();
			} else {
				$.ajax({
					type: 'POST',
					url: '<?php echo base_url()?>/tambah_transaksiDibawaPulang.php',
					data: ({'proses_transaksi' : true, 'kd_transaksi' : kd_transaksi, 'kd_user' : kd_user, 'nama_pembeli' : nama_pembeli, 'total_bayar' : total_bayar, 'bayar' : bayar, 'kembalian' : kembalian}),
					success: function() {
						$('.modalSimpanTransaksi').modal('show');

						$('.btnCTransaksi').off();
						$('.btnCTransaksi').on('click', function() {
							window.open(
								'<?php echo base_url()?>/cetak_transaksiDibawaPulang.php?kd_transaksi=' + kd_transaksi,
								'_blank'
							);
						});

						$('.btnCMenu').off();
						$('.btnCMenu').on('click', function() {
							window.open(
								'<?php echo base_url()?>/cetak_menuDipesanDibawaPulang.php?kd_transaksi=' + kd_transaksi,
								'_blank'
							);
						});
					}
				});
			}
		});

		$(document).ready(function() {
			calculate();
		});
	</script>
	<!-- End Script Proses -->

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

	<!-- Qty -->
	<script type="text/javascript">
		$(function() {
			$("input[id=qty]").bind({
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
	<!-- End Qty -->

	<!-- Otomatisasi Nama Produk & Harga Produk -->
	<script type="text/javascript">   
    	<?php echo $jsArray1; ?>

    	function rubah(angka) {
			var reverse = angka.toString().split('').reverse().join(''),
		   	ribuan = reverse.match(/\d{1,3}/g);
		   	ribuan = ribuan.join('.').split('').reverse().join('');
		   	return ribuan;
		}

    	function changevalue1(kd_produk) {
    		if(kd_produk == "") {
    			$('#nama_produk').val('');
    			$('#harga').val('');
    			$('#qty').val('');
    			return;
    		} else {
    			$('#nama_produk').val(data3[kd_produk].nama_produk);
    			$('#harga').val('Rp' + rubah(data3[kd_produk].harga) + ',00');
    		}
    	}; 
    </script>
	<!-- End Otomatisasi -->

	<!-- Bootstrap Core JavaScript -->
	<script type="text/javascript" src="<?php echo base_url()?>/media/js/bootstrap.min.js"></script>
</body>
</html>