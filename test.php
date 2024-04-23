<?php
	include 'db/koneksi.php';

	error_reporting(0);

	$sql = "SELECT * FROM t_produk
			WHERE t_produk.kategori_produk = 'Makanan'";
	$data = $mysql->query($sql) or die($mysql->error);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Uji Program</title>

	<script type="text/javascript" src="<?php echo base_url()?>/media/js/jquery-3.3.1.min.js"></script>
</head>
<body>
	<form action="" method="POST">
		<label>Kode Makanan :</label>
		<select name="kd_produk" id="kd_produk" onchange="changevalue(this.value)">
			<option value="">-- Pilih Kode Makanan --</option>
			<?php
				$jsArray = "var data = new Array();\n";

				while($dataProduk = mysqli_fetch_array($data)) {
			?>
				<option value="<?php echo $dataProduk['kd_produk']?>"><?php echo $dataProduk['kd_produk']?></option>
				<?php
					$jsArray .= "data['" . $dataProduk['kd_produk'] . "'] = {nama_produk:'" . $dataProduk['nama_produk'] . "',harga:'" . $dataProduk['harga'] . "'};\n";
				?>
			<?php } ?>
		</select>
		<br><br>
		<label>Nama Makanan :</label>
		<input type="text" name="nama_produk" id="nama_produk" readonly>
		<br><br>
		<label>Harga Satuan :</label>
		<input type="text" name="harga" id="harga" readonly>
		<br><br>
		<label>Jumlah Beli (Qty) :</label>
		<input type="number" name="qty" id="qty">
		<button type="submit" name="submit">Ok</button>
	</form>

	<script type="text/javascript">
		<?php echo $jsArray; ?>

		function changevalue(kd_produk) {
			if(kd_produk == "") {
				$('#nama_produk').val('');
				$('#harga').val('');
				$('#qty').val('');
				return;
			} else {
				$('#nama_produk').val(data[kd_produk].nama_produk);
				$('#harga').val(data[kd_produk].harga);
			}
		};
	</script>
</body>
</html>

<?php
	if(empty(isset($_POST['submit']))) {
		echo '<br><br>Total : ' . rupiah(0);
	} else {
		$total = $_POST['harga']*$_POST['qty'];

		echo '<br><br>Total : ' . rupiah($total);
	}
?>