<?php
	include 'db/koneksi.php';

	cekLogin();

	$success = flash('success');
	$error = flash('error');

	$errorjmlbeli = flash('errorjmlbeli');

	$username	= @$_SESSION['username'];
	$level		= @$_SESSION['level'];

	$sql1 = "SELECT * FROM t_user
			WHERE username = '$username'";
	$data1 = $mysql->query($sql1) or die($mysql->error);

	$kd_supplier = @$_GET['kd_supplier'];

	if(!empty($kd_supplier)) {
		$sql2 = "SELECT * FROM t_pembelianbb
				 INNER JOIN t_supplier ON (t_pembelianbb.kd_supplier = t_supplier.kd_supplier)
				 WHERE t_pembelianbb.kd_supplier = '$kd_supplier'
				 ORDER BY t_pembelianbb.created_at ASC";
		$data2 = $mysql->query($sql2) or die($mysql->error);

		$result = mysqli_fetch_object($data2);
	} else {
		header('location:pembelian_bb.php');
	}

	if($level == 1) {
		include 'views/v_formPembelianBB.php';
	} else {
		header("location:index.php");
	}
?>