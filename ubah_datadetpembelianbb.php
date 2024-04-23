<?php
	include 'db/koneksi.php';

	cekLogin();

	$username	= @$_SESSION['username'];
	$level		= @$_SESSION['level'];

	if(!empty($_SESSION['username']) && !empty($_SESSION['level']) == 1) {
		if($_SERVER['REQUEST_METHOD'] == "POST") {
			$kd_bahanbaku	= $_POST['kd_bb'];
			$kd_supplier	= $_POST['kd_supp'];
			$jumlah_beli	= $_POST['jumlah_beli'];
			$harga_kg		= $_POST['harga_kg'];

			if($jumlah_beli <= 0) {
				flash('errorjmlbeli', "Jumlah Beli tidak boleh <= 0!");

				header('location:tampil_nextpembelianbb.php?kd_supplier=' . $kd_supplier);
			} else {
				$sql = "UPDATE t_pembelianbb
						SET jumlah_beli = '$jumlah_beli',
							harga_kg = '$harga_kg'
						WHERE kd_bahanbaku = '$kd_bahanbaku'
						AND kd_supplier = '$kd_supplier'";
				$result = $mysql->query($sql);

				if($result) {
					flash('success', "Data berhasil diubah.");

					header('location:tampil_nextpembelianbb.php?kd_supplier=' . $kd_supplier);
				} else {
					flash('error', $mysql->error);

					header('location:tampil_nextpembelianbb.php?kd_supplier' . $kd_supplier);
				}
			}
		}
	} else {
		header('location:index.php');
	}
?>