<?php

/*
	// Pemilik Page
	if($_SESSION['lvl'] != 2 ){
		$Komponen->Redirect('');
		die;
	}

	$btnForm = $Komponen->TombolForm("primary","md","Lihat","Lihat","lihat","");

	$select = "
	<select name='var01' class='custom-select form-control select2' onchange='submit()'>
		<option value='semua'>Semua</option>
	    <option value='bulanan'>Bulanan</option>
	    <option value='tahunan'>Tahunan</option>
	</select>
	";


	if(isset($_POST['lihat'])){
		if($_POST['laporan']=="tahunan"){

			$OpTahun = $Query->TampilSemua("","tahun");
			while($OpThn = mysqli_fetch_assoc($OpTahun)){
				$op.= "<option value='{$OpThn['idTahun']}'> {$OpThn['namaTahun']} </option>";
			}

			$selectKet = "
			<select name='tahun' class='custom-select form-control select2'>
				<option>-- Tahun ---</option>
				$op
			</select>
			";

			$keterangan = "Keterangan = 2 + $selectKet = 2 | ";

		}
		if($_POST['laporan']=="bulanan"){
			$OpBulan = $Query->TampilSemua("","bulan");
			while($OpBln = mysqli_fetch_assoc($OpBulan)){
				$op.= "<option value='{$OpBln['idBulan']}'> {$OpBln['namaBulan']} </option>";
			}

			$selectKet = "
			<select name='tahun' class='custom-select form-control select2'>
				<option>-- Bulan ---</option>
				$op
			</select>
			";

			$keterangan = "Keterangan = 2 + $selectKet = 2 | ";
		}	
	}

	$Dinput = "
		Jenis Laporan = 2 + $select = 4 | 
		$keterangan
		 = 2 + $btnForm = 9 |

	";
	$form = $Komponen->FormHorizontal($Dinput,"");
*/
	

	/*

			if($tombol=="Lihat")
		{
			$THead = "NO = 1 + NO REGISTER = 13 + NAMA = 25 + KEHADIRAN = 15 + PRESNTASE = 10";
			$TBody = "
			1 = center + 0098988798 = center + Rifky Alfarez = left + Hadir : 20, Izin : 20, Alpa = center + 90 = center |
			2 = center + 0098988798 = center + Rifky Alfarez = left + Hadir : 20, Izin : 20, Alpa = center + 90 = center |
			";
			$tabel = $Komponen->TabelDaftar("100",$THead,$TBody,"","TableFull"); 
		}
	*/

	switch($var01)
	{
		case "1":
			$Sel1="selected";
			$THead = "NO = 1 + NO REGISTER = 13 + NAMA = 25 + KEHADIRAN = 15 + PERSENTASE = 10";
			
			$QPeg=$Query->TampilSemua($Field="",$Table="karyawan",$Syarat="IdJabatan='1'", $Sort="");
			foreach($QPeg as $ArPeg)
			{
				$no++;
				$Hadir=$Query->TampilSatu($Field="count(*) as jum",$Table="absensi,absensi_karyawan",$Syarat="absensi.IdAbsensi=absensi_karyawan.IdAbsensi and NoRegistrasi='{$ArPeg['NoRegistrasi']}' and Keterangan='H'");
				$Izin=$Query->TampilSatu($Field="count(*) as jum",$Table="absensi,absensi_karyawan",$Syarat="absensi.IdAbsensi=absensi_karyawan.IdAbsensi and NoRegistrasi='{$ArPeg['NoRegistrasi']}' and Keterangan='I'");
				$Alpa=$Query->TampilSatu($Field="count(*) as jum",$Table="absensi,absensi_karyawan",$Syarat="absensi.IdAbsensi=absensi_karyawan.IdAbsensi and NoRegistrasi='{$ArPeg['NoRegistrasi']}' and Keterangan='A'");
				$PHadir=floor(($Hadir['jum']/($Hadir['jum']+$Izin['jum']+$Alpa['jum']))*100);
				$TBody .= "
				$no = center + {$ArPeg['NoRegistrasi']} = center + {$ArPeg['Nama']} = left + Hadir : ".$Komponen->FRupiah($Hadir['jum']).", Izin : ".$Komponen->FRupiah($Izin['jum']).", Alpa : ".$Komponen->FRupiah($Alpa['jum'])." = center + $PHadir % = center |
				";
			}
			$tabel = "<P STYLE='font-size:20px'>LAPORAN SELURUH</P><P>".$Komponen->TabelDaftar("100",$THead,$TBody,"","TableFull"); 
		break;
		case "2":
			$Sel2="selected";
			$FormTam="
			 |
			 Tanggal = 2 + <input type='text' class='form-control' placeholder='dd-mm-yyyy' name='var02'> = 2 |
			 offset = 2 + <input type='submit' class='btn btn-primary' name='tombol' value='Lihat'> = 2
			";
				if($tombol="Lihat" and $var02!="")
				{
					$var02=$Komponen->DateDb($var02);
					$THead = "NO = 1 + NO REGISTER = 13 + NAMA = 25 + KEHADIRAN = 15";
			
					$QPeg=$Query->TampilSemua($Field="",$Table="karyawan",$Syarat="IdJabatan='1'", $Sort="");
					foreach($QPeg as $ArPeg)
					{
						$no++;
						$Hadir=$Query->TampilSatu($Field="",$Table="absensi,absensi_karyawan",$Syarat="absensi.IdAbsensi=absensi_karyawan.IdAbsensi and NoRegistrasi='{$ArPeg['NoRegistrasi']}' and Tanggal='$var02'");
						$TBody .= "
						$no = center + {$ArPeg['NoRegistrasi']} = center + {$ArPeg['Nama']} = left + ".$Komponen->KetHadir($Hadir['Keterangan'])." = center  |
						";
					}
					
					$laptanggal=substr($var02,9,2)." ".$Komponen->NBulan(substr($var02,5,2))." ".substr($var02,0,4);

					$tabel = "<P STYLE='font-size:20px'>Laporan Tanggal $laptanggal</P><P>".$Komponen->TabelDaftar("100",$THead,$TBody,"","TableFull"); 
				}
		break;
		case "3":
			$Sel3="selected";
			$FormTam="
			 |
			 Bulan Tahun = 2 + <input type='text' class='form-control' placeholder='mm-yyyy' name='var02'> = 2 |
			 offset = 2 + <input type='submit' class='btn btn-primary' name='tombol' value='Lihat'> = 2
			";
			if($tombol="Lihat" and $var02!="")
			{
				$THead = "NO = 1 + NO REGISTER = 13 + NAMA = 25 + KEHADIRAN = 15 + PERSENTASE = 10";
				
				$QPeg=$Query->TampilSemua($Field="",$Table="karyawan",$Syarat="IdJabatan='1'", $Sort="");
				foreach($QPeg as $ArPeg)
				{
					//yyyy-mm-dd
					$no++;
					$tgl=substr($var02,3,4)."-".substr($var02,0,2);
					$Hadir=$Query->TampilSatu($Field="count(*) as jum",$Table="absensi,absensi_karyawan",$Syarat="absensi.IdAbsensi=absensi_karyawan.IdAbsensi and NoRegistrasi='{$ArPeg['NoRegistrasi']}' and Keterangan='H' and left(Tanggal,7)='$tgl'");
					$Izin=$Query->TampilSatu($Field="count(*) as jum",$Table="absensi,absensi_karyawan",$Syarat="absensi.IdAbsensi=absensi_karyawan.IdAbsensi and NoRegistrasi='{$ArPeg['NoRegistrasi']}' and Keterangan='I' and left(Tanggal,7)='$tgl'");
					$Alpa=$Query->TampilSatu($Field="count(*) as jum",$Table="absensi,absensi_karyawan",$Syarat="absensi.IdAbsensi=absensi_karyawan.IdAbsensi and NoRegistrasi='{$ArPeg['NoRegistrasi']}' and Keterangan='A' and left(Tanggal,7)='$tgl'");
					$PHadir=floor(($Hadir['jum']/($Hadir['jum']+$Izin['jum']+$Alpa['jum']))*100);
					if($PHadir!="NAN"){$tothadir=$PHadir;}else{$tothadir="0";}
					$TBody .= "
					$no = center + {$ArPeg['NoRegistrasi']} = center + {$ArPeg['Nama']} = left + Hadir : ".$Komponen->FRupiah($Hadir['jum']).", Izin : ".$Komponen->FRupiah($Izin['jum']).", Alpa : ".$Komponen->FRupiah($Alpa['jum'])." = center + $tothadir % = center |
					";
				}
				$judlaporan="Laporan Bulan ".$Komponen->NBulan(substr($var02,0,2))." Tahun ".substr($var02,3,4);
				$tabel = "<P STYLE='font-size:20px'>$judlaporan</p><p>".$Komponen->TabelDaftar("100",$THead,$TBody,"","TableFull");
			}

		break;
		case "4":
			$Sel4="selected";
			$FormTam="
			 |
			 Tahun = 2 + <input type='text' class='form-control' placeholder='yyyy' name='var02'> = 2 |
			 offset = 2 + <input type='submit' class='btn btn-primary' name='tombol' value='Lihat'> = 2
			";
			if($tombol="Lihat" and $var02!="")
			{
				$THead = "NO = 1 + NO REGISTER = 13 + NAMA = 25 + KEHADIRAN = 15 + PERSENTASE = 10";
				
				$QPeg=$Query->TampilSemua($Field="",$Table="karyawan",$Syarat="IdJabatan='1'", $Sort="");
				foreach($QPeg as $ArPeg)
				{
					//yyyy-mm-dd
					$no++;
					$Hadir=$Query->TampilSatu($Field="count(*) as jum",$Table="absensi,absensi_karyawan",$Syarat="absensi.IdAbsensi=absensi_karyawan.IdAbsensi and NoRegistrasi='{$ArPeg['NoRegistrasi']}' and Keterangan='H' and left(Tanggal,4)='$var02'");
					$Izin=$Query->TampilSatu($Field="count(*) as jum",$Table="absensi,absensi_karyawan",$Syarat="absensi.IdAbsensi=absensi_karyawan.IdAbsensi and NoRegistrasi='{$ArPeg['NoRegistrasi']}' and Keterangan='I' and left(Tanggal,4)='$var02'");
					$Alpa=$Query->TampilSatu($Field="count(*) as jum",$Table="absensi,absensi_karyawan",$Syarat="absensi.IdAbsensi=absensi_karyawan.IdAbsensi and NoRegistrasi='{$ArPeg['NoRegistrasi']}' and Keterangan='A' and left(Tanggal,4)='$var02'");
					$PHadir=floor(($Hadir['jum']/($Hadir['jum']+$Izin['jum']+$Alpa['jum']))*100);
					$TBody .= "
					$no = center + {$ArPeg['NoRegistrasi']} = center + {$ArPeg['Nama']} = left + Hadir : ".$Komponen->FRupiah($Hadir['jum']).", Izin : ".$Komponen->FRupiah($Izin['jum']).", Alpa : ".$Komponen->FRupiah($Alpa['jum'])." = center + $PHadir % = center |
					";
				}
				$judlaporan="Tahun $var02";
				$tabel = "<P STYLE='font-size:20px'>$judlaporan</p><p>".$Komponen->TabelDaftar("100",$THead,$TBody,"","TableFull");
			}
		break;
	}

	$IForm="
		Jenis Laporan = 2 + 
		<select name='var01' class='form-control' width='100%' onchange='submit()'>
			<option value='0'> - - Pilih - - </option>
			<option value='1' $Sel1> SEMUA </option>
			<option value='2' $Sel2> TANGGAL </option>
			<option value='3' $Sel3> BULAN </option>
			<option value='4' $Sel4> TAHUN </option>
		</select>
		 = 3  
		 $FormTam
	";
	$form=$Komponen->FormHorizontal($IForm,$aksi);

	$JdSiteTam="Laporan";
	$JdKonten = "Laporan";
	$Konten = "
		$form
		<br>			
		$tabel
	"; 
?>