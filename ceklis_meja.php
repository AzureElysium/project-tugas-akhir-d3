<?php
	include 'db/koneksi.php';

	cekLogin();

	$username	= @$_SESSION['username'];
	$level		= @$_SESSION['level'];

	if(!empty($_SESSION['username']) && !empty($_SESSION['level']) == 0) {
		if($_SERVER['REQUEST_METHOD'] == "POST") {
			$kd_meja		= $_POST['kd_meja'];
			$kd_transaksi	= $_POST['kd_transaksi'];
			$total_bayar	= $_POST['total_bayar'];
			$bayar			= $_POST['bayar'];
			$kembalian		= $bayar-$total_bayar;

			if($bayar < $total_bayar) {
				flash('error', "Jumlah Bayar kurang!");

				header('location:status_meja.php');
			} else {
				$sql = "UPDATE t_transaksi
						SET tgl_transaksi = CURRENT_TIMESTAMP,
							bayar = '$bayar',
							kembalian = '$kembalian',
							status_transaksi = 1
						WHERE kd_transaksi = '$kd_transaksi'";
				$result = $mysql->query($sql) or die($mysql->error);

				$sql2 = "UPDATE t_meja
						 SET status_meja = 0,
						 	 kd_transaksi = 0
						 WHERE kd_meja = '$kd_meja'";
				$result2 = $mysql->query($sql2) or die($mysql->error);

				if($result && $result2) {
					echo "<script type=\"text/javascript\">
							window.open('cetak_transaksiDitempat.php?kd_transaksi=" . $kd_transaksi . "&kd_meja=" . $kd_meja . "', '_blank')
						  </script>";

					header("refresh: 0; url = status_meja.php");
				} else {
					flash('error2', $mysql->error);

					header('location:status_meja.php');
				}
			}
		}
	} else {
		header('location:index.php');
	}
?>