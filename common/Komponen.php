<?php
/*
Nusantara Global
Team : Nans, M. Rifki
*/

class Komponen{
	//TABLE
	function TabelDaftar($Width="",$THead="",$TBody="",$TLain="",$id="")
	{
		/*
			THead -> Format => No = 10 + Nama = 20 + Aksi = 30
			TBody -> Format => 1 = center + Nama = left + Button = center |
							   2 = center + Nama = left + Button = center |
			EXAMPLE:
			TableDaftar("0 to 100","THead","Tbody","tam","Jenis Table")
		*/

		//setting head table
		$THead=explode(" + ",$THead);

		foreach($THead as $ArTHead1)
		{	
			$WTh1=explode(" = ",$ArTHead1);
			$Jum=$Jum+$WTh1['1'];
		}

		foreach($THead as $ArTHead)
		{
			$WTh=explode(" = ",$ArTHead);
			$width=round(($WTh['1']/$Jum)*100);
			$Th.="<th class='text-center' width='$width%' valign='center'>{$WTh['0']}</th>";
		}

		$TBody=explode(" |",$TBody);
		$count=count($TBody);
		foreach($TBody as $ArTBody)
		{
			$no++;
			if($count!=$no)
			{
				$tbody.="
					<tr>
				";
					$PTd=explode(" + ",$ArTBody);
					foreach($PTd as $ArPTd)
					{
						$Ps=explode(" = ",$ArPTd);
						$class=($Ps['1']!="")?"class='text-{$Ps['1']}'":"";
						$tbody.="
							<td $class>".trim($Ps[0])."</td>
						";
					}
				$tbody.="
					</tr>
				";
			}
			
		}

		return "
			<div style='width:$Width%'>
				<table class='table table-bordered' id='$id' width='99.99%'>
					<thead>
						<tr>
							$Th
						</tr>
					</thead>
					<tbody>
						$tbody
					</tbody>
					<tfoot style='background:#F9F9F9'>
						$TLain
					</tfoot>
				</table>
			</div>
		";
	}


	//ERROR SERVER
	function AlertServer($Jd="",$Icon="",$Ket="")
	{
		/*
			Jd = Judul
			Icon = icon
			Ket = keterangan 
			EXAMPLE :
			"SERVER ERROR","user","SERVER SEDANG DIPERBAIKI"
		*/
		echo "
		<!doctype html>
		<html lang='en'>
			<head>
				<!-- Required meta tags -->
				<meta charset='utf-8'>
				<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
				<title>$Jd</title>
				<link rel='stylesheet' href='vendor/bootstrap/css/bootstrap.css'>
				<link rel='stylesheet' href='vendor/font-awesome/css/font-awesome.css'> 
				<link rel='stylesheet' href='vendor/local/css/stylelocal.css'>
			</head>
			<body style='background:#fff9f9'>
				<div class='LosKoneksi'>
					<CENTER>
					<i class='fa fa-$Icon'></i>
					<br>
					$Ket
					</CENTER>
				</div>
			</body>
		</html>
		";
	}

	
	function TombolForm($Warna="",$Uk="",$Icon="",$Title="",$varname="",$style=""){
		/*
		Icon = sm-fa-kodeicon
		EXAMPLE :
			"danger","xs/sm/lg/xl","fa-user","Edit","http://google.com","600x600x2"
		*/

		
		$title=($Title=="")?"":"title='$Title'";

		if($Icon!="")
		{
			$PIcon=explode("-",$Icon);
			if($PIcon[0]=="fa")
			{
				$icon="<i class='fa $Icon' $fontsize></i>";
				$tooltip="data-toggle='tooltip'";			
			}
			else
			{
				$icon=$Icon;
			}
		}
		else
		{
			$icon="";
		}

		return "<button type='submit' name='$varname' class='btn btn-$Uk btn-$Warna' $title $tooltip style='margin-top:5px;$style'>$icon</button>";

	}
	 
	function TombolLink($Warna="",$Uk="",$Icon="",$Title="",$Target="",$Popup="",$style="")
	{
		/*
		Popup = width x height x waktu(detik) close
		Icon = sm-fa-kodeicon
		EXAMPLE :
			"danger","xs/sm/lg/xl","fa-user","Edit","http://google.com","600x600x2"
		*/

		//popup
		if($Popup!="")
		{
			$uk=explode("x",$Popup);
			$popup="target='popup' onclick=\"popup({$uk[0]},{$uk[1]},{$uk[2]})\"";
		}
		else
		{
			$popup="";
		}
		
		$title=($Title=="")?"":"title='$Title'";

		if($Icon!="")
		{
			$PIcon=explode("-",$Icon);
			if($PIcon[0]=="fa")
			{
				$icon="<i class='fa $Icon' $fontsize></i>";
				$tooltip="data-toggle='tooltip'";			
			}
			else
			{
				$icon=$Icon;
			}
		}
		else
		{
			$icon="";
		}

		return "<a href='$Target' class='btn btn-$Uk btn-$Warna' $title $popup $tooltip style='margin-top:5px;$style'>$icon</a>";
	}
	
