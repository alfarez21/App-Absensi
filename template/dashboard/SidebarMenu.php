<?php
/*
Nusantara Global
Team : Nans, M. Rifki
*/

$NamaShort=$Komponen->NamaDepan($NHName,2);

// Administator
if($_SESSION['lvl'] == 3 ){
	$LMenu="
		user > KELOLA PENGGUNA > ?pengguna-daftar >  |
		book > ABSENSI KARYAWAN > ?absen-absen >  |
		";
}

// Pemilik
if($_SESSION['lvl'] == 2 ){
	$LMenu="
		book > LAPORAN > ?laporan-laporan >  |
		";
}

$SidebarMenu="
<div class='user-panel'>
	<div class='pull-left image'>
		<img src='$NHImages' class='img-circle' alt='User Image'>
	</div>
	<div class='pull-left info'>
		<p>$NamaShort</p>
		<a href='#'><i class='fa fa-circle text-success'></i> Online</a>
	</div>
</div>

<ul class='sidebar-menu'>
	<li class='header'>NAVIGATION</li>
	".$Komponen->NavMenu($LMenu,$folder,$file)."
</ul>
";
?>