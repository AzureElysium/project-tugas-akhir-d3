<?php
	include 'db/koneksi.php';

	if(empty($_SESSION['username']) && empty($_SESSION['password'])) {
		if($_SERVER['REQUEST_METHOD'] == "POST") {
			$username = $_POST['username'];
			$password = $_POST['password'];

			$username = strip_tags(strtolower(mysqli_real_escape_string($mysql, trim($username))));
			$password = strip_tags(mysqli_real_escape_string($mysql, trim($password)));

			$sql = "SELECT * FROM t_user
					WHERE username = '$username'";
			$data = $mysql->query($sql) or die($mysql->error);

			if($data->num_rows != 0) {
				$row			= mysqli_fetch_object($data);
				$password_hash	= $row->password;

				if(password_verify($password, $password_hash)) {
					if (empty($_SESSION['csrf_token'])) {
						$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
					}
	
					$_SESSION['username']	= $row->username;
					$_SESSION['level']		= $row->level;

					header("location:index.php");
				} else {
					$error_pass = "error";
				}
			} else {
				$error_userpass = "error";
			}
		}

		include 'views/v_login.php';
	} else {
		header("location:index.php");
	}
?>