	function FormHorizontal($Dt="",$Action="")
	{
		/*
			Example :
			Nama = 2 + <input type=''> = 5 | 
			Nama = 2 + <input type=''> = 5 
		*/

		$PDt=explode(" |",$Dt);

		if($PDt!="")
		{
			foreach($PDt as $ArDt)
			{		
				$h.="
					<div class='form-group'>
				";		
					$PF=explode(" + ",$ArDt);
					$PLabel=explode(" = ",$PF['0']);
					$PInput=explode(" = ",$PF['1']);
					if(trim($PLabel[0])!="offset")
					{
						$h.="
							<label class='col-sm-".trim($PLabel[1])." control-label'><span class='pull-left' style='font-weight:normal'>".trim($PLabel['0'])."</span></label>
							<div class='col-sm-".trim($PInput[1])."'>
								".trim($PInput['0'])."
							</div>
						";
					}
					else
					{
						$h.="
							<div class='col-sm-".trim($PInput[1])." col-sm-offset-".trim($PLabel[1])."'>
								".trim($PInput['0'])."
							</div>
						";
					}

				$h.="
					</div>
				";
				
			}
		}
		else
		{
			$h.="";
		}
		
		$action=($Action!="")?"action='$Action'":"";
		return "
		<form method='post' $action enctype='multipart/form-data' class='form-horizontal' autocomplete='off'>
			$h
		</form>
		";
	}

	function ViewDiv($Dt="")
	{
		/*
			Example :
			Nama = 2 + Value = 5 | 
			Nama = 2 + value = 5 
		*/

		$PDt=explode(" |",$Dt);

		if($PDt!="")
		{
			foreach($PDt as $ArDt)
			{		
				$h.="
					<div class='form-group'>
				";		
					$PF=explode(" + ",$ArDt);
					$PLabel=explode(" = ",$PF['0']);
					$PInput=explode(" = ",$PF['1']);
					$h.="
						<div class='col-sm-".trim($PLabel[1])."'>".trim($PLabel['0'])."</div>
						<div class='col-sm-".trim($PInput[1])."'>".trim($PInput['0'])."</div>
					";

				$h.="
					</div>

				";
				
			}
		}
		else
		{
			$h.="";
		}
		
		return "
			<div class='form-horizontal'>
			$h
			</div>
		";
	}

	function ViewTable($Dt="")
	{
		/*
			Example :
			Nama = 200 + Value = 700 | 
			Nama = 200 + value = 700 
		*/

		$PDt=explode(" |",$Dt);

		if($PDt!="")
		{
			foreach($PDt as $ArDt)
			{		
				$h.="
					<tr>
				";		
					$PF=explode(" + ",$ArDt);
					$PLabel=explode(" = ",$PF['0']);
					$PInput=explode(" = ",$PF['1']);
					$h.="
						<td width='".trim($PLabel['1'])."' valign='top' style='padding:5px'>".trim($PLabel['0'])."</td>
						<td width='".trim($PInput['1'])."' valign='top' style='padding:5px'>".trim($PInput['0'])."</td>
					";

				$h.="
					</tr>
				";
				
			}
		}
		else
		{
			$h.="";
		}
		
		return "
			<table>
				$h
			</table>
		";
	}

	function FRupiah($a="")
	{
		//format ke example : 1.000.0000
		return number_format($a,0,",",".");
	}

	function Redirect($link="")
	{
		$link=($link=="")?"index.php":"index.php?$link";
		return header("location:$link");
	}

	

	function Usia($Jenis="",$TglLahir="",$TglBanding="")
	{
		/*
			menentukan usia berdasarkan tanggal lahir 
			Jenis 1=tahun, 2 = tahun dan bulan, 3= tahun, bulan dan hari
			lahir yyyy-mm-dd
		*/

		$birthDt = new DateTime($TglLahir);
		//tanggal hari ini
		$today = new DateTime($TglBanding);
		//tahun
		$y = $today->diff($birthDt)->y;
		//bulan
		$m = $today->diff($birthDt)->m;
		//hari
		$d = $today->diff($birthDt)->d;
		switch($Jenis)
		{
			case "1"://tahun
				$h="$y tahun " ;
			break;
			case "2"://tahun bulan
				$h="$y tahun $m bulan";
			break;
			case "3"://tahun bulan hari
				$h="$y tahun $m bulan $d hari";
			break;
		}
		return $h;
	}

