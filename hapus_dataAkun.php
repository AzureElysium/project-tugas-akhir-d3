<?php
	include 'db/koneksi.php';

	if(!empty($_SESSION['username']) && !empty($_SESSION['level']) == 1) {
		$kd_user = $_GET['kd_user'];

		if(!empty($kd_user)) {
			$sql = "DELETE FROM t_user
					WHERE kd_user = '$kd_user'";

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