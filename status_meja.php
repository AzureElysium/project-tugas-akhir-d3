<?php
	include 'db/koneksi.php';

	cekLogin();

	$error = flash('error');
	$error2 = flash('error2');

	$username	= @$_SESSION['username'];
	$level		= @$_SESSION['level'];

	$sql1 = "SELECT * FROM t_user
			 WHERE username = '$username'";
	$data1 = $mysql->query($sql1) or die($mysql->error);

	//Ambil Data Meja
	$sql2 = "SELECT * FROM t_meja
			 INNER JOIN t_transaksi ON (t_meja.kd_transaksi = t_transaksi.kd_transaksi)
			 WHERE t_meja.status_meja = 1
			 ORDER BY t_meja.kd_meja ASC";
	$data2 = $mysql->query($sql2) or die($mysql->error);

	//Ambil Data Meja 2
	$sql3 = "SELECT * FROM t_meja
			 ORDER BY kd_meja ASC";
	$data3 = $mysql->query($sql3) or die($mysql->error);

	if($level == 0) {
		include 'views/v_status_meja.php';
	} else {
		header("location:index.php");
	}
?>