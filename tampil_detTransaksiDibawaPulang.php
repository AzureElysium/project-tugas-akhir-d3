<?php
	include_once 'db/koneksi.php';

	//Mengambil Data Transaksi Terbesar
	$sql2 = "SELECT MAX(kd_transaksi) as kdTerbesar
			 FROM t_transaksi";
	$data2 = $mysql->query($sql2);

	$dat = mysqli_fetch_array($data2);
	$kodeTrans = $dat['kdTerbesar'];

	$urutan = (int) substr($kodeTrans, 2, 4);
	$urutan++;

	$huruf = 'TR';
	$kodeTrans = $huruf . sprintf("%04s", $urutan);
	//End

	$sql = "SELECT * FROM t_dettransaksi
			INNER JOIN t_produk ON (t_dettransaksi.kd_produk = t_produk.kd_produk)
			WHERE kd_transaksi = '$kodeTrans'
			ORDER BY t_dettransaksi.created_at ASC";
	$result = $mysql->query($sql);

	$no = 1;
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$kd_transaksi	= $row['kd_transaksi'];
			$kd_produk		= $row['kd_produk'];
			$nama_produk	= $row['nama_produk'];
			$harga			= $row['harga'];
			$qty			= $row['qty'];
			$sub_total		= $row['sub_total'];
?>
	<tr>
		<td class="text-center"><?php echo $no++?></td>
		<td><?php echo $kd_produk?></td>
		<td><?php echo $nama_produk?></td>
		<td><?php echo rupiah($harga)?></td>
		<td class="text-center"><?php echo $qty?> pcs</td>
		<td id="subtotal"><?php echo rupiah($sub_total)?></td>
		<td class="text-center">
			<a href="hapus_detTransaksiDibawaPulang.php?kd_transaksi=<?php echo $kd_transaksi?>&kd_produk=<?php echo $kd_produk?>" data-nama="<?php echo $nama_produk?>" data-qty="<?php echo $qty?>" class="btn btn-danger text-light btnHapus"><i class="fa fa-trash-o"></i></a>
		</td>
	</tr>
<?php } } else { ?>
	<tr>
		<td colspan="7" class="text-center">Tidak ada Item</td>
	</tr>
<?php } ?>