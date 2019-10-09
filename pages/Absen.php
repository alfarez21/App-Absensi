<?php
/*
Nusantara Global
Team : Nans, M. Rifki
*/

include('template/dashboard/plugin.php');


$noReg = htmlspecialchars(trim($_POST['noReg']));

if(isset($_POST['absen'])){
	
	$KTglHariIni=date("Ymdhis");
	$CekKaryawan=$Query->CekData($Table="karyawan",$Syarat="NoRegistrasi='$var01'");

	$CekTglHariIni=$Query->CekData($Table="absensi",$Syarat="Tanggal=date(now())");
	
	$CekKaryawanHariIni=$Query->CekData($Table="absensi,absensi_karyawan",$Syarat="absensi.IdAbsensi=absensi_karyawan.IdAbsensi and Tanggal=date(now()) and NoRegistrasi='$var01'");
	
	if($CekKaryawan)
	{
		if(!$CekTglHariIni)
		{
			$Query->Tambah($Table="absensi",$Field="IdAbsensi,Tanggal",$Value="'$KTglHariIni',date(now())");
		}

		if(!$CekKaryawanHariIni)
		{
			$QAm=$Query->TampilSatu($Field="",$Table="absensi",$Syarat="Tanggal=date(now())");

			$Query->Tambah($Table="absensi_karyawan",$Field="IdAbsenKaryawan, NoRegistrasi, IdAbsensi, Jam, Keterangan",$Value="'$KTglHariIni', '$var01', '{$QAm['IdAbsensi']}', time(now()), 'H'");
			$alert = $Komponen->Alert('success','ABSENSI BERHASIL',"A");
		}
		else
		{
			$alert = $Komponen->Alert('warning','HARI INI ANDA SUDAH MELAKUKAN ABSENSI',"A");
		}
	}
	else
	{
		$alert = $Komponen->Alert('warning','PERIKSA KEMBALI NO REGISTRASI ANDA',"A");
	}
	
}

echo "
<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
		<title>Absen Karyawan</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		$CSS
		<link rel='shortcut icon' href='images/$IcoBrowser'/>
	</head>
	<body class='hold-transition login-page'>
		<div class='login-box'>
			<!-- /.login-logo -->
			<div class='login-box-body'>
 
				<form method='post' autocomplete='off'>
					<center><img src='images/ng.jpg' width='100px' style='margin-bottom:30px'></center>
					<div class='form-group has-feedback'>
						<input type='text' class='form-control text-center' name='var01' placeholder='No Register' required>
					</div>
					<div class='row'>
						<!-- /.col -->
						<div class='col-xs-12'>
							<button type='submit' name='absen' class='btn btn-primary btn-block btn-flat'>Absen</button>
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