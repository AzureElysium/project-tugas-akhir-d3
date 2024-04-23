<?php
	include 'db/koneksi.php';

	cekLogin();

	$username	= @$_SESSION['username'];
	$level		= @$_SESSION['level'];

	$sql1 = "SELECT * FROM t_user
			 WHERE username = '$username'";
	$data1 = $mysql->query($sql1) or die($mysql->error);

	if(!empty($_SESSION['username']) && !empty($_SESSION['level']) == 1) {
		if($_SERVER['REQUEST_METHOD'] == "POST") {
			$kd_bahanbaku	= $_POST['kd_bahanbaku'];
			$nama_bahanbaku	= $_POST['nama_bahanbaku'];
			$kd_supplier	= $_POST['kd_supplier'];
			$harga_kg		= $_POST['harga_kg'];
			$jumlah_beli	= $_POST['jumlah_beli'];
			$created_at		= date('Y-m-d H:i:s');

			//Ambil Data Supplier
			$sql3 = "SELECT * FROM t_supplier
					 WHERE kd_supplier = '$kd_supplier'";
			$data3 = $mysql->query($sql3);
			$dataSupplier = mysqli_fetch_object($data3);
			//End

			if($jumlah_beli <= 0) {
				flash('errorjmlbeli', "Jumlah Beli tidak boleh <= 0!");

				header('location:pembelian_bb.php');
			} else {
				//Cek Data Item Sama
				$sql2 = "SELECT * FROM t_pembelianbb
						 WHERE kd_bahanbaku = '$kd_bahanbaku'
						 AND kd_supplier = '$kd_supplier'";
				$data = $mysql->query($sql2);
				//End

				if($data->num_rows > 0) {
					$sql = "UPDATE t_pembelianbb
							SET jumlah_beli = jumlah_beli + '$jumlah_beli',
								harga_kg = '$harga_kg'
							WHERE kd_bahanbaku = '$kd_bahanbaku'
							AND kd_supplier = '$kd_supplier'";
					$result = $mysql->query($sql);
				} else {
					$sql = "INSERT INTO t_pembelianbb
							VALUES('$jumlah_beli', '$harga_kg', '$kd_supplier', '$kd_bahanbaku', '$created_at')";
					$result = $mysql->query($sql);
				}

				if($result) {
					flash('success', 'Data Pembelian <b>' . $nama_bahanbaku . '</b> dengan Supplier <b>' . $dataSupplier->nama_supplier . '</b> telah ditambahkan.');

					header('location:pembelian_bb.php');
				} else {
					flash('error', $mysql->error);

					header('location:pembelian_bb.php');
				}
			}
		}
	} else {
		header("location:index.php");
	}
?>