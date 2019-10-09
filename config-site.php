<?php
/*
Nusantara Global
Team : Nans, M. Rifki
*/

$user = $Query->TampilSatu("","karyawan","NoRegistrasi='{$_SESSION['idUser']}'");

//Browser
$IcoBrowser="ng.jpg";

//Footer
$FYear="2019";
$FVersion="<strong>Version 1.0.0</strong>";
$FSupport="<a href='' style='text-decoration:none'>Klinik Nur Insan</a>";
$FInstansi="Klinik Nur Insan";
$JdSite="Klinik Nur Insan";

//SidebarHeader
$SHeaderLong="ABSENSI";
$SHeaderShort="AB";

//NavbarHeader
$NHImages="images/avatar-5.jpg";
$NHName=$user['Nama'];
$NHKeterangan="Hai, Saya {$user['Nama']}";

//Konfigurasi dashboard
$SkinDashboard="blue";
$WarnaCardBody="primary";
?>