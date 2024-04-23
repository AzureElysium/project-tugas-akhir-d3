<?php
	include 'db/koneksi.php';

	cekLogin();

	if(!empty($_SESSION['username']) && !empty($_SESSION['level']) == 0) {
		$kd_transaksi = $_GET['kd_transaksi'];

		$sql = "SELECT * FROM t_transaksi
				WHERE kd_transaksi = '$kd_transaksi'";
		$data = $mysql->query($sql) or die($mysql->error);
		$row = mysqli_fetch_object($data);

		$sql2 = "SELECT * FROM t_meja
				 WHERE kd_transaksi = '$kd_transaksi'";
		$data2 = $mysql->query($sql2) or die($mysql->error);
		$row2 = mysqli_fetch_object($data2);

		$sql3 = "SELECT * FROM t_dettransaksi
				 INNER JOIN t_produk ON (t_dettransaksi.kd_produk = t_produk.kd_produk)
				 WHERE kd_transaksi = '$kd_transaksi'";
		$data3 = $mysql->query($sql3) or die($mysql->error);

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
		$pdf->Cell(18.5, 5, 'No. Meja', 0, 0);
		$pdf->Cell(2, 5, ':', 0, 0);
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->Cell(0, 5, $row2->nama_meja, 0, 0);
		$pdf->Ln(4);

		$pdf->SetFont('Arial', '', 7);
		$pdf->Cell(18.5, 5, 'Nama Pembeli', 0, 0);
		$pdf->Cell(2, 5, ':', 0, 0);
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->Cell(0, 5, $row->nama_pembeli, 0, 0);
		$pdf->Ln(7);

		$pdf->SetFont('Arial', 'U', 8);
		$pdf->Cell(0, 4, 'Produk Dipesan & Bahan Baku Dibutuhkan', 0, 0);

		$no = 1;
		while($row3 = mysqli_fetch_object($data3)) {
			$kd_produk	= $row3->kd_produk;
			$qty		= $row3->qty;

			$sql4 = "SELECT * FROM t_detproduk
					 INNER JOIN t_bahanbaku ON (t_detproduk.kd_bahanbaku = t_bahanbaku.kd_bahanbaku)
					 WHERE kd_produk = '$kd_produk'";
			$data4 = $mysql->query($sql4) or die($mysql->error);

			$pdf->Ln(5);
			$pdf->SetFont('Arial', 'B', 8);
			$pdf->Cell(0, 4, $no++ . '. ' . $row3->nama_produk . " (" . $qty . " pcs)", 0, 0);

			while($row4 = mysqli_fetch_object($data4)) {
				$jumlah_dibutuhkan = $row4->jumlah_dibutuhkan;
				$total_dibutuhkan = ($jumlah_dibutuhkan*$qty);

				$pdf->Ln(3);
				$pdf->SetFont('Arial', '', 7);
				$pdf->Cell(0, 4, '     - ' . $row4->nama_bahanbaku . " (" . $total_dibutuhkan . " Kg)", 0, 0);
			}
		}

		$pdf->Output('CetakMenuDipesan.pdf', 'I');
	} else {
		header('location:index.php');
	}
?>