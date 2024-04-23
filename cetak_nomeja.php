<?php
	include 'db/koneksi.php';

	cekLogin();

	if(!empty($_SESSION['username']) && !empty($_SESSION['level']) == 0) {
		$kd_transaksi = $_GET['kd_transaksi'];

		$sql = "SELECT * FROM t_meja
				WHERE t_meja.kd_transaksi = '$kd_transaksi'";
		$data = $mysql->query($sql) or die($mysql->error);
		$row = mysqli_fetch_object($data);

		$sql2 = "SELECT * FROM t_transaksi
				 WHERE kd_transaksi = '$kd_transaksi'";
		$data2 = $mysql->query($sql2) or die($mysql->error);
		$row2 = mysqli_fetch_object($data2);

		require('media/fpdf184/fpdf.php');

		$pdf = new FPDF('P', 'mm', array(75, 86));

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
		$pdf->Ln(10);

		$pdf->SetFont('Helvetica', 'B', 50);
		$pdf->Cell(0, 5, $row->nama_meja, 0, 0, 'C');
		$pdf->Ln(15);

		$pdf->SetFont('Arial', '', 18);
		$pdf->Cell(0, 5, $row2->nama_pembeli, 0, 0, 'C');

		$pdf->Output('CetakNoMeja.pdf', 'I');
	} else {
		header('location:index.php');
	}
?>