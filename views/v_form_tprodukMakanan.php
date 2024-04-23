<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>DJ Resto | Kelola Produk - Tambah Makanan</title>

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
						<li class="breadcrumb-item"><a href="produk_makanan.php">Makanan</a></li>
						<li class="breadcrumb-item active" aria-current="page">Tambah Makanan</li>
					</ol>
				</nav>
				<!-- End Breadcrumb -->

				<!-- Form Tambah/Ubah Makanan -->
				<div class="accordions pt-3">
					<div class="card card_border border-primary-top">
						<div class="card-header chart-grid__header">
							Tambah Makanan
						</div>

						<div class="card-body">
							<a href="produk_makanan.php" class="btn btn-warning text-light mb-3"><i class="fa fa-chevron-left"></i>&nbsp;&nbsp;Kembali</a>

							<div class="card card_border border-top shadow p-3">
								<div class="row border-bottom">
									<div class="col-lg-6 border-right">
										<?php
											$dat = mysqli_fetch_array($result2);
											$kodeProduk = $dat['kdTerbesar'];

											$urutan = (int) substr($kodeProduk, 2, 3);
											$urutan++;

											$huruf = 'MK';
											$kodeProduk = $huruf . sprintf("%03s", $urutan);
										?>

										<div class="form-group row mb-4">
											<label class="col-sm-4 col-form-label input__label">Kode Produk :</label>
											<div class="col-sm-8">
												<input type="text" name="kd_produk" id="kd_produk" class="form-control input-style" value="<?php echo $kodeProduk?>" readonly>
											</div>
										</div>

										<div class="form-group row mb-4">
											<label class="col-sm-4 col-form-label input__label">Nama Makanan :</label>
											<div class="col-sm-8">
												<input type="text" name="nama_produk" id="nama_produk" class="form-control input-style" placeholder="Isi Nama Makanan">
											</div>
										</div>

										<div class="form-group row mb-4">
											<label class="col-sm-4 col-form-label input__label">Kategori Produk :</label>
											<div class="col-sm-8">
												<input type="text" name="kategori_produk" id="kategori_produk" class="form-control input-style" value="Makanan" readonly>
											</div>
										</div>

										<div class="form-group row mb-4">
											<label class="col-sm-4 col-form-label input__label">Harga (Rp) :</label>
											<div class="col-sm-8">
												<input type="number" step="1000" name="harga" id="harga" class="form-control input-style" placeholder="Isi Harga Satuan">
											</div>
										</div>
									</div>

									<div class="col-lg-6">
										<input type="hidden" id="nothing">

										<div class="form-group row mb-4">
											<label class="col-sm-5 col-form-label input__label">Kode Bahan Baku :</label>
											<div class="col-sm-7">
												<input list="list_bahanbaku" name="kd_bahanbaku" id="kd_bahanbaku" class="form-control input-style reset" placeholder="Isi Kode Bahan Baku" autocomplete="off" onchange="changevalue1(this.value)">
													<datalist id="list_bahanbaku">
														<?php
															$jsArray1 = "var dataBB = new Array();\n";

															while($row = mysqli_fetch_array($dataBB)) {
														?>
															<option value="<?php echo $row['kd_bahanbaku']?>"><?php echo $row['nama_bahanbaku']?></option>
															<?php
																$jsArray1 .= "dataBB['" . $row['kd_bahanbaku'] . "'] = {nama_bahanbaku:'" . $row['nama_bahanbaku'] . "'};\n";
															?>
														<?php } ?>
													</datalist>
											</div>
										</div>

										<div class="form-group row mb-4">
											<label class="col-sm-5 col-form-label input__label">Nama Bahan Baku :</label>
											<div class="col-sm-7">
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text bg-light text-primary"><i class="fa fa-cubes"></i></span>
													</div>

													<input type="text" name="nama_bahanbaku" id="nama_bahanbaku" class="form-control input-style reset" readonly>
												</div>
											</div>
										</div>

										<div class="form-group row mb-4">
											<label class="col-sm-5 col-form-label input__label">Jumlah Butuh (Kg) :</label>
											<div class="col-sm-7">
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text bg-light text-primary"><i class="fa fa-plus-circle"></i></span>
													</div>

													<input type="number" step="0.001" name="jumlah_dibutuhkan" id="jumlah_dibutuhkan" class="form-control input-style reset" placeholder="Isi Jumlah Dibutuhkan">
												</div>
											</div>
										</div>

										<div class="form-group">
											<button type="button" name="tambah_bahanbaku" id="tambah_bahanbaku" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</button>
										</div>
									</div>
								</div>

								<table class="table table-bordered table-hover mt-4 mb-4">
									<thead class="text-primary" style="background-color: #eee;">
										<tr>
											<th class="text-center">No.</th>
											<th>Kode Bahan Baku</th>
											<th>Nama Bahan Baku</th>
											<th>Jumlah Dibutuhkan</th>
											<th class="text-center">Aksi</th>
										</tr>
									</thead>
									<tbody id="tabel_bbmakanan">
										<?php include 'tampil_databbmakanan.php';?>
									</tbody>
								</table>
							</div>

							<div class="form-group text-center">
								<button type="button" name="simpan_makanan" id="simpan_makanan" class="btn btn-success text-light mt-4"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
							</div>
						</div>
					</div>
				</div>
				<!-- End Form -->

				<!-- Modal Hapus Data Bahan Baku -->
				<div class="modal fade modalDataBBMakanan" tabindex="-1" role="dialog" aria-labelledby="HapusDataBahanBaku" aria-hidden="true">
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
				<!-- End Hapus Data Bahan Baku -->

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
		$(document).on('click', '#tambah_bahanbaku', function() {
			var kd_produk = $('#kd_produk').val();
			var kd_bahanbaku = $('#kd_bahanbaku').val();
			var jumlah_dibutuhkan = $('#jumlah_dibutuhkan').val();

			if(kd_bahanbaku == '' ) {
				const Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 3000
				});

				Toast.fire({
					icon: 'error',
					title: 'Tolong pilih Kode Bahan Baku!'
				})
				$('#kd_bahanbaku').focus();
			} else if(jumlah_dibutuhkan == '') {
				const Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 3000
				});

				Toast.fire({
					icon: 'error',
					title: 'Tolong diisi Jumlah Dibutuhkan!'
				})
				$('#jumlah_dibutuhkan').focus();
			} else if(jumlah_dibutuhkan <= 0) {
				const Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 3000
				});

				Toast.fire({
					icon: 'error',
					title: 'Jumlah Dibutuhkan tidak boleh <= 0!'
				})
				$('#jumlah_dibutuhkan').val('');
				$('#jumlah_dibutuhkan').focus();
			} else {
				$.ajax({
					type: 'POST',
					url: '<?php echo base_url()?>/tambah_databbmakanan.php',
					data: ({'tambah_bahanbaku' : true, 'kd_produk' : kd_produk, 'kd_bahanbaku' : kd_bahanbaku, 'jumlah_dibutuhkan' : jumlah_dibutuhkan}),
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
						})

						$('#kd_bahanbaku').val('');
						$('#nama_bahanbaku').val('');
						$('#jumlah_dibutuhkan').val('');
						$('#kd_bahanbaku').focus();
						$('#tabel_bbmakanan').load('<?php echo base_url()?>/tampil_databbmakanan.php', function() {
							calculate();
						});
					}
				});
			}
		});

		$(document).on('click', '.btnHapus', function(e) {
			e.preventDefault();

			var tr = $(this).parent().parent();

			$('.modalDataBBMakanan').modal('show');
			var nama = $(this).data('nama');
			$('#nama').text(nama);

			var href = $(this).attr('href');

			$('.btnYa').off();
			$('.btnYa').on('click', function() {
				$.ajax({
					url: href,
					type: 'POST',
					success: function(result) {
						if(result == 1) {
							$(".modalDataBBMakanan").modal('hide');
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

							$('#tabel_bbmakanan').load('<?php echo base_url()?>/tampil_databbmakanan.php', function() {
								calculate();
							});
						}
					}
				});
			});
		});

		function calculate() {
			var value1 = 0;
			$('#tabel_bbmakanan tr').each(function() {
				value1 += parseFloat($(this).find('#total').text());
			});
			isNaN(value1) ? $('#nothing').val(0) : $('#total').val(value1);

			var value2 = value1;
			if(isNaN(value2)) {
				$('#nothing').val(0);
			} else {
				$('#nothing').val(value2);
			}
		}

		$(document).on('click', '#simpan_makanan', function() {
			var kd_produk = $('#kd_produk').val();
			var nama_produk = $('#nama_produk').val();
			var kategori_produk = $('#kategori_produk').val();
			var harga = $('#harga').val();

			if(nama_produk == '') {
				const Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 3000
				});

				Toast.fire({
					icon: 'error',
					title: 'Tolong diisi Nama Makanan!'
				})
				$('#nama_produk').focus();
			} else if(harga == '') {
				const Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 3000
				});

				Toast.fire({
					icon: 'error',
					title: 'Tolong diisi Harga Satuannya!'
				})
				$('#harga').focus();
			} else if(harga < 1) {
				const Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 3000
				});

				Toast.fire({
					icon: 'error',
					title: 'Harga tidak boleh < Rp1,00!'
				})
				$('#harga').val('');
				$('#harga').focus();
			} else if($('#nothing').val() == '0') {
				const Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 3000
				});

				Toast.fire({
					icon: 'error',
					title: 'Data bahan baku tidak terisi!'
				})
				$('#kd_bahanbaku').focus();
			} else {
				$.ajax({
					type: 'POST',
					url: '<?php echo base_url()?>/tambah_produkMakanan.php',
					data: ({'simpan_makanan' : true, 'kd_produk' : kd_produk, 'nama_produk' : nama_produk, 'kategori_produk' : kategori_produk, 'harga' : harga}),
					success: function() {
						Swal.fire({
							icon: 'success',
						  	title: 'Sukses!',
						  	text: 'Data berhasil ditambah.'
						}).then(function() {
							window.location = "<?php echo base_url()?>/produk_makanan.php";
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

	<!-- Otomatisasi Nama Bahan Baku -->
	<script type="text/javascript">   
    	<?php echo $jsArray1; ?> 
    	function changevalue1(kd_bahanbaku) {
    		if(kd_bahanbaku == "") {
    			$('#nama_bahanbaku').val('');
    			$('#jumlah_dibutuhkan').val('');
    			$('#reset').hide();
    			return;
    		} else {
    			document.getElementById('nama_bahanbaku').value = dataBB[kd_bahanbaku].nama_bahanbaku;
    		}
    	}; 
    </script>
	<!-- End Otomatisasi -->

	<!-- Harga Satuan -->
	<script type="text/javascript">
		$(function() {
			$("input[id=harga]").bind({
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
	<!-- End Harga Satuan -->

	<!-- Bootstrap Core JavaScript -->
	<script type="text/javascript" src="<?php echo base_url()?>/media/js/bootstrap.min.js"></script>
</body>
</html>