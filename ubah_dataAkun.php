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
			$kd_user		= $_POST['kd_user'];
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
			$old_password 	= strip_tags(mysqli_real_escape_string($mysql, trim($_POST['old_password'])));
			$new_password 	= password_hash($_POST['new_password'], PASSWORD_DEFAULT);
			$new_password2	= password_verify($_POST['new_password2'], $new_password);
			$level			= $_POST['level'];
			$file 			= $_POST['foto'];
			$foto			= $_FILES['foto'];

			if(!empty($foto) AND $foto['error'] == 0) {
				$path = './media/img/';
				$upload = move_uploaded_file($foto['tmp_name'], $path . $foto['name']);

				if(!$upload) {
					header('location:data_akun.php');
				}
				$file = $foto['name'];
			}

			$no_ktpLama = $_POST['no_ktpLama'];
			$sqlktp = "SELECT * FROM t_user
					   WHERE no_ktp = '$no_ktp' AND no_ktp != '$no_ktpLama'";
			$resultktp = $mysql->query($sqlktp);

			$emailLama = $_POST['emailLama'];
			$sqlemail = "SELECT * FROM t_user
						 WHERE email = '$email' AND email != '$emailLama'";
			$resultemail = $mysql->query($sqlemail);

			$usernameLama = $_POST['usernameLama'];
			$sqlusernn = "SELECT * FROM t_user
						  WHERE username = '$username' AND username != '$usernameLama'";
			$resultusernn = $mysql->query($sqlusernn);

			$sqlusern = "SELECT * FROM t_user
					 	 WHERE username = '$username'";
			$resultusern = $mysql->query($sqlusern);

			$oldpass = mysqli_fetch_object($resultusern);
			$oldpass_hash = $oldpass->password;

			if($resultktp->num_rows > 0) {
				flash('error3', "Gagal diubah! Nomor KTP telah Terdaftar!");
			} else if($resultemail->num_rows > 0) {
				flash('error4', "Gagal diubah! Email telah Terdaftar!");
			} else if($resultusernn->num_rows > 0) {
				flash('error5', "Gagal diubah! Username telah Terdaftar!");
			} else if(!password_verify($old_password, $oldpass_hash)) {
				flash('error6', "Gagal diubah! Password lama tidak sesuai!");
			} else if($new_password != $new_password2) {
				flash('error7', "Gagal diubah! Password tidak sama!");
			} else {
				$sql = "UPDATE t_user
						SET no_ktp = '$no_ktp',
							nama = '$nama',
							jk = '$jk',
							agama = '$agama',
							tempat_lahir = '$tempat_lahir',
							tgl_lahir = '$tgl_lahir',
							alamat = '$alamat',
							no_hp = '$no_hp',
							email = '$email',
							username = '$username',
							password = '$new_password',
							level = '$level',
							file = '$file'
						WHERE kd_user = '$kd_user'";
				$result = $mysql->query($sql);

				if($result) {
					flash('success2', "Data berhasil diubah.");
				} else {
					flash('error2', "Error : " . $mysql->error);
				}

				header('location:data_akun.php');
			}
		}

		$kd_user = @$_GET['kd_user'];

		if(!empty($kd_user)) {
			$sql = "SELECT * FROM t_user
					WHERE kd_user = '$kd_user'";
			$data = $mysql->query($sql) or die($mysql->error);

			$result = mysqli_fetch_object($data);
		} else {
			header('location:data_akun.php');
		}

		$form = 'Edit';
		$action = 'ubah_dataAkun.php';

		include 'views/v_form_dataAkun.php';
	} else {
		header("location:index.php");
	}
?>