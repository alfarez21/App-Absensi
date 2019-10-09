<?php
/*
Nusantara Global
Team : Nans, M. Rifki
*/

class Koneksi{
	public $Server;
	public $User;
	public $Password;
	public $Db;

	function Koneksi()
	{
		return mysqli_connect($this->Server,$this->User,$this->Password,$this->Db);
	}

}
$Server = new Koneksi();
?>