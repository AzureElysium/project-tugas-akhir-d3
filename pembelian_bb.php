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

	if($level == 1) {
		include 'views/v_pembelianBB.php';
	} else {
		header("location:index.php");
	}
?>