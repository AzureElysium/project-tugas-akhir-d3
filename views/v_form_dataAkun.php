<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>DJ Resto | Kelola Akun - <?php echo $form?> Data Akun</title>

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
<body onload="fokus()">
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

					<li class="active"><a href="data_akun.php"><i class="fa fa-users"></i> <span>Kelola Akun</span></a></li>

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
						<li class="breadcrumb-item"><a href="data_akun.php">Kelola Akun</a></li>
						<li class="breadcrumb-item active" aria-current="page"><?php echo $form?> Data Akun</li>
					</ol>
				</nav>
				<!-- End Breadcrumb -->

				<!-- Form Tambah/Ubah Data -->
				<div class="accordions pt-3">
					<div class="row">
						<div class="col-lg-1">
							&nbsp;
						</div>

						<div class="col-lg-10">
							<div class="card card_border border-primary-top">
								<form name="form_dataAkun" action="<?php echo $action?>" id="needs-validation" method="POST" enctype="multipart/form-data" novalidate>
									<div class="card-header chart-grid__header">
										<?php echo $form?> Data Akun
									</div>

									<div class="card-body">
										<a href="data_akun.php" class="btn btn-warning text-light mb-3"><i class="fa fa-chevron-left"></i>&nbsp;&nbsp;Kembali</a>

										<div class="card card_border border-top shadow p-3">
											<?php if(!empty($errorktp)) { ?>
												<div class="alert alert-danger alert-dismissible">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<b class="text-dark"><?php echo $errorktp?></b>
												</div>
											<?php } ?>

											<?php if(!empty($erroremail)) { ?>
												<div class="alert alert-danger alert-dismissible">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<b class="text-dark"><?php echo $erroremail?></b>
												</div>
											<?php } ?>

											<?php if(!empty($errorusername)) { ?>
												<div class="alert alert-danger alert-dismissible">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<b class="text-dark"><?php echo $errorusername?></b>
												</div>
											<?php } ?>

											<?php if(!empty($errorpass)) { ?>
												<div class="alert alert-danger alert-dismissible">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<b class="text-dark"><?php echo $errorpass?></b>
												</div>
											<?php } ?>

											<div class="row">
												<div class="col-lg-7 border-right">
													<?php if($form == 'Edit') { ?>
														<input type="hidden" name="kd_user" value="<?php echo @$result->kd_user?>">
														<input type="hidden" name="no_ktpLama" value="<?php echo @$result->no_ktp?>">
														<input type="hidden" name="emailLama" value="<?php echo @$result->email?>">
														<input type="hidden" name="usernameLama" value="<?php echo @$result->username?>">
													<?php } ?>

													<div class="form-group mb-4">
														<label class="input__label">Nama</label>
														<input type="text" name="nama" class="form-control input-style" placeholder="Isi Nama Lengkap" value="<?=isset($_POST['nama']) ? $nama : @$result->nama?>" required>
														<div class="invalid-feedback">Tolong diisi Nama Lengkap.</div>
													</div>

													<div class="form-group mb-4">
														<label class="input__label">No. KTP</label>
														<input type="text" id="no_ktp" name="no_ktp" class="form-control input-style" placeholder="Isi Nomor KTP" value="<?=isset($_POST['no_ktp']) ? $no_ktp : @$result->no_ktp?>" pattern="^\d{16}$" maxlength="16" required>
														<div class="invalid-feedback">Membutuhkan 16 Angka Nomor KTP.</div>
													</div>

													<div class="form-group mb-4">
														<div class="row">
															<div class="col-lg-5">
																<label class="input__label">Jenis Kelamin</label>
																<div class="custom-control custom-radio ml-4">
																	<input type="radio" name="jk" id="Laki-laki" class="custom-control-input" value="Laki-laki" <?php echo (@$result->jk == 'Laki-laki') ? 'checked' : '' ?> required>
																	<label class="custom-control-label" for="Laki-laki">Laki-laki</label>
																</div>
																<div class="custom-control custom-radio ml-4">
																	<input type="radio" name="jk" id="Perempuan" class="custom-control-input" value="Perempuan" <?php echo (@$result->jk == 'Perempuan') ? 'checked' : '' ?> required>
																	<label class="custom-control-label" for="Perempuan">Perempuan</label>
																	<div class="invalid-feedback">Pilih salah satu.</div>
																</div>
															</div>

															<div class="col-lg-7">
																<label class="input__label">Agama</label>
																<select class="custom-select input-style" name="agama" required>
																	<option value="">-- Pilih Agama --</option>
																	<option value="Buddha" <?php echo (@$result->agama == 'Buddha') ? 'selected' : '' ?> />Buddha</option>
																	<option value="Hindu" <?php echo (@$result->agama == 'Hindu') ? 'selected' : '' ?> />Hindu</option>
																	<option value="Islam" <?php echo (@$result->agama == 'Islam') ? 'selected' : '' ?> />Islam</option>
																	<option value="Katolik" <?php echo (@$result->agama == 'Katolik') ? 'selected' : '' ?> />Katolik</option>
																	<option value="Konghucu" <?php echo (@$result->agama == 'Konghucu') ? 'selected' : '' ?> />Konghucu</option>
																	<option value="Kristen" <?php echo (@$result->agama == 'Kristen') ? 'selected' : '' ?> />Kristen</option>
																</select>
																<div class="invalid-feedback">Tolong pilih Agama.</div>
															</div>
														</div>
													</div>

													<div class="form-group mb-4">
														<div class="row">
															<div class="col-lg-6">
																<label class="input__label">Tempat Lahir</label>
																<input type="text" name="tempat_lahir" class="form-control input-style" placeholder="Isi Tempat Lahir" value="<?=isset($_POST['tempat_lahir']) ? $tempat_lahir : @$result->tempat_lahir?>" required>
																<div class="invalid-feedback">Tolong diisi Tempat Lahir.</div>
															</div>

															<div class="col-lg-6">
																<label class="input__label">Tanggal Lahir</label>
																<input type="date" name="tgl_lahir" class="form-control input-style" placeholder="Isi Tanggal Lahir" value="<?=isset($_POST['tgl_lahir']) ? $tgl_lahir : @$result->tgl_lahir?>" required>
																<div class="invalid-feedback">Tolong diisi Tanggal Lahir.</div>
															</div>
														</div>
													</div>

													<div class="form-group mb-4">
														<label class="input__label">Alamat</label>
														<textarea name="alamat" class="form-control input-style" placeholder="Isi Alamat Lengkap" required><?=isset($_POST['alamat']) ? $alamat : @$result->alamat?></textarea>
														<div class="invalid-feedback">Tolong diisi Alamat Lengkap.</div>
													</div>

													<div class="form-group mb-4">
														<label class="input__label">No. HP</label>
														<input type="text" name="no_hp" class="form-control input-style" placeholder="Isi Nomor HP" id="no_hp" pattern="^\d{11,12}$" maxlength="12" value="<?=isset($_POST['no_hp']) ? $no_hp : @$result->no_hp?>" required>
														<div class="invalid-feedback">Membutuhkan 11-12 Angka Nomor HP.</div>
													</div>

													<div class="form-group">
														<label class="input__label">E-mail</label>
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text">example@email.com</span>
															</div>

															<input type="email" name="email" class="form-control input-style" placeholder="Isi Email" pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$" value="<?=isset($_POST['email']) ? $email : @$result->email?>" required>
															<div class="invalid-feedback">Membutuhkan isian Email yang benar.</div>
														</div>
													</div>
												</div>

												<div class="col-lg-5">
													<div class="form-group mb-4">
														<label class="input__label">Username</label>
														<input type="text" name="username" maxlength="8" class="form-control input-style" placeholder="Isi Username" value="<?=isset($_POST['username']) ? $username : @$result->username?>" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{7,20}$" required>
														<div class="invalid-feedback">Membutuhkan 8 Karakter Username.</div>
													</div>

													<?php if($form == 'Tambah') { ?>
														<div class="form-group">
															<label class="input__label">Password</label>
															<div class="input-group" id="show_hide_password1">
																<input type="password" name="password" class="form-control input-style" placeholder="Isi Kata Sandi" required>

																<div class="input-group-append">
																	<a href="" class="input-group-text"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
																</div>
																<div class="invalid-feedback">Tolong diisi Password.</div>
															</div>
														</div>

														<div class="form-group mb-4">
															<label class="input__label">Ulangi Password</label>
															<div class="input-group" id="show_hide_password2">
																<input type="password" name="password2" class="form-control input-style" placeholder="Isi Ulang Kata Sandi" required>

																<div class="input-group-append">
																	<a href="" class="input-group-text"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
																</div>
																<div class="invalid-feedback">Tolong diisi kembali Password.</div>
															</div>
														</div>
													<?php } else if($form == 'Edit') { ?>
														<div class="form-group">
															<label class="input__label">Password Lama</label>
															<div class="input-group" id="show_hide_password3">
																<input type="password" name="old_password" class="form-control input-style" placeholder="Isi Kata Sandi Sebelumnya" required>

																<div class="input-group-append">
																	<a href="" class="input-group-text"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
																</div>
																<div class="invalid-feedback">Tolong diisi Password Lama.</div>
															</div>
														</div>

														<div class="form-group mb-4">
															<label class="input__label">Password Baru</label>
															<div class="input-group" id="show_hide_password4">
																<input type="password" name="new_password" class="form-control input-style" placeholder="Isi Kata Sandi Baru" required>

																<div class="input-group-append">
																	<a href="" class="input-group-text"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
																</div>
																<div class="invalid-feedback">Tolong diisi Password Baru.</div>
															</div>
														</div>
														<div class="form-group mb-4">
															<label class="input__label">Ulangi Password Baru</label>
															<div class="input-group" id="show_hide_password5">
																<input type="password" name="new_password2" class="form-control input-style" placeholder="Isi Ulang Kata Sandi Baru" required>

																<div class="input-group-append">
																	<a href="" class="input-group-text"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
																</div>
																<div class="invalid-feedback">Tolong diisi kembali Password Baru.</div>
															</div>
														</div>
													<?php } ?>

													<div class="form-group mb-4">
														<label class="input__label">Level Akses</label>

														<div class="row">
															<div class="col-lg-8">
																<select class="custom-select input-style" name="level" required>
																	<option value="">-- Pilih Level --</option>
																	<option value="1" <?php echo (@$result->level == '1') ? 'selected' : '' ?> />Pengelola</option>
																	<option value="0" <?php echo (@$result->level == '0') ? 'selected' : '' ?> />Kasir</option>
																</select>
																<div class="invalid-feedback">Tolong pilih Level Akses.</div>
															</div>
														</div>
													</div>

													<div class="form-group">
														<label class="input__label">Upload Gambar</label>
														<?php if($form == 'Edit') { ?>
															<div class="row">
																<div class="col-sm-9">
																	<img src="<?php echo base_url()?>/media/img/<?php echo @$result->file?>" class="form-control-file rounded-lg mt-1 mb-2" style="max-width: 50%;" alt="">
																	<input type="hidden" name="foto" value="<?php echo @$result->file?>">
																</div>
															</div>

															<input type="file" name="foto" class="form-control input-style">
														<?php } else { ?>
															<input type="file" name="foto" class="form-control input-style" required>
															<div class="invalid-feedback">Tolong upload Gambar.</div>
														<?php } ?>
													</div>
												</div>
											</div>
										</div>

										<div class="form-group text-center">
											<?php if($form == "Tambah") { ?>
												<button type="submit" class="btn btn-success text-light mt-4"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
											<?php } else { ?>
												<button type="submit" class="btn btn-warning text-light mt-4"><i class="fa fa-edit"></i>&nbsp;&nbsp;Ubah</button>
											<?php } ?>
										</div>
									</div>
								</form>
							</div>
						</div>

						<div class="col-lg-1">
							&nbsp;
						</div>
					</div>
				</div>
				<!-- End Form -->

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

	<!-- show_hide_password1 JavaScript -->
	<script type="text/javascript">
		$(document).ready(function() {
			$("#show_hide_password1 a").on("click", function(event) {
				event.preventDefault();

				if($("#show_hide_password1 input").attr("type") == "text") {
					$('#show_hide_password1 input').attr('type', 'password');
					$('#show_hide_password1 i').addClass( "fa-eye-slash" );
					$('#show_hide_password1 i').removeClass( "fa-eye" );
				} else if($('#show_hide_password1 input').attr("type") == "password") {
					$('#show_hide_password1 input').attr('type', 'text');
					$('#show_hide_password1 i').removeClass( "fa-eye-slash" );
					$('#show_hide_password1 i').addClass( "fa-eye" );
				}
			});
		});
	</script>
	<!-- End Show Hide -->

	<!-- show_hide_password2 JavaScript -->
	<script type="text/javascript">
		$(document).ready(function() {
			$("#show_hide_password2 a").on("click", function(event) {
				event.preventDefault();

				if($("#show_hide_password2 input").attr("type") == "text") {
					$('#show_hide_password2 input').attr('type', 'password');
					$('#show_hide_password2 i').addClass( "fa-eye-slash" );
					$('#show_hide_password2 i').removeClass( "fa-eye" );
				} else if($('#show_hide_password2 input').attr("type") == "password") {
					$('#show_hide_password2 input').attr('type', 'text');
					$('#show_hide_password2 i').removeClass( "fa-eye-slash" );
					$('#show_hide_password2 i').addClass( "fa-eye" );
				}
			});
		});
	</script>
	<!-- End Show Hide -->

	<!-- show_hide_password3 JavaScript -->
	<script type="text/javascript">
		$(document).ready(function() {
			$("#show_hide_password3 a").on("click", function(event) {
				event.preventDefault();

				if($("#show_hide_password3 input").attr("type") == "text") {
					$('#show_hide_password3 input').attr('type', 'password');
					$('#show_hide_password3 i').addClass( "fa-eye-slash" );
					$('#show_hide_password3 i').removeClass( "fa-eye" );
				} else if($('#show_hide_password3 input').attr("type") == "password") {
					$('#show_hide_password3 input').attr('type', 'text');
					$('#show_hide_password3 i').removeClass( "fa-eye-slash" );
					$('#show_hide_password3 i').addClass( "fa-eye" );
				}
			});
		});
	</script>
	<!-- End Show Hide -->

	<!-- show_hide_password4 JavaScript -->
	<script type="text/javascript">
		$(document).ready(function() {
			$("#show_hide_password4 a").on("click", function(event) {
				event.preventDefault();

				if($("#show_hide_password4 input").attr("type") == "text") {
					$('#show_hide_password4 input').attr('type', 'password');
					$('#show_hide_password4 i').addClass( "fa-eye-slash" );
					$('#show_hide_password4 i').removeClass( "fa-eye" );
				} else if($('#show_hide_password4 input').attr("type") == "password") {
					$('#show_hide_password4 input').attr('type', 'text');
					$('#show_hide_password4 i').removeClass( "fa-eye-slash" );
					$('#show_hide_password4 i').addClass( "fa-eye" );
				}
			});
		});
	</script>
	<!-- End Show Hide -->

	<!-- show_hide_password5 JavaScript -->
	<script type="text/javascript">
		$(document).ready(function() {
			$("#show_hide_password5 a").on("click", function(event) {
				event.preventDefault();

				if($("#show_hide_password5 input").attr("type") == "text") {
					$('#show_hide_password5 input').attr('type', 'password');
					$('#show_hide_password5 i').addClass( "fa-eye-slash" );
					$('#show_hide_password5 i').removeClass( "fa-eye" );
				} else if($('#show_hide_password5 input').attr("type") == "password") {
					$('#show_hide_password5 input').attr('type', 'text');
					$('#show_hide_password5 i').removeClass( "fa-eye-slash" );
					$('#show_hide_password5 i').addClass( "fa-eye" );
				}
			});
		});
	</script>
	<!-- End Show Hide -->

	<!-- Nomor KTP -->
	<script type="text/javascript">
		$(function() {
			$("input[id=no_ktp]").bind({
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
	<!-- End Nomor KTP -->

	<!-- Nomor HP -->
	<script type="text/javascript">
		$(function() {
			$("input[id=no_hp]").bind({
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
	<!-- End Nomor HP -->

	<!-- Focus Form -->
	<script type="text/javascript">
		function fokus() {
			document.form_dataAkun.nama.focus();
		}
	</script>
	<!-- End Focus -->

	<!-- Validation JavaScript -->
	<script type="text/javascript">
		(function() {  
            'use strict';  
            window.addEventListener('load', function () {  
                var form = document.getElementById('needs-validation');

                form.addEventListener('submit', function (event) {  
                    if (form.checkValidity() === false) {  
                        event.preventDefault();  
                        event.stopPropagation();  
                    }  
                    form.classList.add('was-validated');  
                }, false);  
            }, false);  
        })();
	</script>
	<!-- End Validation -->

	<!-- Bootstrap Core JavaScript -->
	<script type="text/javascript" src="<?php echo base_url()?>/media/js/bootstrap.min.js"></script>
</body>
</html>	