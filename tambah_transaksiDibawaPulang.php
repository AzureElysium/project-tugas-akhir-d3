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
			$bayar 			= $_POST['bayar'];
			$kembalian		= $_POST['kembalian'];
			$kd_user 		= $_POST['kd_user'];

			$sql = "INSERT INTO t_transaksi
					VALUES('$kd_transaksi', CURRENT_TIMESTAMP, '$nama_pembeli', '$total_bayar', '$bayar', '$kembalian', 1, '$kd_user')";
			$result = $mysql->query($sql);
		}
	} else {
		header('location:index.php');
	}
?>