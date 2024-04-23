<?php
	include_once 'db/koneksi.php';

	//Mengambil Data Bahan Baku yang Dibeli
	$sql = "SELECT DISTINCT a.kd_supplier, b.nama_supplier, b.alamat_supplier
			FROM t_pembelianbb a, t_supplier b
			WHERE a.kd_supplier = b.kd_supplier
			ORDER BY a.created_at ASC";
	$result = $mysql->query($sql);
	//End

	$no = 1;
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$kd_supplier	= $row['kd_supplier'];
			$nama_supplier	= $row['nama_supplier'];
			$alamat			= $row['alamat_supplier'];
?>
	<tr>
		<td class="text-center"><?php echo $no++?></td>
		<td><?php echo $kd_supplier?></td>
		<td><?php echo $nama_supplier?></td>
		<td><?php echo $alamat?></td>
		<td class="text-center">
			<a href="tampil_nextpembelianbb.php?kd_supplier=<?php echo $kd_supplier?>" class="btn btn-info text-light"><i class="fa fa-eye"></i></a>
		</td>
	</tr>
<?php } } else { ?>
	<tr>
		<td colspan="7" class="text-center">Tidak ada Item</td>
	</tr>
<?php } ?>