<?php
	include 'db/koneksi.php';

	cekLogin();

	$success = flash('success');
	$error = flash('error');

	$success2 = flash('success2');
	$error2 = flash('error2');

	$error3 = flash('error3');
	$error4 = flash('error4');
	$error5 = flash('error5');
	$error6 = flash('error6');
	$error7 = flash('error7');

	$username	= @$_SESSION['username'];
	$level		= @$_SESSION['level'];

	$sql1 = "SELECT * FROM t_user
			WHERE username = '$username'";
	$data1 = $mysql->query($sql1) or die($mysql->error);

	$sql2 ="SELECT * FROM t_user";
	$data2 = $mysql->query($sql2) or die($mysql->error);

	if($level == 1) {
		include 'views/v_dataAkun.php';
	} else {
		header("location:index.php");
	}
?>