	function UtoS($char="")
	{
		//Convert Underline to Strip ( _ to - )
		$Ar=explode("_", $char);
		$jml=count($Ar);
		foreach($Ar as $Tm)
		{
			$no++;
			if($jml!=$no)
			{
				$h.=$Tm."-";
			}
			else
			{
				$h.=$Tm;
			}
		}

		return $h;
	}

	function StoU($char="")
	{
		//convert strip to Underline ( - to _ )
		$Ar=explode("-", $char);
		$jml=count($Ar);
		foreach($Ar as $Tm)
		{
			$no++;
			if($jml!=$no)
			{
				$h.=$Tm."_";
			}
			else
			{
				$h.=$Tm;
			}
		}

		return $h;
	}

	function UploadGambar($new_name="",$file="",$dir="",$width="")
	{
		/*
			converter Upload gambar
			new_name = nama baru pada saat di upload
			file = nama variable
			dir = lokasi upload
			width = lebar gambar
		*/

		//direktori gambar
		$vdir_upload = $dir;
		$vfile_upload = $vdir_upload . $_FILES[''.$file.'']["name"];

		//Simpan gambar dalam ukuran sebenarnya
		move_uploaded_file($_FILES[''.$file.'']["tmp_name"], $dir.$_FILES[''.$file.'']["name"]);

		//identitas file asli
		$im_src = imagecreatefromjpeg($vfile_upload);
		$src_width = imageSX($im_src);
		$src_height = imageSY($im_src);

		//Set ukuran gambar hasil perubahan
		$dst_width = $width;
		$dst_height = ($dst_width/$src_width)*$src_height;

		//proses perubahan ukuran
		$im = imagecreatetruecolor($dst_width,$dst_height);
		imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

		//Simpan gambar
		imagejpeg($im,$vdir_upload . $new_name.".jpg",100);

		//Hapus gambar di memori komputer
		imagedestroy($im_src);
		imagedestroy($im);
		$remove_small = unlink("$vfile_upload");
	}

	function Romawi($a="")
	{
		/*
			convert to romawi
			example 01 to I
		*/
		switch($a)
		{
			case "01":$r="I";break;
			case "02":$r="II";break;
			case "03":$r="III";break;
			case "04":$r="IV";break;
			case "05":$r="V";break;
			case "06":$r="VI";break;
			case "07":$r="VII";break;
			case "08":$r="VIII";break;
			case "09":$r="IX";break;
			case "10":$r="X";break;
			case "11":$r="XI";break;
			case "12":$r="XII";break;
		}
		return $r;
	}

	function TglSetelah($JmlHari,$TglMulai)
	 {
		/*
			format output yyyy-mm-dd
			2,yyyy-mm-dd
		*/
		return date("Y-m-d",strtotime("+$JmlHari day",strtotime("$TglMulai")));
	 }

	function Alert($Jenis="",$Ket="",$Tam="")
	{
		/*
			Jenis = danger
			Ket = keterangan
			AutoHide = A (Auto) / X (Close)
		*/
		if($Tam=="A")
		{
			$Auto="AutoHide";
			$Btn="";
		}
		elseif($Tam=="X")
		{
			$Auto="";
			$Btn="
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			";
		}

		return "
			<div class='alert alert-$Jenis $Auto alert-dismissible'>
				$Btn
				$Ket
			</div>
		";
	}

	function breadcrumb($link="")
	{
		/*
			Nama + link + status (A/N) |
		*/
		$link=explode(" |",$link);
		foreach($link as $Arlink)
		{
			$PLink=explode(" + ",$Arlink);
			switch($PLink['3'])
			{
				case "A":$status="active";break;
				case "N":$status="";break;
				default:$status="";break;
			}

			$ahref=($PLink['1']!="")?"<a href='{$PLink['1']}'>".trim($PLink['0'])."</a>":"{$PLink['0']}";

			$li.="<li class='breadcrumb-item $status'>".trim($ahref)."</li>";
		}
		
		return "
				<ol class='breadcrumb' style='padding:0px;background:none;margin:0px'>
					$li
				</ol>
		";
	}

	function InputGroup($Depan="",$Input="",$Belakang="")
	{
		$Depan=($Depan!="")?"
				<span class='input-group-addon' style='background:#f3f3f3'>$Depan</span>
		":"";

		$Belakang=($Belakang!="")?"
				<span class='input-group-addon' style='background:#f3f3f3'>$Belakang</span>
		":"";
		
		return "
		<div class='input-group'>
			$Depan
			$Input
			$Belakang
		</div>
		";
	}

