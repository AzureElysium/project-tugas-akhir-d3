<?php
	include 'db/koneksi.php';

	cekLogin();

	$username	= @$_SESSION['username'];
	$level		= @$_SESSION['level'];

	$sql1 = "SELECT * FROM t_user
			 WHERE username = '$username'";
	$data1 = $mysql->query($sql1) or die($mysql->error);

	if(!empty($_SESSION['username']) && !empty($_SESSION['level']) == 1) {
		if($_SERVER['REQUEST_METHOD'] == "POST") {
			$no_ktp			= $_POST['no_ktp'];
			$nama			= $_POST['nama'];
			$jk				= $_POST['jk'];
			$agama			= $_POST['agama'];
			$tempat_lahir	= $_POST['tempat_lahir'];
			$tgl_lahir		= $_POST['tgl_lahir'];
			$alamat			= $_POST['alamat'];
			$no_hp			= $_POST['no_hp'];
			$email			= $_POST['email'];
			$username		= strtolower(stripcslashes(trim($_POST['username'])));
			$password 		= password_hash($_POST['password'], PASSWORD_DEFAULT);
			$password2		= password_verify($_POST['password2'], $password);
			$level			= $_POST['level'];
			$foto			= $_FILES['foto'];

			if(!empty($foto) AND $foto['error'] == 0) {
				$path = './media/img/';
				$upload = move_uploaded_file($foto['tmp_name'], $path . $foto['name']);

				if(!$upload) {
					header('location:data_akun.php');
				}
				$file = $foto['name'];
			}

			$sqlktp = "SELECT * FROM t_user
					   WHERE no_ktp = '$no_ktp'";
			$resultktp = $mysql->query($sqlktp);
			
			$sqlusern = "SELECT * FROM t_user
					  WHERE username = '$username'";
			$resultusern = $mysql->query($sqlusern);

			$sqlemail = "SELECT * FROM t_user
						 WHERE email = '$email'";
			$resultemail = $mysql->query($sqlemail);

			$sqlkduser = "SELECT MAX(kd_user)
						  AS id
						  FROM t_user";
			$resultkduser = $mysql->query($sqlkduser);
			while($kd_user = mysqli_fetch_array($resultkduser)) {
				$id = $kd_user['id']+1;
			}

			if(!empty(mysqli_fetch_object($resultktp))) {
				$errorktp = "Nomor KTP telah Terdaftar!";
			} else if(!empty(mysqli_fetch_object($resultemail))) {
				$erroremail = "Email telah Terdaftar!";
			} else if(!empty(mysqli_fetch_object($resultusern))) {
				$errorusername = "Username telah Terdaftar!";
			} else if($password != $password2) {
				$errorpass = "Password tidak sama!";
			} else {
				$sql = "INSERT INTO t_user
						VALUES('$id', '$no_ktp', '$nama', '$jk', '$agama', '$tempat_lahir', '$tgl_lahir', '$alamat', '$no_hp', '$email', '$username', '$password', '$level', '$file')";
				$result = $mysql->query($sql);

				if($result) {
					flash('success', "Data berhasil ditambah.");
				} else {
					flash('error', "Error : " . $mysql->error);
				}

				header('location:data_akun.php');
			}
		}

		$form = "Tambah";
		$action = "tambah_dataAkun.php";

		include 'views/v_form_dataAkun.php';
	} else {
		header("location:index.php");
	}
?>