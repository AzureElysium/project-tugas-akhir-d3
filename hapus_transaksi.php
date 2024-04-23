<?php
	include 'db/koneksi.php';

	if(!empty($_SESSION['username']) && !empty($_SESSION['level']) == 1) {
		$kd_transaksi	= $_GET['kd_transaksi'];

		if(!empty($kd_transaksi)) {
			$sql = "DELETE FROM t_transaksi
					WHERE kd_transaksi = '$kd_transaksi'";

			$sql2 = "DELETE FROM t_dettransaksi
					 WHERE kd_transaksi = '$kd_transaksi'";

			$sql3 = "DELETE FROM t_bbkeluar
					 WHERE kd_transaksi = '$kd_transaksi'";

			$sql4 = "SELECT * FROM t_bbkeluar
					 INNER JOIN t_transaksi ON (t_bbkeluar.kd_transaksi = t_transaksi.kd_transaksi)
					 INNER JOIN t_bahanbaku ON (t_bbkeluar.kd_bahanbaku = t_bahanbaku.kd_bahanbaku)
					 WHERE t_bbkeluar.kd_transaksi = '$kd_transaksi'";
			$data4 = $mysql->query($sql4);

			while($tambah = mysqli_fetch_array($data4)) {
				$a = $tambah['jumlah_terpakai'];
				$b = $tambah['jumlah_bahanbaku'];
				$c = $a+$b;
				$d = $tambah['kd_bahanbaku'];

				$sql5 = "UPDATE t_bahanbaku
						 SET jumlah_bahanbaku = '$c'
						 WHERE kd_bahanbaku = '$d'";
				$data5 = $mysql->query($sql5);
			}

			if($mysql->query($sql) && $mysql->query($sql2) && $mysql->query($sql3)) {
				echo 1;
			} else {
				echo 0;
			}
		}
	} else {
		header('location:index.php');
	}
?>