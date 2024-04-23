<?php
	include_once 'db/koneksi.php';

	//Mengambil Data Produk Makanan Terbesar
	$sql2 = "SELECT MAX(kd_produk) as kdTerbesar
			 FROM t_produk
			 WHERE kategori_produk = 'Makanan'";
	$result2 = $mysql->query($sql2);

	$dat = mysqli_fetch_array($result2);
	$kodeProduk = $dat['kdTerbesar'];

	$urutan = (int) substr($kodeProduk, 2, 3);
	$urutan++;

	$huruf = 'MK';
	$kodeProduk = $huruf . sprintf("%03s", $urutan);
	//End

	$sql = "SELECT * FROM t_detproduk
			INNER JOIN t_bahanbaku ON (t_detproduk.kd_bahanbaku = t_bahanbaku.kd_bahanbaku)
			WHERE t_detproduk.kd_produk = '$kodeProduk'
			ORDER BY created_at ASC";
	$result = $mysql->query($sql);

	$no = 1;
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$kd_bahanbaku = $row['kd_bahanbaku'];
			$nama_bahanbaku = $row['nama_bahanbaku'];
			$jumlah_dibutuhkan = $row['jumlah_dibutuhkan'];
?>
	<tr>
		<td class="text-center"><?php echo $no++?></td>
		<td><?php echo $kd_bahanbaku?></td>
		<td><?php echo $nama_bahanbaku?></td>
		<td id="total"><?php echo $jumlah_dibutuhkan?> Kg</td>
		<td class="text-center">
			<a href="hapus_dataBBMakanan.php?kd_produk=<?php echo $kodeProduk?>&kd_bahanbaku=<?php echo $kd_bahanbaku?>" data-nama="<?php echo $nama_bahanbaku?>" class="btn btn-danger text-light btnHapus"><i class="fa fa-trash-o"></i></a>
		</td>
	</tr>
<?php } } else { ?>
	<tr>
		<td colspan="7" class="text-center">Tidak ada Item</td>
	</tr>
<?php } ?>