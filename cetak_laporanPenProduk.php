<?php 
	include 'db/koneksi.php';

	cekLogin();

	if(!empty($_SESSION['username']) && !empty($_SESSION['level']) == 1) {
		$sql = "SELECT a.kd_produk, b.nama_produk, b.kategori_produk, c.kd_transaksi, c.status_transaksi, SUM(a.qty) AS TotalQty, SUM(a.sub_total) AS TotalPenjualan
			 	FROM t_dettransaksi a, t_produk b, t_transaksi c
			 	WHERE a.kd_produk = b.kd_produk
			 	AND a.kd_transaksi = c.kd_transaksi
			 	AND c.status_transaksi = 1
			 	GROUP BY a.kd_produk
			 	ORDER BY TotalQty DESC";
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
		$pdf->Cell(0, 5, 'Laporan Penjualan Produk', 0, 0, 'C');
		$pdf->Ln(11);

		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Cell(10, 5, 'No.', 1, 0, 'C');
		$pdf->Cell(30, 5, 'Kode Produk', 1, 0, 'C');
		$pdf->Cell(42, 5, 'Nama Produk', 1, 0, 'C');
		$pdf->Cell(35, 5, 'Kategori Produk', 1, 0, 'C');
		$pdf->Cell(35, 5, 'Jumlah Terjual', 1, 0, 'C');
		$pdf->Cell(0, 5, 'Total Penjualan', 1, 0, 'C');

		$no = 1;
		while($row = mysqli_fetch_object($data)) {
			$pdf->Ln(5);
			$pdf->SetFont('Arial', '', 10);
			$pdf->Cell(10, 5, $no++, 1, 0, 'C');
			$pdf->Cell(30, 5, $row->kd_produk, 1, 0);
			$pdf->Cell(42, 5, $row->nama_produk, 1, 0);
			$pdf->Cell(35, 5, $row->kategori_produk, 1, 0);
			$pdf->Cell(35, 5, $row->TotalQty . ' pcs', 1, 0);
			$pdf->Cell(0, 5, rupiah($row->TotalPenjualan), 1, 0);
		}

		$pdf->Output('CetakLaporanPenjualanProduk.pdf', 'I');
	} else {
		header('location:index.php');
	}
?>