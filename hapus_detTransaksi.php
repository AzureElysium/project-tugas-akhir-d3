<?php
	include 'db/koneksi.php';

	if(!empty($_SESSION['username']) && !empty($_SESSION['level']) == 0) {
		$kd_transaksi	= $_GET['kd_transaksi'];
		$kd_produk		= $_GET['kd_produk'];
		$qty			= $_POST['qty'];

		if(!empty($kd_transaksi) && !empty($kd_produk)) {
			$sql = "DELETE FROM t_dettransaksi
					WHERE kd_transaksi = '$kd_transaksi'
					AND kd_produk = '$kd_produk'";
			$result = $mysql->query($sql);

			$sql2 = "SELECT * FROM t_detproduk
					 INNER JOIN t_produk ON (t_detproduk.kd_produk = t_produk.kd_produk)
					 INNER JOIN t_bahanbaku ON (t_detproduk.kd_bahanbaku = t_bahanbaku.kd_bahanbaku)
					 WHERE t_detproduk.kd_produk = '$kd_produk'";
			$result2 = $mysql->query($sql2);

			while($hasil = mysqli_fetch_array($result2)) {
				$a = $hasil['jumlah_bahanbaku'];
				$b = $hasil['jumlah_dibutuhkan'];
				$c = $qty*$b;
				$d = $a+$c;
				$e = $hasil['kd_bahanbaku'];

				$sql3 = "UPDATE t_bahanbaku
						 SET jumlah_bahanbaku = '$d'
						 WHERE kd_bahanbaku = '$e'";
				$result3 = $mysql->query($sql3);

				$sql4 = "DELETE FROM t_bbkeluar
						 WHERE kd_produk = '$kd_produk'
						 AND kd_bahanbaku = '$e'
						 AND kd_transaksi = '$kd_transaksi'";
				$result4 = $mysql->query($sql4);
			}

			if($result && $result3 && $result4) {
				echo 1;
			} else {
				echo 0;
			}
		}
	} else {
		header('location:index.php');
	}
?>