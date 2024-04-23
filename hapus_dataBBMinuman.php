<?php
	include 'db/koneksi.php';

	if(!empty($_SESSION['username']) && !empty($_SESSION['level']) == 1) {
		$kd_produk = $_GET['kd_produk'];
		$kd_bahanbaku = $_GET['kd_bahanbaku'];

		if(!empty($kd_produk) && !empty($kd_bahanbaku)) {
			$sql = "DELETE FROM t_detproduk
					WHERE kd_produk = '$kd_produk'
					AND kd_bahanbaku = '$kd_bahanbaku'";

			if($mysql->query($sql)) {
				echo 1;
			} else {
				echo 0;
			}
		}
	} else {
		header('location:index.php');
	}
?>