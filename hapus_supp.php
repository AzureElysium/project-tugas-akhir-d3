<?php
	include 'db/koneksi.php';

	if(!empty($_SESSION['username']) && !empty($_SESSION['level']) == 1) {
		$kd_supplier = $_GET['kd_supplier'];

		if(!empty($kd_supplier)) {
			$sql = "DELETE FROM t_supplier
					WHERE kd_supplier = '$kd_supplier'";

			$sql2 = "DELETE FROM t_pembelianbb
					 WHERE kd_supplier = '$kd_supplier'";

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