<?php

	// Admin Page
	if($_SESSION['lvl'] != 3 ){
		$Komponen->Redirect('');
		die;
	}
	if($v1=="tambah"){
		$JdSiteTam="Tambah Pengguna/Karyawan";
	}
	if($v1=="edit"){
		$JdSiteTam="Edit Pengguna/Karyawan";
	}
	$nama = htmlspecialchars(trim($_POST['nama']));
	$tmplahir = htmlspecialchars(trim($_POST['tmplahir']));
	$tgllahir = htmlspecialchars(trim($_POST['tgllahir']));
	$jkelamin = htmlspecialchars(trim($_POST['jenisKelamin']));
	$jabatan = htmlspecialchars(trim($_POST['jabatan']));

	if($v3=="disimpan"){
		$alert = $Komponen->Alert("success","Data Berhasil Di Simpan","A");
	}

	if(isset($_POST['simpan'])){
		$tgllahir = date("Y-m-d", strtotime($tgllahir));
		$noRegis = date('Ymdhis');
		if($Query->CekData("karyawan","Nama = '$nama' and TempatLahir = '$tmplahir' and TglLahir = '$tgllahir' and IdJabatan = $jabatan")>0){
			$alert = $Komponen->Alert("danger","Data Sudah Ada!!","A");
		}
		else{
			if($v1=="tambah"){
				$JdSiteTam="Tambah Pengguna/Karyawan";
				$tam = $Query->Tambah("karyawan","NoRegistrasi,Nama,TempatLahir,TglLahir,Gender,IdJabatan","'$noRegis','$nama','$tmplahir','$tgllahir','$jkelamin','$jabatan'");
				if($tam){
					$karyawan = $Query->TampilSatu("","karyawan","Nama = '$nama' and TempatLahir = '$tmplahir' and TglLahir = '$tgllahir' and IdJabatan = $jabatan");
					$Komponen->Redirect("pengguna-form-edit-{$karyawan['NoRegistrasi']}-disimpan");
				}
				else{
					$alert = $Komponen->Alert("danger","Gagal Disimpan!!","A");
				}
			}
			if($v1=="edit"){
				$JdSiteTam="Edit Pengguna/Karyawan";
				$ubah = $Query->Ubah("Nama='$nama',TempatLahir='$tmplahir',TglLahir='$tgllahir',Gender='$jkelamin',IdJabatan='$jabatan'","karyawan","NoRegistrasi='$v2'");
				if($ubah){
					$alert = $Komponen->Alert("success","Data Berhasil Di Ubah","A");
				}

			}
		}
	}
	$Bsimpan = "<button type='submit' name='simpan' class='btn btn-md btn-primary' style='margin-top:5px' data-toggle='tooltip' title='Simpan'><i class='fa fa-floppy-o'></i></button>";
	$Bbaru = $Komponen->TombolLink("info","md","fa-plus-square","Baru","?pengguna-form-tambah","");
	$Bbatal = $Komponen->TombolLink("danger","md","fa-times","Batal","?pengguna-daftar","");
	$Breset = $Komponen->TombolLink("warning","md","fa-lock","Reset Password","?pengguna-reset-$v2","");

	if($v1=="tambah" and $v2=="baru"){
		$dsbl = "disabled";
		$Bsimpan = "";
		$Bbatal = "";
		$Breset = "";
	}
	else if($v1=="edit" && $v3 == "a"){
		$Bbatal = "";
		$Breset = "";
	}

	$btnForm = "$Bsimpan $Bbaru $Bbatal $Breset";

	$karyawan = $Query->TampilSatu("","karyawan","NoRegistrasi='$v2'");

	if($karyawan['Gender']=="L"){
		$lcheck = "checked";
	}

	if($karyawan['Gender']=="P"){
		$pcheck = "checked";
	}
	
	$radio = $Komponen->InputRadioCheck("radio","Laki Laki","jenisKelamin","L","$lcheck required")." ".$Komponen->InputRadioCheck("radio","Perempuan","jenisKelamin","P","$pcheck required");

	$Djabatan = $Query->TampilSemua("","jabatan","","");
	
	while($jabatan = mysqli_fetch_assoc($Djabatan)){
		if($karyawan['IdJabatan']==$jabatan['IdJabatan']){
			$opt .= "<option value='{$jabatan['IdJabatan']}' selected>{$jabatan['NamaJabatan']}</option>";
		}
		else{
			$opt .= "<option value='{$jabatan['IdJabatan']}'>{$jabatan['NamaJabatan']}</option>";
		}
	}
	$select = "
	<select name='jabatan' class='form-control select2 custom-select' required $dsbl>
	    <option selected>Jabatan</option>
	    $opt
	</select>
	";

	$tglahir = date("d-m-Y", strtotime($karyawan['TglLahir']));


	$Dinput = "
		Nama = 2 + <input class='form-control' type='text' name='nama' value='{$karyawan['Nama']}' $dsbl required > = 4 | 
		Tempat Lahir = 2 + <input class='form-control' type='text' name='tmplahir' value='{$karyawan['TempatLahir']}' $dsbl required> = 4 |
		Tanggal Lahir = 2 + ".$Komponen->InputGroup("<i class='fa fa-user'></i>", "<input class='form-control' type='text' name='tgllahir' id='Date' placeholder='dd-mm-yyyy' value='{$tglahir}' $dsbl requuired >","")." = 4 |
		Jenis Kelamin = 2 + $radio = 4 | 
		Jabatan = 2 + $select = 4 | 
		 = 2 + $btnForm = 9 |

	";


	$JdKonten = ucfirst($v1)." Pengguna/Karyawan";
	$TKonten = $Komponen->TombolLink("success","md","fa-arrow-left","Kembali","?pengguna-daftar","");
	$Konten = $alert.$Komponen->FormHorizontal($Dinput,""); 

?>