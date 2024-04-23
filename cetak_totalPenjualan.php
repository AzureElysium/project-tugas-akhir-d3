<?php 
	include 'db/koneksi.php';

	cekLogin();

	if(!empty($_SESSION['username']) && !empty($_SESSION['level']) == 1) {
		$sql = "SELECT * FROM t_transaksi
				INNER JOIN t_user ON (t_transaksi.kd_user = t_user.kd_user)
				WHERE t_transaksi.status_transaksi = 1
				ORDER BY t_transaksi.tgl_transaksi ASC";
		$data = $mysql->query($sql) or die($mysql->error);

		$sql2 = "SELECT * FROM t_transaksi
				 INNER JOIN t_user ON (t_transaksi.kd_user = t_user.kd_user)
				 WHERE t_transaksi.status_transaksi = 1";
		$data2 = $mysql->query($sql2) or die($mysql->error);

		//Hitung Total Penjualan
		$total_penjualan = 0;
		while($t = mysqli_fetch_object($data2)) {
			$total_penjualan += $t->total_bayar;
		}
		//End

		require('media/fpdf184/fpdf.php');

		$pdf = new FPDF('P', 'mm', 'A4');

		$pdf->AddPage();

		$pdf->SetFont('Times', 'B', 17);
		$pdf->Cell(0, 5, 'Katuangan Sunda', '0', '1', 'C', false);
		$pdf->Ln(4);
		$pdf->SetFont('Times', 'B', 35);
		$pdf->Cell(0, 5, 'DJ Resto', '0', '1', 'C', false);
		$pdf->Ln(2);
		$pdf->SetFont('Arial', '', 6);
		$pdf->Cell(0, 5, 'Jl. A. H. Nasution - Cipadung Wetan No. 304 Bandung', '0', '1', 'C', false);
		$pdf->Cell(0, 1, 'Telp. 087823242532', '0', '1', 'C', false);
		$pdf->Ln(3);
		$pdf->Cell(0, 0.3, '', '0', '1', 'C', true);
		$pdf->Ln(6);

		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(0, 5, 'Laporan Total Penjualan', 0, 0, 'C');
		$pdf->Ln(11);

		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Cell(10, 5, 'No.', 1, 0, 'C');
		$pdf->Cell(30, 5, 'Kode Transaksi', 1, 0, 'C');
		$pdf->Cell(42, 5, 'Tgl & Waktu Transaksi', 1, 0, 'C');
		$pdf->Cell(35, 5, 'Nama Kasir', 1, 0, 'C');
		$pdf->Cell(35, 5, 'Nama Pembeli', 1, 0, 'C');
		$pdf->Cell(0, 5, 'Total Bayar', 1, 0, 'C');

		$no = 1;
		while($row = mysqli_fetch_object($data)) {
			$pdf->Ln(5);
			$pdf->SetFont('Arial', '', 10);
			$pdf->Cell(10, 5, $no++, 1, 0, 'C');
			$pdf->Cell(30, 5, $row->kd_transaksi, 1, 0);
			$pdf->Cell(42, 5, date('d M Y H:i', strtotime($row->tgl_transaksi)), 1, 0);
			$pdf->Cell(35, 5, $row->nama, 1, 0);
			$pdf->Cell(35, 5, $row->nama_pembeli, 1, 0);
			$pdf->Cell(0, 5, rupiah($row->total_bayar), 1, 0);
		}

		$pdf->Ln(10);
		$pdf->SetLeftMargin(165);
		$pdf->SetFont('Arial', 'B', 11);
		$pdf->Cell(40, 5, 'Total Penjualan :', 0, 0);
		$pdf->Ln(6);
		$pdf->SetFont('Arial', 'U', 11);
		$pdf->Cell(0, 5, rupiah($total_penjualan), 0, 0);

		$pdf->Output('CetakLaporanTotalPenjualan.pdf', 'I');
	} else {
		header('location:index.php');
	}
?>