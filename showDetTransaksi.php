<?php
	include 'db/koneksi.php';

	cekLogin();

	$username	= @$_SESSION['username'];
	$level		= @$_SESSION['level'];

	$sql1 = "SELECT * FROM t_user
			 WHERE username = '$username'";
	$data1 = $mysql->query($sql1) or die($mysql->error);

	if(!empty($_SESSION['username']) && !empty($_SESSION['level']) == 0) {
		$kd_transaksi = $_GET['kd_transaksi'];

		if(!empty($kd_transaksi)) {
			$sql2 = "SELECT * FROM t_dettransaksi
					 INNER JOIN t_transaksi ON (t_dettransaksi.kd_transaksi = t_transaksi.kd_transaksi)
					 INNER JOIN t_produk ON (t_dettransaksi.kd_produk = t_produk.kd_produk)
					 WHERE t_dettransaksi.kd_transaksi = '$kd_transaksi'
					 ORDER BY t_dettransaksi.created_at ASC";
			$data2 = $mysql->query($sql2) or die($mysql->error);

			$sql3 = "SELECT * FROM t_transaksi
					 INNER JOIN t_user ON (t_transaksi.kd_user = t_user.kd_user)
					 WHERE t_transaksi.kd_transaksi = '$kd_transaksi'";
			$data3 = $mysql->query($sql3) or die($mysql->error);
			$dataTransaksi = mysqli_fetch_object($data3);
		} else {
			header("location:detail_trans.php");
		}

		include 'views/v_showDetTransaksi.php';
	} else {
		header("location:index.php");
	}
?>