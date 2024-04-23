<?php
	include 'db/koneksi.php';

	if(!empty($_SESSION['username']) && !empty($_SESSION['level']) == 1) {
		$kd_bahanbaku = $_GET['kd_bahanbaku'];
		$kd_supplier = $_GET['kd_supplier'];

		if(!empty($kd_bahanbaku)) {
			$sql = "DELETE FROM t_pembelianbb
					WHERE kd_bahanbaku = '$kd_bahanbaku'
					AND kd_supplier = '$kd_supplier'";

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