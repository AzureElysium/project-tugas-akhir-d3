<?php
	include 'db/koneksi.php';

	cekLogin();

	if(!empty($_SESSION['username']) && !empty($_SESSION['level']) == 0) {
		$kd_transaksi	= $_GET['kd_transaksi'];
		$kd_meja		= $_GET['kd_meja'];

		$sql = "SELECT * FROM t_transaksi
				INNER JOIN t_user ON (t_transaksi.kd_user = t_user.kd_user)
				WHERE kd_transaksi = '$kd_transaksi'";
		$data = $mysql->query($sql) or die($mysql->error);
		$row = mysqli_fetch_object($data);

		$sql2 = "SELECT * FROM t_dettransaksi
				 INNER JOIN t_produk ON (t_dettransaksi.kd_produk = t_produk.kd_produk)
				 WHERE kd_transaksi = '$kd_transaksi'";
		$data2 = $mysql->query($sql2) or die($mysql->error);

		$sql3 = "SELECT * FROM t_meja
				 WHERE kd_meja = '$kd_meja'";
		$data3 = $mysql->query($sql3) or die($mysql->error);
		$row3 = mysqli_fetch_object($data3);

		require('media/fpdf184/fpdf.php');

		$pdf = new FPDF('P', 'mm', array(105, 150));

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
		$pdf->Ln(2);

		$pdf->SetFont('Arial', '', 7);
		$pdf->Cell(18.5, 5, 'Kode Transaksi', 0, 0);
		$pdf->Cell(2, 5, ':', 0, 0);
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->Cell(27, 5, $row->kd_transaksi, 0, 0);
		$pdf->SetFont('Arial', '', 7);
		$pdf->Cell(14, 5, 'No. Meja', 0, 0);
		$pdf->Cell(2, 5, ':', 0, 0);
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->Cell(0, 5, $row3->nama_meja, 0, 0);
		$pdf->Ln(4);

		$pdf->SetFont('Arial', '', 7);
		$pdf->Cell(18.5, 5, 'Tgl Transaksi', 0, 0);
		$pdf->Cell(2, 5, ':', 0, 0);
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->Cell(27, 5, date('d M Y H:i', strtotime($row->tgl_transaksi)), 0, 0);
		$pdf->SetFont('Arial', '', 7);
		$pdf->Cell(14, 5, 'Atas Nama', 0, 0);
		$pdf->Cell(2, 5, ':', 0, 0);
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->Cell(0, 5, $row->nama_pembeli, 0, 0);
		$pdf->Ln(4);

		$pdf->SetFont('Arial', '', 7);
		$pdf->Cell(47.5, 5, '', 0, 0);
		$pdf->Cell(14, 5, 'Nama Kasir', 0, 0);
		$pdf->Cell(2, 5, ':', 0, 0);
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->Cell(0, 5, $row->nama, 0, 0);
		$pdf->Ln(7);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->Cell(30, 4, 'Nama Produk', 1, 0);
		$pdf->Cell(23, 4, 'Harga', 1, 0);
		$pdf->Cell(10, 4, 'Qty', 1, 0, 'C');
		$pdf->Cell(0, 4, 'Sub Total', 1, 0);

		while($row2 = mysqli_fetch_object($data2)) {
			$pdf->Ln(4);
			$pdf->SetFont('Arial', '', 6);
			$pdf->Cell(30, 4, $row2->nama_produk, 1, 0);
			$pdf->Cell(23, 4, rupiah($row2->harga), 1, 0);
			$pdf->Cell(10, 4, $row2->qty . ' pcs', 1, 0, 'C');
			$pdf->Cell(0, 4, rupiah($row2->sub_total), 1, 0);
		}

		$pdf->Ln(6);
		$pdf->SetLeftMargin(60);
		$pdf->SetFont('Arial', '', 7);
		$pdf->Cell(14, 5, 'Bayar', 0, 0);
		$pdf->Cell(2, 5, ':', 0, 0);
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->Cell(0, 5, rupiah($row->bayar), 0, 0);

		$pdf->Ln(4);
		$pdf->SetFont('Arial', '', 7);
		$pdf->Cell(14, 5, 'Kembalian', 0, 0);
		$pdf->Cell(2, 5, ':', 0, 0);
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->Cell(0, 5, rupiah($row->kembalian), 0, 0);

		$pdf->Ln(5.5);
		$pdf->SetFont('Arial', '', 7);
		$pdf->Cell(14, 5, 'Total Bayar', 0, 0);
		$pdf->Cell(2, 5, ':', 0, 0);
		$pdf->SetFont('Arial', 'U', 7);
		$pdf->Cell(0, 5, rupiah($row->total_bayar), 0, 0);

		$pdf->Output('CetakTransaksi.pdf', 'I');
	} else {
		header('location:index.php');
	}
?>