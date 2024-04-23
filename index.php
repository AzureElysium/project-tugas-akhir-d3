<?php
	include 'db/koneksi.php';

	cekLogin();

	$username	= @$_SESSION['username'];
	$level		= @$_SESSION['level'];

	$sql1 = "SELECT * FROM t_user
			WHERE username = '$username'";
	$data1 = $mysql->query($sql1) or die($mysql->error);

	if($level == 1) {
		date_default_timezone_set('Asia/Jakarta');
		$tgl_awal = date('Y-m-d 00:00:00');
		$tgl_akhir = date('Y-m-d 23:59:59');

		$sql2 = "SELECT tgl_transaksi, SUM(total_bayar) AS total1
				 FROM t_transaksi
				 WHERE tgl_transaksi
				 BETWEEN '$tgl_awal' AND '$tgl_akhir'
				 AND status_transaksi = 1";
		$result2 = $mysql->query($sql2);

		$sql3 = "SELECT tgl_transaksi, COUNT(*) AS total2
				 FROM t_transaksi
				 WHERE tgl_transaksi
				 BETWEEN '$tgl_awal' AND '$tgl_akhir'
				 AND status_transaksi = 1";
		$result3 = $mysql->query($sql3);

		$sql4 = "SELECT SUM(total_bayar) AS total3
				 FROM t_transaksi
				 WHERE status_transaksi = 1";
		$result4 = $mysql->query($sql4);

		$sql5 = "SELECT COUNT(*) AS total4
				 FROM t_transaksi
				 WHERE status_transaksi = 1";
		$result5 = $mysql->query($sql5);

		$sql6 = "SELECT *, SUM(qty) AS TotalQty, SUM(sub_total) AS TotalPenjualan
				 FROM t_dettransaksi
				 INNER JOIN t_produk ON (t_dettransaksi.kd_produk = t_produk.kd_produk)
				 INNER JOIN t_transaksi ON (t_dettransaksi.kd_transaksi = t_transaksi.kd_transaksi)
				 WHERE t_transaksi.tgl_transaksi
				 BETWEEN '$tgl_awal' AND '$tgl_akhir'
				 AND t_transaksi.status_transaksi = 1
				 GROUP BY t_dettransaksi.kd_produk
				 ORDER BY TotalQty DESC";
		$result6 = $mysql->query($sql6);

		$sql7 = "SELECT *, ROUND(SUM(jumlah_terpakai), 6) AS JumlahTerpakai
				 FROM t_bbkeluar
				 INNER JOIN t_bahanbaku ON (t_bbkeluar.kd_bahanbaku = t_bahanbaku.kd_bahanbaku)
				 INNER JOIN t_transaksi ON (t_bbkeluar.kd_transaksi = t_transaksi.kd_transaksi)
				 WHERE t_transaksi.tgl_transaksi
				 BETWEEN '$tgl_awal' AND '$tgl_akhir'
				 AND t_bbkeluar.kd_transaksi = t_transaksi.kd_transaksi
				 AND t_transaksi.status_transaksi = 1
				 GROUP BY t_bbkeluar.kd_bahanbaku
				 ORDER BY JumlahTerpakai DESC";
		$result7 = $mysql->query($sql7);

		include 'views/v_index_pengelola.php';
	} else {
		//Ambil Data Meja Kosong
		$sql2 = "SELECT * FROM t_meja
				 WHERE status_meja = 0
				 ORDER BY kd_meja ASC";
		$data2 = $mysql->query($sql2) or die($mysql->error);

		//Ambil Data Yang Belum Bayar
		$sql3 = "SELECT * FROM t_meja
				 INNER JOIN t_transaksi ON (t_meja.kd_transaksi = t_transaksi.kd_transaksi)
				 WHERE t_meja.status_meja = 1
				 ORDER BY t_meja.kd_meja ASC";
		$data3 = $mysql->query($sql3) or die($mysql->error);

		include 'views/v_index_kasir.php';
	}
?>