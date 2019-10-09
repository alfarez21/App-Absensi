<?php
/*
Nusantara Global
Team : Nans, M. Rifki
*/

include('template/dashboard/plugin.php');

if(isset($_SESSION['login'])){
	$Komponen->Redirect('');
	die;
}

$username = htmlspecialchars(trim($_POST['username']));
$pass = htmlspecialchars(trim($_POST['pass']));


if(isset($_POST['login'])){
	if( $username != "" || $pass !="" ){

		if($Query->CekData("karyawan","NoRegistrasi='$username' and Password=md5('$pass')")>0){

			$data = $Query->TampilSemua("","karyawan","NoRegistrasi='$username' and Password=md5('$pass')","");
			$data = mysqli_fetch_array($data);
	
			if( $username == $data['NoRegistrasi'] && md5($pass) == $data['Password'] ){
				$_SESSION['login'] = true;
				$_SESSION['lvl'] = $data['IdJabatan'] ;
				$_SESSION['idUser'] = $data['NoRegistrasi'];
				$Komponen->Redirect('');
			}
			else{
				$alert = $Komponen->Alert("danger alert-sm","Username Dan Password Salah!!","A");
			}
		}
		else{
			$alert = $Komponen->Alert("danger alert-sm","pengguna tidak terdaftar","A");
		}
	}
	else{
		$alert = $Komponen->Alert("danger alert-sm","Inputan Tak Boleh Kosong !","A");
	}
}


echo "
<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
		<title>Login Area</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		$CSS
		<link rel='shortcut icon' href='images/$IcoBrowser'/>
	</head>
	<body class='hold-transition login-page'>
		<div class='login-box'>
			<!-- /.login-logo -->
			<div class='login-box-body'>
 
				<form action='' method='post'>
					<center><img src='images/ng.jpg' width='100px' style='margin-bottom:30px'></center>
					<div class='form-group has-feedback'>
						<input type='text' name='username' class='form-control' placeholder='Username' required>
						<span class='glyphicon glyphicon-user form-control-feedback'></span>
					</div>
					<div class='form-group has-feedback'>
						<input type='password' name='pass' class='form-control' placeholder='Password' required`>
						<span class='glyphicon glyphicon-lock form-control-feedback'></span>
					</div>
					<div class='row'>
						<!-- /.col -->
						<div class='col-xs-12'>
							<button type='submit' name='login' class='btn btn-primary btn-block btn-flat'>Login</button>
						</div>
						<!-- /.col -->
					</div>
				</form>
				<div style='margin-top:20px'>$alert</div>

			</div>
			<!-- /.login-box-body -->
		</div>
		<!-- /.login-box -->
		$Javascript
	</body>
</html>
";

?>