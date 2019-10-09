<?php
/*
Nusantara Global
Team : Nans, M. Rifki
*/

$URL=$_SERVER['QUERY_STRING'];
$PURL=explode("-",$URL);

//Tambahkan jika perlu 
$folder=$PURL['0'];
$file=$PURL['1'];
$v1=$PURL['2'];
$v2=$PURL['3'];
$v3=$PURL['4'];
$v4=$PURL['5'];
$v5=$PURL['6'];
$v6=$PURL['7'];
$v7=$PURL['8'];
$v8=$PURL['9'];
$v9=$PURL['10'];
$v10=$PURL['11'];
$v11=$PURL['12'];
$v12=$PURL['13'];
$v13=$PURL['14'];
$v14=$PURL['15'];
$v15=$PURL['16'];
$v16=$PURL['17'];
$v17=$PURL['18'];
$v18=$PURL['19'];
$v19=$PURL['20'];
$v20=$PURL['21'];

//tambahkan jika perlu
$var01=$_POST['var01'];
$var02=$_POST['var02'];
$var03=$_POST['var03'];
$var04=$_POST['var04'];
$var05=$_POST['var05'];
$var06=$_POST['var06'];
$var07=$_POST['var07'];
$var08=$_POST['var08'];
$var09=$_POST['var09'];
$var10=$_POST['var10'];
$var11=$_POST['var11'];
$var12=$_POST['var12'];
$var13=$_POST['var13'];
$var14=$_POST['var14'];
$var15=$_POST['var15'];
$var16=$_POST['var16'];
$var17=$_POST['var17'];
$var18=$_POST['var18'];
$var19=$_POST['var19'];
$var20=$_POST['var20'];
$tombol=$_POST['tombol'];


if(!empty($folder) and (is_dir("pages/$folder") and !empty($file) and file_exists("pages/$folder/$file.php"))) 
{
    include("pages/$folder/$file.php");
    //Judul Site
    $JdSite="$JdSite - $JdSiteTam";
    $Konten=$Komponen->CardBody($JdKonten,$TKonten,$Konten,$WarnaCardBody);
}
else
{
    //default
    include("pages/beranda.php");
    //Judul Site
    $JdSite="$JdSite - $JdSiteTam";
    $Konten=$Komponen->CardBody($JdKonten,$TKonten,$Konten,$WarnaCardBody);
}
?>