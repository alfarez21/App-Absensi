<?php

	// Admin Page
	if($_SESSION['lvl'] != 3 ){
		$Komponen->Redirect('');
		die;
	}
	
	$btnForm = $Komponen->TombolForm("primary","md","Absen","Absen","absen","");;


	if(isset($_POST['absen'])){
		$KTglHariIni=date("Ymdhis");
		$CekTglHariIni=$Query->CekData($Table="absensi",$Syarat="Tanggal=date(now())");
		
		$CekKaryawanHariIni=$Query->CekData($Table="absensi,absensi_karyawan",$Syarat="absensi.IdAbsensi=absensi_karyawan.IdAbsensi and Tanggal=date(now()) and NoRegistrasi='$var01'");
		
		if($var01!="0")
		{
			if(!$CekTglHariIni)
			{
				$Query->Tambah($Table="absensi",$Field="IdAbsensi,Tanggal",$Value="'$KTglHariIni',date(now())");
			}

			if(!$CekKaryawanHariIni)
			{
				$QAm=$Query->TampilSatu($Field="",$Table="absensi",$Syarat="Tanggal=date(now())");

				$Query->Tambah($Table="absensi_karyawan",$Field="IdAbsenKaryawan, NoRegistrasi, IdAbsensi, Jam, Keterangan",$Value="'$KTglHariIni', '$var01', '{$QAm['IdAbsensi']}', time(now()), '$var02'");
				$alert = $Komponen->Alert('success','ABSENSI BERHASIL',"A");
			}
			else
			{
				$alert = $Komponen->Alert('warning','HARI INI KARYAWAN SUDAH MELAKUKAN ABSENSI',"A");
			}
		}
		else
		{
			$alert = $Komponen->Alert('warning','PERIKSA KEMBALI KARYAWAN',"A");
		}
	}


	$karyawan = $Query->TampilSemua("","karyawan","");
	while ($ArKar = mysqli_fetch_assoc($karyawan)) {
		$op.= "<option value='{$ArKar['NoRegistrasi']}'>{$ArKar['NoRegistrasi']}/{$ArKar['Nama']}</option>";
	}
	$selectKar = "
	<select name='var01' class='custom-select form-control select2'>
	    <option value='0'>-- No Registrasi/Karyawan --</option>
	    $op
	</select>
	";

	$select = "
	<select name='var02' class='custom-select form-control select2'>
	    <option value='H'>Hadir</option>
	    <option value='I'>Izin</option>
	    <option value='A'>Alpa</option>
	</select>
	";

	$Dinput = "
		Nama Karyawan = 2 + $selectKar = 4 | 
		Pilih Keterangan = 2 + $select = 2 | 
		 = 2 + $btnForm = 9 |

	";

	$JdSiteTam = "Absen Karyawan";
	$JdKonten = "Absen Karyawan";
	$Konten = $alert.$Komponen->FormHorizontal($Dinput,""); 

?>