	function CardBody($Kiri="",$Kanan="",$konten="",$Warna="")
	{
		return "
			<div class='box box-$Warna'>
				<div class='box-header with-border'>
					<div class='row'>
						<div class='col-xs-6' style='padding: 7px 0px 8px 16px'><strong>$Kiri</strong></div>
						<div class='col-xs-6 text-right'>$Kanan</div>
					</div>
				</div>
				<div class='box-body'>
					$konten
				</div>
			</div>
		";
	}

	function NamaDepan($Nama="",$Jml="")
	{
		/*
			format : NamaDepan NamaBelakang dst
		*/
		$PNama=explode(" ",$Nama);
		for($i=0;$i<$Jml;$i++)
		{
			return $PNama[$i]." ";
		}
		
	}

	function NavMenu($Menu="",$folder="",$file="")
	{
		/*
			format :
			icon > Menu 1 > ?folder-file-dst > label | (single)
			icon > Menu 2 > ?folder $PUMenuSub['0'] >> (dropdown)
				Sub Menu 1 > file-dst >>> 
				Sub Menu 2 > file-dst >>>
				Sub Menu 3 > file-dst >>> $PUMenuSub['1'](submenu)
		*/
		$PUMenu=explode(" |",$Menu);
		foreach($PUMenu as $ArUMenu)
		{
			$PUMenuSub=explode(" >> ",$ArUMenu);
			$JPUMenuSub=count($PUMenuSub);
			if($JPUMenuSub==1)
			{
				$ArIUMenu=explode(" > ",$ArUMenu);
				
				$AMenu=substr($ArIUMenu['2'],1,strlen($ArIUMenu['2']));
				$PAMenu=explode("-",$AMenu);
				
				$PLabel=explode("/",$ArIUMenu['3']);
				if($ArIUMenu['3']!=""){
					$label="
						<span class='pull-right-container'> 
							<span class='label pull-right bg-".trim($PLabel['1'])."'>".trim($PLabel['0'])."</span>
						</span>";
				}

				$HMenu.="
				<li class='";
					if(!empty($folder) and (is_dir("pages/$folder") and !empty($file) and file_exists("pages/$folder/$file.php"))) 
					{
						if($folder==$PAMenu['0'])
						{
							$HMenu.="active";
						}
					}
					else
					{
						//default
						$AcDefault="active";
					}

				$HMenu.="'>
					<a href='".trim($ArIUMenu['2'])."'>
					<i class='fa fa-".trim($ArIUMenu['0'])."'></i> 
						<span>".trim($ArIUMenu['1'])."</span>
						$label
					</a>
				</li>
				";
			}
			else
			{
				$ArIUMenu=explode(" > ",$PUMenuSub['0']);
				$AmFolder=substr($ArIUMenu['2'],1,strlen($ArIUMenu['2']));
				$HMenu.="
				<li class='treeview ";
				
				if(!empty($folder) and (is_dir("pages/$folder") and !empty($file) and file_exists("pages/$folder/$file.php"))) 
				{
					if($folder==$AmFolder)
					{
						$HMenu.="active";
					}
				}
				else
				{
					//default
					$AcDefault="active";
				}
				
				$HMenu.="'>
					<a href='#'>
						<i class='fa fa-".trim($ArIUMenu['0'])."'></i> <span>".trim($ArIUMenu['1'])."</span>
						<span class='pull-right-container'>
						<i class='fa fa-angle-left pull-right'></i>
						</span>
					</a>
					<ul class='treeview-menu'>";
						$PSubMenu=explode(" >>>",$PUMenuSub['1']);
						foreach($PSubMenu as $ArPSubMenu)
						{
							$PAlSubMenu=explode(" > ",$ArPSubMenu);
							$HMenu.="<li ";
							
							if(!empty($folder) and (is_dir("pages/$folder") and !empty($file) and file_exists("pages/$folder/$file.php"))) 
							{
								if($folder==$AmFolder and $file==$PAlSubMenu['1'])
								{
									$HMenu.="class='active'";
								}
							}
							else
							{
								//default
								$AcDefault="active";
							}

							$HMenu.="><a href='".$ArIUMenu['2']."-".trim($PAlSubMenu['1'])."'><i class='fa fa-angle-right'></i>".trim($PAlSubMenu['0'])."</a></li>";
						}
					$HMenu.="
						
					</ul>
				</li>
				";

			}
			
		}
		return 
		"
		<li class='$AcDefault'>
			<a href='index.php'>
				<i class='fa fa-home'></i><span>BERANDA</span>
			</a>
		</li>
		$HMenu
		";
	}

