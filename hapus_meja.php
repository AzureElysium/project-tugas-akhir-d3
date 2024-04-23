<?php
	include 'db/koneksi.php';

	if(!empty($_SESSION['username']) && !empty($_SESSION['level']) == 1) {
		$kd_meja = $_GET['kd_meja'];

		if(!empty($kd_meja)) {
			$sql = "DELETE FROM t_meja
					WHERE kd_meja = '$kd_meja'";

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