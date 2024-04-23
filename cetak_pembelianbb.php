<?php 
	include 'db/koneksi.php';

	cekLogin();

	if(!empty($_SESSION['username']) && !empty($_SESSION['level']) == 1) {
		$kd_supplier = $_GET['kd_supplier'];
		$nama_pemilik = @$_SESSION['username'];

		$sql = "SELECT * FROM t_pembelianbb
				INNER JOIN t_bahanbaku ON (t_pembelianbb.kd_bahanbaku = t_bahanbaku.kd_bahanbaku)
				WHERE t_pembelianbb.kd_supplier = '$kd_supplier'
				ORDER BY t_pembelianbb.kd_bahanbaku ASC";
		$data = $mysql->query($sql) or die($mysql->error);

		$sql3 = "SELECT * FROM t_pembelianbb
				 INNER JOIN t_supplier ON (t_pembelianbb.kd_supplier = t_supplier.kd_supplier)
				 WHERE t_pembelianbb.kd_supplier = '$kd_supplier'";
		$data3 = $mysql->query($sql3) or die($mysql->error);
		$result = mysqli_fetch_object($data3);

		$sql4 = "SELECT * FROM t_user
				 WHERE username = '$nama_pemilik'";
		$data4 = $mysql->query($sql4) or die($mysql->error);
		$result3 = mysqli_fetch_object($data4);

		//Jumlah Total Beli
		$sql2 = "SELECT * FROM t_pembelianbb
				 INNER JOIN t_bahanbaku ON (t_pembelianbb.kd_bahanbaku = t_bahanbaku.kd_bahanbaku)
				 WHERE t_pembelianbb.kd_supplier = '$kd_supplier'";
		$data2 = $mysql->query($sql2);

		$thargabeli = 0;
		while($result2 = mysqli_fetch_array($data2)) {
			$jumlah_beli = $result2['jumlah_beli'];
			$harga_kg = $result2['harga_kg'];
			$tbeli = $jumlah_beli*$harga_kg;

			$thargabeli += $tbeli;
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

		$pdf->SetLeftMargin(18);
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(0, 5, 'Pembelian Bahan Baku', 0, 0, 'C');
		$pdf->Ln(7);

		$pdf->Ln(5);
		$pdf->SetFont('Arial', '', 11);
		$pdf->Cell(28, 5, 'Nama Supplier', 0, 0);
		$pdf->Cell(3, 5, ':', 0, 0);
		$pdf->SetFont('Arial', 'B', 11);
		$pdf->Cell(0, 5, $result->nama_supplier, 0, 0);
		$pdf->Ln(7);

		$pdf->SetFont('Arial', '', 11);
		$pdf->Cell(28, 5, 'Alamat', 0, 0);
		$pdf->Cell(3, 5, ':', 0, 0);
		$pdf->SetFont('Arial', 'B', 11);
		$pdf->Cell(0, 5, $result->alamat_supplier, 0, 0);
		$pdf->Ln(7);

		$pdf->SetFont('Arial', '', 11);
		$pdf->Cell(28, 5, 'No. Telp', 0, 0);
		$pdf->Cell(3, 5, ':', 0, 0);
		$pdf->SetFont('Arial', 'B', 11);
		$pdf->Cell(0, 5, $result->telp_supplier, 0, 0);
		$pdf->Ln(11);

		$pdf->SetFont('Arial', 'B', 11);
		$pdf->Cell(12, 5, 'No.', 1, 0, 'C');
		$pdf->Cell(50, 5, 'Nama Bahan Baku', 1, 0, 'C');
		$pdf->Cell(45, 5, 'Jumlah Stok Dibeli', 1, 0, 'C');
		$pdf->Cell(45, 5, 'Harga Beli', 1, 0, 'C');
		$pdf->Cell(20, 5, 'Dibeli', 1, 0, 'C');

		$no = 1;
		while($row = mysqli_fetch_object($data)) {
			$nama_bahanbaku = $row->nama_bahanbaku;
			$j_beli = $row->jumlah_beli;
			$h_kg = $row->harga_kg;

			$pdf->SetFont('Arial', '', 11);
			$pdf->Ln(5);
			$pdf->Cell(12, 5, $no++, 1, 0, 'C');
			$pdf->Cell(50, 5, $nama_bahanbaku, 1, 0);
			$pdf->Cell(45, 5, $j_beli . ' Kg', 1, 0);
			$pdf->Cell(45, 5, rupiah($h_kg*$j_beli), 1, 0);
			$pdf->Cell(20, 5, '(     )', 1, 0, 'C');
		}

		$pdf->Ln(11);
		$pdf->SetLeftMargin(126);
		$pdf->SetFont('Arial', '', 11);
		$pdf->Cell(30, 5, 'Total Pembelian', 0, 0);
		$pdf->Cell(3, 5, ':', 0, 0);
		$pdf->SetFont('Arial', 'U', 11);
		$pdf->Cell(0, 5, rupiah($thargabeli), 0, 0);

		$pdf->Ln(25);
		$pdf->SetFont('Arial', '', 11);
		$pdf->Cell(50, 5, 'Mengetahui,', 0, 0, 'R');

		$pdf->Ln(35);
		$pdf->SetFont('Arial', 'U', 11);
		$pdf->Cell(53, 5, $result3->nama, 0, 0, 'R');

		$pdf->Output('CetakPembelianBB.pdf', 'I');
	} else {
		header('location:index.php');
	}
?>