<?php
	include 'db/koneksi.php';

	cekLogin();

	$success = flash('success');
	$error = flash('error');

	$success2 = flash('success2');
	$error2 = flash('error2');

	$username	= @$_SESSION['username'];
	$level		= @$_SESSION['level'];

	$sql1 = "SELECT * FROM t_user
			WHERE username = '$username'";
	$data1 = $mysql->query($sql1) or die($mysql->error);

	$sql2 = "SELECT * FROM t_supplier";
	$data2 = $mysql->query($sql2) or die($mysql->error);

	if($level == 1) {
		include 'views/v_supplier.php';
	} else {
		header("location:index.php");
	}
?>