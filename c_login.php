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
 
	function login($username,$password,$remember)
	{
		$query = mysqli_query($this->koneksi,"select * from tb_user where username='$username'");
		$data_user = $query->fetch_array();
		if(password_verify($password,$data_user['password']))
		{
			
			if($remember)
			{
				setcookie('id', $id, time() + (60 * 60 * 24 * 5), '/');
				setcookie('nama', $data_user['nama'], time() + (60 * 60 * 24 * 5), '/');
				setcookie('username', $data_user['username'], time() + (60 * 60 * 24 * 5), '/');
				setcookie('password', $data_user['password'], time() + (60 * 60 * 24 * 5), '/');
			}
			$_SESSION['id'] = $id;
			$_SESSION['nama'] = $data_user['nama'];
			$_SESSION['username'] = $data_user['username'];
			$_SESSION['password'] = $data_user['password'];
			$_SESSION['is_login'] = TRUE;
			return TRUE;
		}
	}
 
	function relogin($id)
	{
		$query = mysqli_query($this->koneksi,"select * from tb_user where username='$username'");
		$data_user = $query->fetch_array();
		$_SESSION['id'] = $id;
		$_SESSION['username'] = $data_user['username'];
		$_SESSION['is_login'] = TRUE;
	}
	
} 
 
 
?>