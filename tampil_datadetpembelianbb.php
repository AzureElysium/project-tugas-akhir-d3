<?php
	include_once 'db/koneksi.php';

	$kd_supplier = @$_GET['kd_supplier'];

	//Mengambil Data Detail Pembelian Bahan Baku
	$sql = "SELECT * FROM t_pembelianbb
			INNER JOIN t_supplier ON (t_pembelianbb.kd_supplier = t_supplier.kd_supplier)
			INNER JOIN t_bahanbaku ON (t_pembelianbb.kd_bahanbaku = t_bahanbaku.kd_bahanbaku)
			WHERE t_pembelianbb.kd_supplier = '$kd_supplier'
			ORDER BY t_pembelianbb.created_at ASC";
	$result = $mysql->query($sql);
	//End

	$no = 1;
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$kd_supplier		= $row['kd_supplier'];
			$kd_bahanbaku		= $row['kd_bahanbaku'];
			$nama_bahanbaku		= $row['nama_bahanbaku'];
			$jumlah_beli		= $row['jumlah_beli'];
			$harga_kg			= $row['harga_kg'];
			$total_beli			= $jumlah_beli*$harga_kg;
?>
	<tr>
		<td class="text-center"><?php echo $no++?></td>
		<td><?php echo $nama_bahanbaku?></td>
		<td><span class="badge badge-success"><?php echo $jumlah_beli?> Kg</span></td>
		<td><?php echo rupiah($harga_kg)?></td>
		<td id="thargabeli"><?php echo rupiah($total_beli)?></td>
		<td class="text-center">
			<a href="ubah_pembelianbb.php?kd_bahanbaku=<?php echo $kd_bahanbaku?>" class="btn btn-warning text-light mr-2 btnUbah" data-kdbahanbaku="<?php echo $kd_bahanbaku?>" data-kdsupplierr="<?php echo $kd_supplier?>" data-namaa="<?php echo $nama_bahanbaku?>" data-jumlahbeli="<?php echo $jumlah_beli?>" data-hargakg="<?php echo $harga_kg?>"><i class="fa fa-pencil"></i></a>
			<a href="hapus_datapembelianbb.php?kd_bahanbaku=<?php echo $kd_bahanbaku?>&kd_supplier=<?php echo $kd_supplier?>" class="btn btn-danger text-light btnHapus" data-kdsupplier="<?php echo $kd_supplier?>" data-nama="<?php echo $nama_bahanbaku?>"><i class="fa fa-trash"></i></a>
		</td>
	</tr>
<?php } } else { ?>
	<tr>
		<td colspan="6" class="text-center">Tidak ada Item</td>
	</tr>
<?php } ?>