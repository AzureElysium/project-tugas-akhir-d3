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

			$sql = "UPDATE t_supplier
					SET nama_supplier = '$nama_supplier',
						alamat_supplier = '$alamat_supplier',
						telp_supplier = '$telp_supplier'
					WHERE kd_supplier = '$kd_supplier'";
			$result = $mysql->query($sql);

			if($result) {
				flash('success2', "Data berhasil diubah.");

				header('location:data_supp.php');
			} else {
				flash('error2', "Error : " . $mysql->error);

				header('location:data_supp.php');
			}
		}

		$kd_supplier = @$_GET['kd_supplier'];

		if(!empty($kd_supplier)) {
			$sql = "SELECT * FROM t_supplier
					WHERE kd_supplier = '$kd_supplier'";
			$data = $mysql->query($sql) or die($mysql->error);

			$result = mysqli_fetch_object($data);
		} else {
			header('location:data_supp.php');
		}

		$form = "Edit";
		$action = "ubah_supp.php";

		include 'views/v_form_supplier.php';
	} else {
		header("location:index.php");
	}
?>