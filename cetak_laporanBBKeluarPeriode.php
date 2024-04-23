<?php 
	include 'db/koneksi.php';

	cekLogin();

	if(!empty($_SESSION['username']) && !empty($_SESSION['level']) == 1) {
		$tgl_awal	= $_POST['tgl_awal'];
		$tgl_akhir	= $_POST['tgl_akhir'];

		$sql = "SELECT *, ROUND(SUM(jumlah_terpakai), 6) AS JumlahTerpakai
			 	FROM t_bbkeluar
			 	INNER JOIN t_bahanbaku ON (t_bbkeluar.kd_bahanbaku = t_bahanbaku.kd_bahanbaku)
			 	INNER JOIN t_transaksi ON (t_bbkeluar.kd_transaksi = t_transaksi.kd_transaksi)
			 	WHERE t_bbkeluar.kd_transaksi = t_transaksi.kd_transaksi
			 	AND t_transaksi.status_transaksi = 1
			 	AND t_transaksi.tgl_transaksi
			 	BETWEEN '$tgl_awal' AND '$tgl_akhir'
			 	GROUP BY t_bbkeluar.kd_bahanbaku
			 	ORDER BY JumlahTerpakai DESC";
		$data = $mysql->query($sql) or die($mysql->error);

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
		$pdf->Cell(0, 5, 'Laporan Bahan Baku yang Keluar Per Periode', 0, 0, 'C');
		$pdf->Ln(11);

		$pdf->SetLeftMargin(30);
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Cell(10, 5, 'No.', 1, 0, 'C');
		$pdf->Cell(35, 5, 'Kode Bahan Baku', 1, 0, 'C');
		$pdf->Cell(42, 5, 'Nama Bahan Baku', 1, 0, 'C');
		$pdf->Cell(35, 5, 'Jumlah Tersedia', 1, 0, 'C');
		$pdf->Cell(35, 5, 'Jumlah Terpakai', 1, 0, 'C');

		$no = 1;
		while($row = mysqli_fetch_object($data)) {
			$pdf->Ln(5);
			$pdf->SetFont('Arial', '', 10);
			$pdf->Cell(10, 5, $no++, 1, 0, 'C');
			$pdf->Cell(35, 5, $row->kd_bahanbaku, 1, 0);
			$pdf->Cell(42, 5, $row->nama_bahanbaku, 1, 0);
			$pdf->Cell(35, 5, $row->jumlah_bahanbaku . ' Kg', 1, 0);
			$pdf->Cell(35, 5, floatval($row->JumlahTerpakai) . ' Kg', 1, 0);
		}

		$pdf->Output('CetakLaporanBBKeluar.pdf', 'I');
	} else {
		header('location:index.php');
	}
?>