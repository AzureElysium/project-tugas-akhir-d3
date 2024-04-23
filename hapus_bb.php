<?php
	include 'db/koneksi.php';

	if(!empty($_SESSION['username']) && !empty($_SESSION['level']) == 1) {
		$kd_bahanbaku = $_GET['kd_bahanbaku'];

		if(!empty($kd_bahanbaku)) {
			$sql = "DELETE FROM t_bahanbaku
					WHERE kd_bahanbaku = '$kd_bahanbaku'";

			$sql2 = "DELETE FROM t_detproduk
					 WHERE kd_bahanbaku = '$kd_bahanbaku'";

			$sql3 = "DELETE FROM t_bbkeluar
					 WHERE kd_bahanbaku = '$kd_bahanbaku'";

			$sql4 = "DELETE FROM t_pembelianbb
					 WHERE kd_bahanbaku = '$kd_bahanbaku'";

			if($mysql->query($sql) && $mysql->query($sql2) && $mysql->query($sql3) && $mysql->query($sql4)) {
				echo 1;
			} else {
				echo 0;
			}
		}
	} else {
		header('location:index.php');
	}
?>