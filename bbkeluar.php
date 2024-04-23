<?php
	include 'db/koneksi.php';

	cekLogin();

	$username	= @$_SESSION['username'];
	$level		= @$_SESSION['level'];

	$sql1 = "SELECT * FROM t_user
			 WHERE username = '$username'";
	$data1 = $mysql->query($sql1) or die($mysql->error);

	$sql2 = "SELECT *, ROUND(SUM(jumlah_terpakai), 6) AS JumlahTerpakai
			 FROM t_bbkeluar
			 INNER JOIN t_bahanbaku ON (t_bbkeluar.kd_bahanbaku = t_bahanbaku.kd_bahanbaku)
			 INNER JOIN t_transaksi ON (t_bbkeluar.kd_transaksi = t_transaksi.kd_transaksi)
			 WHERE t_bbkeluar.kd_transaksi = t_transaksi.kd_transaksi
			 AND t_transaksi.status_transaksi = 1
			 GROUP BY t_bbkeluar.kd_bahanbaku
			 ORDER BY JumlahTerpakai DESC";
	$data2 = $mysql->query($sql2) or die($mysql->error);

	if($level == 1) {
		include 'views/v_bbKeluar.php';
	} else {
		header("location:index.php");
	}
?>