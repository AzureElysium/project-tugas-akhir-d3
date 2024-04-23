<?php
	include 'db/koneksi.php';

	if(!empty($_SESSION['username']) && !empty($_SESSION['level']) == 1) {
		$kd_produk = $_GET['kd_produk'];

		if(!empty($kd_produk)) {
			$sql = "DELETE FROM t_produk
					WHERE kd_produk = '$kd_produk'";
			$data = $mysql->query($sql);

			$sql2 = "DELETE FROM t_detproduk
					 WHERE kd_produk = '$kd_produk'";
			$data2 = $mysql->query($sql2);

			$sql3 = "DELETE FROM t_dettransaksi
					 WHERE kd_produk = '$kd_produk'";
			$data3 = $mysql->query($sql3);

			if($data && $data2 && $data3) {
				echo 1;
			} else {
				echo 0;
			}
		}
	} else {
		header('location:index.php');
	}
?>