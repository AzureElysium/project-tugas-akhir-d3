<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>DJ Resto | Kelola Akun</title>

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
						<li class="breadcrumb-item active" aria-current="page">Kelola Akun</li>
					</ol>
				</nav>
				<!-- End Breadcrumb -->

				<!-- Tabel Akun -->
				<div class="accordions pt-3">
					<div class="row">
						<div class="col-lg-12">
							<div class="card card_border border-primary-top">
								<div class="card-header chart-grid__header">
									Tabel Data Akun
								</div>

								<div class="card-body">
									<a href="tambah_dataAkun.php" class="btn btn-primary text-light mb-3"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah Akun</a>

									<div class="card card_border border-top shadow p-3">
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

										<?php if(!empty($error3)) { ?>
											<div class="alert alert-danger alert-dismissible">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<b class="text-dark"><?php echo $error3?></b>
											</div>
										<?php } ?>

										<?php if(!empty($error4)) { ?>
											<div class="alert alert-danger alert-dismissible">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<b class="text-dark"><?php echo $error4?></b>
											</div>
										<?php } ?>

										<?php if(!empty($error5)) { ?>
											<div class="alert alert-danger alert-dismissible">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<b class="text-dark"><?php echo $error5?></b>
											</div>
										<?php } ?>

										<?php if(!empty($error6)) { ?>
											<div class="alert alert-danger alert-dismissible">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<b class="text-dark"><?php echo $error6?></b>
											</div>
										<?php } ?>

										<?php if(!empty($error7)) { ?>
											<div class="alert alert-danger alert-dismissible">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<b class="text-dark"><?php echo $error7?></b>
											</div>
										<?php } ?>

										<div class="table-responsive">
											<table id="table_infoProfil" class="display" style="width: 100%;">
												<thead>
													<tr>
														<th>Nama</th>
														<th>Username</th>
														<th>Level</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php while($user2 = mysqli_fetch_object($data2)) { ?>
														<tr>
															<td><img src="<?php echo base_url()?>/media/img/<?php echo $user2->file?>" class="rounded-circle mr-4" width="50px" height="50px" alt=""><?php echo $user2->nama?></td>
															<td><?php echo $user2->username?></td>
															<td>
																<?php if($user2->level == 1) { ?>
																	<span class="badge badge-success">Pengelola</span>
																<?php } else if($user2->level == 0) { ?>
																	<span class="badge badge-danger">Kasir</span>
																<?php } else { ?>
																	<span class="badge badge-warning">NULL</span>
																<?php } ?>
															</td>
															<td>
																<a id="infoDataAkun" class="btn btn-info text-light mr-2" data-toggle="modal" data-target="#modal_infoDataAkun"
																data-file="<?php echo $user2->file?>"
																data-nama="<?php echo $user2->nama?>"
																data-username="<?php echo $user2->username?>"
																data-noktp="<?php echo $user2->no_ktp?>"
																data-jk="<?php echo $user2->jk?>"
																data-agama="<?php echo $user2->agama?>"
																data-tempatlahir="<?php echo $user2->tempat_lahir?>"
																data-tgllahir="<?php echo date("d-m-Y", strtotime($user2->tgl_lahir))?>"
																data-alamat="<?php echo $user2->alamat?>"
																data-email="<?php echo $user2->email?>"
																data-nohp="<?php echo $user2->no_hp?>"><i class="fa fa-navicon"></i></a>
																<a href="ubah_dataAkun.php?kd_user=<?php echo $user2->kd_user?>" class="btn btn-warning text-light mr-2"><i class="fa fa-pencil"></i></a>
																<a href="hapus_dataAkun.php?kd_user=<?php echo $user2->kd_user?>" class="btn btn-danger text-light btnHapus" data-nama="<?php echo $user2->nama?>"><i class="fa fa-trash"></i></a>
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
				<!-- End Tabel Akun -->

				<!-- Modal Hapus Data Akun -->
				<div class="modal fade modalDataAkun" tabindex="-1" role="dialog" aria-labelledby="HapusDataAkun" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-tittle">Konfirmasi</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>

							<div class="modal-body">
								Apakah Anda ingin menghapus akun <b id="nama2"></b> ?
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-warning text-light btnYa">Ya</button>
								<button type="button" class="btn btn-success text-light" data-dismiss="modal">Tidak</button>
							</div>
						</div>
					</div>
				</div>
				<!-- End Hapus Data Akun -->

				<!-- Modal Info Lanjutan Data Akun -->
				<div class="modal fade" id="modal_infoDataAkun" tabindex="-1" role="dialog" aria-labelledby="InfoLanjutanDataAkun" aria-hidden="true">
					<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-tittle" id="InfoLanjutanDataAkun">Info Lanjutan Data Akun</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>

							<div class="modal-body text-center">
								<div class="card text-center card_border py-1">
									<div class="card-body">
										<div class="row">
											<div class="col-lg-5 border-right">
												<div class="thumbnail">
													<img src="" id="file1" class="rounded-lg mx-auto d-block" id="file1" alt="" style="max-width: 85%;">

													<div class="caption">
														<h5 class="card__title mt-3" id="file2"></h5>
													</div>
												</div>
											</div>

											<div class="col-lg-7">
												<div class="table-responsive">
													<table class="table table-sm table-striped text-left">
														<tr>
															<td><p>Nama</p></td>
															<td><p>&nbsp;:&nbsp;</p></td>
															<td><b><p id="nama1"></p></b></td>
														</tr>
														<tr>
															<td><p>Username</p></td>
															<td><p>&nbsp;:&nbsp;</p></td>
															<td><b><p id="username1"></p></b></td>
														</tr>
														<tr>
															<td><p>No.&nbsp;KTP</p></td>
															<td><p>&nbsp;:&nbsp;</p></td>
															<td><b><p id="noKtp1"></p></b></td>
														</tr>
														<tr>
															<td><p>Jenis&nbsp;Kelamin</p></td>
															<td><p>&nbsp;:&nbsp;</p></td>
															<td><b><p id="jk1"></p></b></td>
														</tr>
														<tr>
															<td><p>Agama</p></td>
															<td><p>&nbsp;:&nbsp;</p></td>
															<td><b><p id="agama1"></p></b></td>
														</tr>
														<tr>
															<td><p>Tempat&nbsp;Lahir</p></td>
															<td><p>&nbsp;:&nbsp;</p></td>
															<td><b><p id="tempatLahir1"></p></b></td>
														</tr>
														<tr>
															<td><p>Tanggal&nbsp;Lahir</p></td>
															<td><p>&nbsp;:&nbsp;</p></td>
															<td><b><p id="tglLahir1"></p></b></td>
														</tr>
														<tr>
															<td><p>Alamat</p></td>
															<td><p>&nbsp;:&nbsp;</p></td>
															<td><b><p id="alamat1"></p></b></td>
														</tr>
														<tr>
															<td><p>E-mail</p></td>
															<td><p>&nbsp;:&nbsp;</p></td>
															<td><b><p id="email1"></p></b></td>
														</tr>
														<tr>
															<td><p>No.&nbsp;HP</p></td>
															<td><p>&nbsp;:&nbsp;</p></td>
															<td><b><p id="noHp1"></p></b></td>
														</tr>
													</table>
												</div>
											</div>
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
				<!-- End Info Lanjutan Data Akun -->

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
			$('#table_infoProfil').DataTable();
		});
	</script>
	<script type="text/javascript" src="<?php echo base_url()?>/media/js/jquery.dataTables.min.js"></script>
	<!-- End Data Tables -->

	<!-- Modal Hapus Data Akun -->
	<script type="text/javascript">
		$(function() {
			$(".btnHapus").on("click", function(e) {
				e.preventDefault();

				var tr = $(this).parent().parent();

				$(".modalDataAkun").modal('show');
				var nama = $(this).data('nama');
				$('#nama2').text(nama);

				var href = $(this).attr('href');

				$('.btnYa').off();
				$('.btnYa').on('click', function() {
					$.ajax({
						'url'		: href,
						'type'		: 'POST',
						'success'	: function(result) {
							if(result == 1) {
								$(".modalDataAkun").modal('hide');
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
	<!-- End Hapus Data Akun -->

	<!-- Modal Info Lanjutan Data Akun -->
	<script type="text/javascript">
		$(document).ready(function() {
			$(document).on('click', '#infoDataAkun', function() {
				var file = $(this).data('file');
				var nama = $(this).data('nama');
				var username = $(this).data('username');
				var noKtp = $(this).data('noktp');
				var jk = $(this).data('jk');
				var agama = $(this).data('agama');
				var tempatLahir = $(this).data('tempatlahir');
				var tglLahir = $(this).data('tgllahir');
				var alamat = $(this).data('alamat');
				var email = $(this).data('email');
				var noHp = $(this).data('nohp');

				$('#file1').attr("src", "media/img/"+file);
				$('#file2').text(file);
				$('#nama1').text(nama);
				$('#username1').text(username);
				$('#noKtp1').text(noKtp);
				$('#jk1').text(jk);
				$('#agama1').text(agama);
				$('#tempatLahir1').text(tempatLahir);
				$('#tglLahir1').text(tglLahir);
				$('#alamat1').text(alamat);
				$('#email1').text(email);
				$('#noHp1').text(noHp);
			});
		});
	</script>
	<!-- End Info Lanjutan Data Akun -->

	<!-- Bootstrap Core JavaScript -->
	<script type="text/javascript" src="<?php echo base_url()?>/media/js/bootstrap.min.js"></script>
</body>
</html>