<?php
	include 'db/koneksi.php';

	cekLogin();

	$username	= @$_SESSION['username'];
	$level		= @$_SESSION['level'];

	$sql1 = "SELECT * FROM t_user
			 WHERE username = '$username'";
	$data1 = $mysql->query($sql1) or die($mysql->error);

	if(!empty($_SESSION['username']) && !empty($_SESSION['level']) == 1) {
		$sql2 = "SELECT MAX(kd_meja) as kdTerbesar
				 FROM t_meja";
		$result2 = $mysql->query($sql2);

		if($_SERVER['REQUEST_METHOD'] == "POST") {
			$kd_meja	= $_POST['kd_meja'];
			$nama_meja	= $_POST['nama_meja'];
				
			$sql = "INSERT INTO t_meja
					VALUES('$kd_meja', '$nama_meja', 0, 0)";
			$result = $mysql->query($sql);

			if($result) {
				flash('success', "Data berhasil ditambah.");

				header('location:data_meja.php');
			} else {
				flash('error', "Error : " . $mysql->error);

				header('location:data_meja.php');
			}
		}

		$form = "Tambah";
		$action = "tambah_meja.php";

		include 'views/v_form_meja.php';
	} else {
		header("location:index.php");
	}
?>