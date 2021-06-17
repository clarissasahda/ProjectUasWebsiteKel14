<?php 
class database{
	var $host = "localhost";
	var $username = "root";
	var $password = "";
	var $database = "db";
	var $koneksi;
 
	function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password,$this->database);
	}
 
	function register($username,$password,$nama)
	{	
		$insert = mysqli_query($this->koneksi,"insert into tb_user values ('$id','$username','$password','$nama')");
		return $insert;
	}

} 
?>