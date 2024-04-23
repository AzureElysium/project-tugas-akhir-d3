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

			$sql = "UPDATE t_meja
					SET nama_meja = '$nama_meja'
					WHERE kd_meja = '$kd_meja'";
			$result = $mysql->query($sql);

			if($result) {
				flash('success2', "Data berhasil diubah.");

				header('location:data_meja.php');
			} else {
				flash('error2', "Error : " . $mysql->error);

				header('location:data_meja.php');
			}
		}

		$kd_meja = @$_GET['kd_meja'];

		if(!empty($kd_meja)) {
			$sql = "SELECT * FROM t_meja
					WHERE kd_meja = '$kd_meja'";
			$data = $mysql->query($sql) or die($mysql->error);

			$result = mysqli_fetch_object($data);
		} else {
			header('location:data_meja.php');
		}

		$form = "Edit";
		$action = "ubah_meja.php";

		include 'views/v_form_meja.php';
	} else {
		header("location:index.php");
	}
?>