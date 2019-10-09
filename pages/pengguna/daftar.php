<?php

	// Admin Page
	if($_SESSION['lvl'] != 3 ){
		$Komponen->Redirect('');
		die;
	}

	if($v1=="hapus"){
		$Query->Hapus("karyawan","NoRegistrasi=$v2");
		$Komponen->Redirect("pengguna-daftar");
	}
	$data = $Query->TampilSemua("","karyawan,jabatan","karyawan.IdJabatan = jabatan.IdJabatan","");
	$no = 1;

	while($karyawan = mysqli_fetch_assoc($data)){
	
		$Bedit = $Komponen->TombolLink("info","md","fa-pencil-square-o","Edit","?pengguna-form-edit-{$karyawan['NoRegistrasi']}-a","");
		$Breset = $Komponen->TombolLink("warning","md","fa-lock","Reset Password","?pengguna-reset-{$karyawan['NoRegistrasi']}","");
		$Bhapus = $Komponen->TombolLink("danger","md","fa-trash","Hapus","?pengguna-daftar-hapus-{$karyawan['NoRegistrasi']}","");

		$aksi = "$Bedit $Breset $Bhapus";
		$Dbody .= "$no = center + {$karyawan['NoRegistrasi']} = center + {$karyawan['Nama']} = left + {$karyawan['NamaJabatan']} = center + $aksi = center |";

		$no++;
	}

	$THead = "NO = 1 + NO REGISTER = 10 + NAMA = 25 + JABATAN = 15 + AKSI = 15";
	$TBody = $Dbody;
	
	$Bkanan = $Komponen->TombolLink("success","md","fa-plus-square","Tambah","?pengguna-form-tambah-baru","");
	
	$JdSiteTam="Kelola Pengguna/Karyawan";
	$JdKonten = "Daftar Pengguna/Karyawan";
	$TKonten = $Bkanan;
	$Konten = $Komponen->TabelDaftar("100",$THead,$TBody,"","TableFull"); 
?>