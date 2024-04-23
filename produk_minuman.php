<?php
	include 'db/koneksi.php';

	cekLogin();

	$username	= @$_SESSION['username'];
	$level		= @$_SESSION['level'];

	$sql1 = "SELECT * FROM t_user
			 WHERE username = '$username'";
	$data1 = $mysql->query($sql1) or die($mysql->error);

	$sql2 = "SELECT * FROM t_produk
			 WHERE kategori_produk = 'Minuman'";
	$data2 = $mysql->query($sql2) or die($mysql->error);

	if($level == 1) {
		include 'views/v_produk_minuman.php';
	} else {
		header("location:index.php");
	}
?>