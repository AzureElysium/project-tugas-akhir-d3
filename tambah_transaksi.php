<?php
	include 'db/koneksi.php';

	cekLogin();

	$username	= @$_SESSION['username'];
	$level		= @$_SESSION['level'];

	if(!empty($_SESSION['username']) && !empty($_SESSION['level']) == 0) {
		if(isset($_POST['proses_transaksi'])) {
			$kd_transaksi 	= $_POST['kd_transaksi'];
			$nama_pembeli	= $_POST['nama_pembeli'];
			$total_bayar	= $_POST['total_bayar'];
			$kd_user 		= $_POST['kd_user'];
			$kd_meja		= $_POST['kd_meja'];

			$sql = "INSERT INTO t_transaksi
					VALUES('$kd_transaksi', CURRENT_TIMESTAMP, '$nama_pembeli', '$total_bayar', 0, 0, 0, '$kd_user')";
			$result = $mysql->query($sql);

			$sql2 = "UPDATE t_meja
					 SET status_meja = 1,
					 	 kd_transaksi = '$kd_transaksi'
					 WHERE kd_meja = '$kd_meja'";
			$result2 = $mysql->query($sql2);
		}
	} else {
		header('location:index.php');
	}
?>