<?php
/*
Nusantara Global
Team : Nans, M. Rifki
*/

class Query{
	
	public $kon;
	function __construct($kon)
	{
		$this->kon=$kon;
	}

	//Tampilkan 1 data
	function TampilSatu($Field="",$Table="",$Syarat="")
	{
		if($Syarat==""){$syarat="";}else{$syarat="WHERE $Syarat";}
		if($Field==""){$field="";}else{$field=", $Field";}
		return mysqli_fetch_array(mysqli_query($this->kon,"SELECT * $field FROM $Table $syarat"));
	}

	//Tampilkan semua data
	function TampilSemua($Field="",$Table="",$Syarat="", $Sort="")
	{
		/*
			Sort = Field ASC/DESC
		*/
		if($Syarat==""){$syarat="";}else{$syarat=" WHERE $Syarat";}
		if($Field==""){$field="";}else{$field=", $Field";}
		if($Sort==""){$Sort="";}else{$Sort="order by $Sort";}

		return mysqli_query($this->kon,"SELECT * $field FROM $Table $syarat $Sort");
	}

	//Tambah
	function Tambah($Table="",$Field="",$Value="")
	{
		// echo "INSERT INTO $Table ($Field) VALUES ($Value)";die;
		return mysqli_query($this->kon,"INSERT INTO $Table ($Field) VALUES ($Value)");
	}
	
	//Edit
	function Ubah($Field="",$Table="",$Syarat="")
	{
		if($Syarat==""){$syarat="";}else{$syarat=" WHERE $Syarat";}
		return mysqli_query($this->kon,"UPDATE $Table SET $Field $syarat");
	}

	//Hapus
	function Hapus($Table="",$Syarat="")
	{
		if($Syarat==""){$syarat="";}else{$syarat=" WHERE $Syarat";}
		return mysqli_query($this->kon,"DELETE FROM $Table $syarat");
	}

	//Cek Data
	function CekData($Table="",$Syarat="")
	{
		if($Syarat==""){$syarat="";}else{$syarat=" WHERE $Syarat";}
		return mysqli_num_rows(mysqli_query($this->kon,"select * FROM $Table $syarat"));
	}

	//Jumlah Data
	function JumlahData($Field="",$Table="",$Syarat="")
	{
		if($Syarat==""){$syarat="";}else{$syarat=" WHERE $Syarat";}
		$Q=mysqli_fetch_array(mysqli_query($this->kon,"select count($Field) as jum FROM $Table $syarat"));
		return $Q['jum'];
	}

}
$Query=new Query($kon);
?>