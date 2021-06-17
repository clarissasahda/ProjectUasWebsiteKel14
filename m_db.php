<?php
/**
 * using mysqli_connect for database connection
 */

$databaseHost = 'localhost';
$databaseName = 'db';
$databaseUsername = 'root';
$databasePassword = ''; 

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 



?>
