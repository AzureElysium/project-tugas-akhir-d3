<?php
	include 'db/koneksi.php';

	cekLogin();

	$username	= @$_SESSION['username'];
	$level		= @$_SESSION['level'];

	$sql1 = "SELECT * FROM t_user
			 WHERE username = '$username'";
	$data1 = $mysql->query($sql1) or die($mysql->error);

	if(!empty($_SESSION['username']) && !empty($_SESSION['level']) == 1) {
		$sql2 = "SELECT MAX(kd_produk) as kdTerbesar
				 FROM t_produk
				 WHERE kategori_produk = 'Minuman'";
		$result2 = $mysql->query($sql2);

		//Ambil Data Produk
		$sql3 = "SELECT * FROM t_bahanbaku";
		$dataBB = $mysql->query($sql3) or die($mysql->error);

		if(isset($_POST['simpan_minuman'])) {
			$kd_produk			= $_POST['kd_produk'];
			$nama_produk		= $_POST['nama_produk'];
			$kategori_produk	= $_POST['kategori_produk'];
			$harga				= $_POST['harga'];

			$sql = "INSERT INTO t_produk
					VALUES('$kd_produk', '$nama_produk', '$kategori_produk', '$harga')";
			$result = $mysql->query($sql);
		}
		
		include 'views/v_form_tprodukMinuman.php';
	} else {
		header("location:index.php");
	}
?>