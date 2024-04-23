<?php
	include 'db/koneksi.php';

	cekLogin();

	$username	= @$_SESSION['username'];
	$level		= @$_SESSION['level'];

	if(!empty($_SESSION['username']) && !empty($_SESSION['level']) == 0) {
		if(isset($_POST['tambah_detTransaksi'])) {
			$kd_transaksi 	= $_POST['kd_transaksi'];
			$qty			= $_POST['qty'];
			$sub_total		= $_POST['harga'] * $qty;
			$kd_produk		= $_POST['kd_produk'];
			$created_at		= date('Y-m-d H:i:s');

			//Cek Data Produk Sama
			$sql = "SELECT * FROM t_dettransaksi
					WHERE kd_transaksi = '$kd_transaksi'
					AND kd_produk = '$kd_produk'";
			$data = $mysql->query($sql);
			//End

			$sql2 = "SELECT * FROM t_detproduk
					 INNER JOIN t_produk ON (t_detproduk.kd_produk = t_produk.kd_produk)
					 INNER JOIN t_bahanbaku ON (t_detproduk.kd_bahanbaku = t_bahanbaku.kd_bahanbaku)
					 WHERE t_detproduk.kd_produk = '$kd_produk'";
			$result2 = $mysql->query($sql2);

			while($hasil = mysqli_fetch_array($result2)) {
				$a = $hasil['jumlah_bahanbaku'];
				$b = $hasil['jumlah_dibutuhkan'];
				$c = $qty*$b;
				$d = $a-$c;
				$e = $hasil['kd_bahanbaku'];

				$sql3 = "UPDATE t_bahanbaku
						 SET jumlah_bahanbaku = '$d'
						 WHERE kd_bahanbaku = '$e'";
				$result3 = $mysql->query($sql3);

				//Cek Data Sama
				$sql4 = "SELECT * FROM t_bbkeluar
						 WHERE kd_produk = '$kd_produk'
						 AND kd_bahanbaku = '$e'
						 AND kd_transaksi = '$kd_transaksi'";
				$data4 = $mysql->query($sql4);
				//End

				if($data4->num_rows > 0) {
					$sql5 = "UPDATE t_bbkeluar
							 SET jumlah_terpakai = jumlah_terpakai + '$c'
							 WHERE kd_produk = '$kd_produk'
							 AND kd_bahanbaku = '$e'
							 AND kd_transaksi = '$kd_transaksi'";
					$result5 = $mysql->query($sql5);
				} else {
					$sql5 = "INSERT INTO t_bbkeluar
							 VALUES ('$c', '$kd_produk', '$e', '$kd_transaksi')";
					$result5 = $mysql->query($sql5);
				}
			}

			if($data->num_rows > 0) {
				$sql4 = "UPDATE t_dettransaksi
						 SET qty = qty + '$qty',
							 sub_total = sub_total + '$sub_total'
						 WHERE kd_transaksi = '$kd_transaksi'
						 AND kd_produk = '$kd_produk'";
				$result4 = $mysql->query($sql4);
			} else {
				$sql4 = "INSERT INTO t_dettransaksi
						 VALUES('$qty', '$sub_total', '$kd_produk', '$kd_transaksi', '$created_at')";
				$result4 = $mysql->query($sql4);
			}
		}
	} else {
		header('location:index.php');
	}
?>