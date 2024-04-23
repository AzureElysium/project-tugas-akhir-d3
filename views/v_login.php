<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DJ Resto | Login</title>

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/media/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/media/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/media/sweetalert2-9.10.12/dist/sweetalert2.css">

	<!-- Script -->
	<script type="text/javascript" src="<?php echo base_url()?>/media/sweetalert2-9.10.12/dist/sweetalert2.all.js"></script>
	<script type="text/javascript">
		function fokus() {
			document.form_login.username.focus();
		}
	</script>

	<!-- Icon -->
	<link rel="icon" type="image/png" href="<?php echo base_url()?>/media/icons/cashier_icon.png">
</head>
<body onload="fokus()">
	<?php if(!empty($error_pass)) { ?>
		<script type="text/javascript">
			const Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000
			})

			Toast.fire({
				icon: '<?php echo $error_pass?>',
				title: 'Maaf, Password Salah!'
			})
		</script>
	<?php } ?>

	<?php if(!empty($error_userpass)) { ?>
		<script type="text/javascript">
			const Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000
			})

			Toast.fire({
				icon: '<?php echo $error_userpass?>',
				title: 'Username dan Password Salah!'
			})
		</script>
	<?php } ?>

	<div class="slider">
		<div class="figure">
			<div class="slide">
				<div class="banner-1">
					<img src="<?php echo base_url()?>/media/bg/bgLogin_1.jpg">
				</div>
			</div>

			<div class="slide">
				<div class="banner-2">
					<img src="<?php echo base_url()?>/media/bg/bgLogin_2.jpg">
				</div>
			</div>

			<div class="slide">
				<div class="banner-3">
					<img src="<?php echo base_url()?>/media/bg/bgLogin_3.jpg">
				</div>
			</div>

			<div class="slide">
				<div class="banner-4">
					<img src="<?php echo base_url()?>/media/bg/bgLogin_4.jpg">
				</div>
			</div>

			<div class="slide">
				<div class="banner-5">
					<img src="<?php echo base_url()?>/media/bg/bgLogin_5.jpg">
				</div>
			</div>
		</div>
	</div>

	<div class="agile-login">
		<div class="wrapper">
			<h2>Login</h2>
			<div class="w3ls-form">
				<form name="form_login" action="login.php" method="POST">
					<label>Username</label>
					<input type="text" name="username" placeholder="Masukkan Username" value="<?=isset($_POST['username']) ? $username : ''?>" maxlength="8" title="Membutuhkan 8 Karakter Username" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{7,20}$" required>

					<label>Password</label>
					<input type="password" name="password" placeholder="Masukkan Kata Sandi" required>

					<button type="submit">Login</button>
				</form>
			</div>
		</div><br>

		<div class="copyright">
			<p>© 2020 Aplikasi Sistem Informasi Penjualan | DJ Resto</p>
		</div>
	</div>
</body>
</html>