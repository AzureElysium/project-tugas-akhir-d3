<?php
	include 'db/koneksi.php';

	cekLogin();

	$username	= @$_SESSION['username'];
	$level		= @$_SESSION['level'];

	$sql1 = "SELECT * FROM t_user
			 WHERE username = '$username'";
	$data1 = $mysql->query($sql1) or die($mysql->error);

	$sql2 = "SELECT a.kd_produk, b.nama_produk, b.kategori_produk, c.kd_transaksi, c.status_transaksi, SUM(a.qty) AS TotalQty, SUM(a.sub_total) AS TotalPenjualan
			 FROM t_dettransaksi a, t_produk b, t_transaksi c
			 WHERE a.kd_produk = b.kd_produk
			 AND a.kd_transaksi = c.kd_transaksi
			 AND c.status_transaksi = 1
			 GROUP BY a.kd_produk
			 ORDER BY TotalQty DESC";
	$data2 = $mysql->query($sql2) or die($mysql->error);

	if($level == 1) {
		include 'views/v_penProduk.php';
	} else {
		header("location:index.php");
	}
?>