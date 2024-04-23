<?php
	include 'db/koneksi.php';

	cekLogin();

	$username	= @$_SESSION['username'];
	$level		= @$_SESSION['level'];

	$sql1 = "SELECT * FROM t_user
			 WHERE username = '$username'";
	$data1 = $mysql->query($sql1) or die($mysql->error);

	if(!empty($_SESSION['username']) && !empty($_SESSION['level']) == 1) {
		$sql2 = "SELECT MAX(kd_bahanbaku) as kdTerbesar
				 FROM t_bahanbaku";
		$result2 = $mysql->query($sql2);

		if($_SERVER['REQUEST_METHOD'] == "POST") {
			$kd_bahanbaku		= $_POST['kd_bahanbaku'];
			$nama_bahanbaku		= $_POST['nama_bahanbaku'];
			$jumlah_bahanbaku	= $_POST['jumlah_bahanbaku'];

			if($jumlah_bahanbaku <= 0) {
				flash('errorjumlahbb', "Jumlah Tersedia tidak boleh <= 0");

				header('location:data_bb.php');
			} else {
				$sql = "INSERT INTO t_bahanbaku
						VALUES('$kd_bahanbaku', '$nama_bahanbaku', '$jumlah_bahanbaku')";
				$result = $mysql->query($sql);

				if($result) {
					flash('success', "Data berhasil ditambah.");

					header('location:data_bb.php');
				} else {
					flash('error', "Error : " . $mysql->error);

					header('location:data_bb.php');
				}
			}
		}

		$form = "Tambah";
		$action = "tambah_bb.php";

		include 'views/v_form_bahanbaku.php';
	} else {
		header("location:index.php");
	}
?>