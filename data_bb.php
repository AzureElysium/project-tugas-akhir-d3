<?php
	include 'db/koneksi.php';

	cekLogin();

	$success = flash('success');
	$error = flash('error');

	$success2 = flash('success2');
	$error2 = flash('error2');

	$errorjumlahbb = flash('errorjumlahbb');

	$username	= @$_SESSION['username'];
	$level		= @$_SESSION['level'];

	$sql1 = "SELECT * FROM t_user
			WHERE username = '$username'";
	$data1 = $mysql->query($sql1) or die($mysql->error);

	$sql2 = "SELECT * FROM t_bahanbaku";
	$data2 = $mysql->query($sql2) or die($mysql->error);

	$sql3 = "SELECT * FROM t_pembelianbb
			 INNER JOIN t_bahanbaku ON (t_pembelianbb.kd_bahanbaku = t_bahanbaku.kd_bahanbaku)
			 INNER JOIN t_supplier ON (t_pembelianbb.kd_supplier = t_supplier.kd_supplier)
			 ORDER BY t_pembelianbb.kd_supplier, t_pembelianbb.created_at ASC";
	$data3 = $mysql->query($sql3);

	if($level == 1) {
		include 'views/v_bahan_baku.php';
	} else {
		header("location:index.php");
	}
?>