	function InputRadioCheck($type="",$NamaInput="",$var="",$value="",$SCheck="")
	{
		/*
			type =	checkbox/radio
			var = 	name variabel
			value = value
			NamaInput = Keterangan Input
			SCheck = Status checked
		*/
		return "
			<label class='control-label' style='font-weight:normal'>
				<input type='$type' name='$var' value='$value' $SCheck>
				$NamaInput
			</label>
		";
	}


	function AutoKode($JmlKar="")
	{
		return substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0987654321"),0,$JmlKar);
	}

	function set_flashmsg($warna,$pesan){
		$_SESSION['flashmsg'] = [
			'warna' => $warna,
			'pesan' => $pesan
		];
	}

	function flashmsg(){
		if(isset($_SESSION['flashmsg'])){
			$msg = $this->Alert($_SESSION['flashmsg']['warna'],$_SESSION['flashmsg']['pesan'],"A");
			return $msg;
			unset($_SESSION['flashmsg']);
		}
	}
	function DateDb($date)
	{
		//dd-mm-yyyy to yyyy-mm-dd
		return substr($date,6,4)."-".substr($date,3,2)."-".substr($date,0,2);
	}

	function SDateIndo($date)
	{
		//yyyy-mm-dd to dd-mm-yyyy
		$day=substr($date,8,2);
		$bln=substr($date,5,2);
		$thn=substr($date,0,4);
		return "$day-$bln-$thn";
	}


	function NBulan($a)
	{
		switch($a)
		{
			case "01":$bln="Januari";break;
			case "02":$bln="Februari";break;
			case "03":$bln="Maret";break;
			case "04":$bln="April";break;
			case "05":$bln="Mei";break;
			case "06":$bln="Juni";break;
			case "07":$bln="Juli";break;
			case "08":$bln="Agustus";break;
			case "09":$bln="September";break;
			case "10":$bln="Oktober";break;
			case "11":$bln="November";break;
			case "12":$bln="Desembar";break;
		}
		return $bln;
	}

	function LDateIndo($date)
	{
		//yyyy-mm-dd to 01 Januari 2019
		$day=substr($date,8,2);
		switch(substr($date,5,2))
		{
			case "01":$bln="Januari";break;
			case "02":$bln="Februari";break;
			case "03":$bln="Maret";break;
			case "04":$bln="April";break;
			case "05":$bln="Mei";break;
			case "06":$bln="Juni";break;
			case "07":$bln="Juli";break;
			case "08":$bln="Agustus";break;
			case "09":$bln="September";break;
			case "10":$bln="Oktober";break;
			case "11":$bln="November";break;
			case "12":$bln="Desembar";break;
		}
		$thn=substr($date,0,4);
		return "$day $bln $thn";
	}

	function KetHadir($a)
	{
		switch($a)
		{
			case "H":return "Hadir";break;
			case "I":return "Izin";break;
			case "A":return "Tanpa Keterangan";break;
		}
	}

}

$Komponen = new Komponen();

//fungsi terbilang Non Komponen
function terbilang($nilai="")
{
	//terbilang
	$nilai = abs($nilai);
	$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
	$temp = "";
	if ($nilai < 12) {
		$temp = " ". $huruf[$nilai];
	} else if ($nilai <20) {
		$temp = terbilang($nilai - 10). " belas";
	} else if ($nilai < 100) {
		$temp = terbilang($nilai/10)." puluh". terbilang($nilai % 10);
	} else if ($nilai < 200) {
		$temp = " seratus" . terbilang($nilai - 100);
	} else if ($nilai < 1000) {
		$temp = terbilang($nilai/100) . " ratus" . terbilang($nilai % 100);
	} else if ($nilai < 2000) {
		$temp = " seribu" . terbilang($nilai - 1000);
	} else if ($nilai < 1000000) {
		$temp = terbilang($nilai/1000) . " ribu" . terbilang($nilai % 1000);
	} else if ($nilai < 1000000000) {
		$temp = terbilang($nilai/1000000) . " juta" . terbilang($nilai % 1000000);
	} else if ($nilai < 1000000000000) {
		$temp = terbilang($nilai/1000000000) . " milyar" . terbilang(fmod($nilai,1000000000));
	} else if ($nilai < 1000000000000000) {
		$temp = terbilang($nilai/1000000000000) . " trilyun" . terbilang(fmod($nilai,1000000000000));
	}     
	return $temp;
}

?>