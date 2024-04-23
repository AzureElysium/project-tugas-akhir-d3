<?php
	include 'db/koneksi.php';

	cekLogin();

	$username	= @$_SESSION['username'];
	$level		= @$_SESSION['level'];

	$sql1 = "SELECT * FROM t_user
			 WHERE username = '$username'";
	$data1 = $mysql->query($sql1) or die($mysql->error);

	$sql2 = "SELECT MAX(kd_transaksi) as kdTerbesar
			 FROM t_transaksi";
	$data2 = $mysql->query($sql2) or die($mysql->error);

	//Ambil Data Produk
	$sql3 = "SELECT * FROM t_produk";
	$data3 = $mysql->query($sql3) or die($mysql->error);

	//Ambil Data Meja
	$sql4 = "SELECT * FROM t_meja
			 WHERE status_meja = 0";
	$data4 = $mysql->query($sql4) or die($mysql->error);

	if($level == 0) {
		include 'views/v_trans_ditempat.php';
	} else {
		header("location:index.php");
	}
?>