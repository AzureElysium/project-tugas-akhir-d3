<?php
	include 'db/koneksi.php';

	cekLogin();

	$username	= @$_SESSION['username'];
	$level		= @$_SESSION['level'];

	$sql1 = "SELECT * FROM t_user
			 WHERE username = '$username'";
	$data1 = $mysql->query($sql1) or die($mysql->error);

	if(!empty($_SESSION['username']) && !empty($_SESSION['level']) == 1) {
		$sql2 = "SELECT MAX(kd_supplier) as kdTerbesar
				 FROM t_supplier";
		$result2 = $mysql->query($sql2);

		if($_SERVER['REQUEST_METHOD'] == "POST") {
			$kd_supplier		= $_POST['kd_supplier'];
			$nama_supplier		= $_POST['nama_supplier'];
			$alamat_supplier	= $_POST['alamat_supplier'];
			$telp_supplier		= $_POST['telp_supplier'];
				
			$sql = "INSERT INTO t_supplier
					VALUES('$kd_supplier', '$nama_supplier', '$alamat_supplier', '$telp_supplier')";
			$result = $mysql->query($sql);

			if($result) {
				flash('success', "Data berhasil ditambah.");

				header('location:data_supp.php');
			} else {
				flash('error', "Error : " . $mysql->error);

				header('location:data_supp.php');
			}
		}

		$form = "Tambah";
		$action = "tambah_supp.php";

		include 'views/v_form_supplier.php';
	} else {
		header("location:index.php");
	}
?>