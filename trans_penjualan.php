<?php
	include 'db/koneksi.php';

	cekLogin();

	$username	= @$_SESSION['username'];
	$level		= @$_SESSION['level'];

	$sql1 = "SELECT * FROM t_user
			WHERE username = '$username'";
	$data1 = $mysql->query($sql1) or die($mysql->error);

	$sql2 = "SELECT * FROM t_transaksi
			 INNER JOIN t_user ON (t_transaksi.kd_user = t_user.kd_user)
			 WHERE t_transaksi.status_transaksi = 1";
	$data2 = $mysql->query($sql2) or die($mysql->error);

	$sql3 = "SELECT SUM(total_bayar)
			 AS total_penjualan
			 FROM t_transaksi";
	$result = $mysql->query($sql3);

	if($level == 1) {
		include 'views/v_trans_penjualan.php';
	} else {
		header("location:index.php");
	}
?>