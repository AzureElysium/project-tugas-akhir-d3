<?php
	include 'db/koneksi.php';

	cekLogin();

	$username	= @$_SESSION['username'];
	$level		= @$_SESSION['level'];

	if(!empty($_SESSION['username']) && !empty($_SESSION['level']) == 1) {
		$kd_bahanbaku = $_GET['kd_bahanbaku'];
		$kd_supplier = $_GET['kd_supplier'];
		$jumlah_beli = $_POST['jumlah_beli'];

		if(!empty($kd_bahanbaku)) {
			$sql = "UPDATE t_bahanbaku
					SET jumlah_bahanbaku = jumlah_bahanbaku + '$jumlah_beli'
					WHERE kd_bahanbaku = '$kd_bahanbaku'";
			$sql2 = "DELETE FROM t_pembelianbb
					 WHERE kd_bahanbaku = '$kd_bahanbaku'
					 AND kd_supplier = '$kd_supplier'";

			if($mysql->query($sql) && $mysql->query($sql2)) {
				echo 1;
			} else {
				echo 0;
			}
		}
	} else {
		header('location:index.php');
	}
?>