<?php
	include 'db/koneksi.php';

	cekLogin();

	$username	= @$_SESSION['username'];
	$level		= @$_SESSION['level'];

	if(!empty($_SESSION['username']) && !empty($_SESSION['level']) == 1) {
		if(isset($_POST['tambah_bahanbaku'])) {
			$kd_produk 			= $_POST['kd_produk'];
			$kd_bahanbaku 		= $_POST['kd_bahanbaku'];
			$jumlah_dibutuhkan	= $_POST['jumlah_dibutuhkan'];
			$created_at			= date('Y-m-d H:i:s');

			//Cek Data Item Sama
			$sql2 = "SELECT * FROM t_detproduk
					 WHERE kd_produk = '$kd_produk'
					 AND kd_bahanbaku = '$kd_bahanbaku'";
			$data = $mysql->query($sql2);
			//End

			if($data->num_rows > 0) {
				$sql = "UPDATE t_detproduk
						SET jumlah_dibutuhkan = jumlah_dibutuhkan + '$jumlah_dibutuhkan'
						WHERE kd_produk = '$kd_produk'
						AND kd_bahanbaku = '$kd_bahanbaku'";
				$result = $mysql->query($sql);
			} else {
				$sql = "INSERT INTO t_detproduk
						VALUES('$jumlah_dibutuhkan', '$kd_produk', '$kd_bahanbaku', '$created_at')";
				$result = $mysql->query($sql);
			}
		}
	} else {
		header('location:index.php');
	}
?>