<?php 
session_start();
session_unset();
session_destroy();
setcookie('id', '', 0, '/');
setcookie('nama', '', 0, '/');
setcookie('username', '', 0, '/');
setcookie('password', '', 0, '/');
header('location:v_login.php');
?>