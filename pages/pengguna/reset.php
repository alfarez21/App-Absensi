<?php

	// Admin Page
	if($_SESSION['lvl'] != 3 ){
		$Komponen->Redirect('');
		die;
	}

	if(isset($_POST['reset'])){
		$depass = $Komponen->AutoKode(5);
		$enpass = md5($depass);
		$Query->Ubah("`Password`='$enpass'","karyawan","NoRegistrasi = '$v2'");
		$Komponen->set_flashmsg("success","Password berhasil direset");
	}

	echo "$de <br> $en";
	$aksi = "<form method='post'>".$Komponen->TombolForm("warning","md","fa-lock","Reset Password","reset","")."</form>";

	$karyawan = $Query->TampilSatu("","karyawan,jabatan","NoRegistrasi='$v1' and karyawan.IdJabatan = jabatan.IdJabatan");
	$Dta = "
	Nama = 200 + {$karyawan['Nama']} = 700 | 
	Jabatan = 200 + {$karyawan['NamaJabatan']} = 700 |
	Password = 200 + $depass = 700 |
	 = 200 + $aksi
	";

	$View = $Komponen->ViewTable($Dta);

	$alert= $Komponen->flashmsg();

	$JdSiteTam="Reset Password";
	$JdKonten = "Reset Password";
	$TKonten = $Komponen->TombolLink("success","md","fa-arrow-left","Kembali","?pengguna-daftar","");
	$Konten = "
	<div class='ViewTable-Custom'>
		$alert
		$View
	</div>
	"; 

?>