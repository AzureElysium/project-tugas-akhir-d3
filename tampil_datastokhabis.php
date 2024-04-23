<?php
	include_once 'db/koneksi.php';

	//Mengambil Data Bahan Baku yang Habis
	$sql = "SELECT * FROM t_bahanbaku
			WHERE jumlah_bahanbaku <= 3
			ORDER BY jumlah_bahanbaku ASC";
	$result = $mysql->query($sql);
	//End

	$no = 1;
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			//Mengambil Data Supplier
			$sql2 = "SELECT * FROM t_supplier";
			$result2 = $mysql->query($sql2);
			
			$kd_bahanbaku		= $row['kd_bahanbaku'];
			$nama_bahanbaku		= $row['nama_bahanbaku'];
			$jumlah_bahanbaku	= $row['jumlah_bahanbaku'];
?>
	<tr>
		<td class="text-center"><?php echo $no++?></td>
		<td><?php echo $nama_bahanbaku?></td>
		<td>
			<?php if($jumlah_bahanbaku < 1) { ?>
				<span class="badge badge-danger"><?php echo $jumlah_bahanbaku?> Kg</span>
			<?php } else { ?>
				<span class="badge badge-warning"><?php echo $jumlah_bahanbaku?> Kg</span>
			<?php } ?>
		</td>
		<form method="POST" action="tambah_pembelianbb.php">
			<td>
				<select name="kd_supplier" required>
					<option value="">Pilih Supplier</option>
					<?php while($row2 = mysqli_fetch_object($result2)) { ?>
						<option value="<?php echo $row2->kd_supplier?>"><?php echo $row2->nama_supplier?></option>
					<?php } ?>
				</select>
			</td>
			<td class="text-center">
				<input type="number" step="1" min="1" name="harga_kg" id="harga_kg" class="col-sm-10" required>
			</td>
			<td class="text-center">
				<input type="hidden" name="kd_bahanbaku" value="<?php echo $kd_bahanbaku?>">
				<input type="hidden" name="nama_bahanbaku" value="<?php echo $nama_bahanbaku?>">
				<input type="number" step="0.00001" name="jumlah_beli" id="jumlah_beli" class="col-sm-5 ml-auto mr-auto" required>
				<button type="submit" class="btn btn-info text-light mr-auto ml-auto"><i class="fa fa-plus"></i> Tambah</button>
			</td>
		</form>
	</tr>
<?php } } else { ?>
	<tr>
		<td colspan="7" class="text-center">Tidak ada Item</td>
	</tr>
<?php } ?>