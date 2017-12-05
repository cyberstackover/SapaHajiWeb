<?php

$server = "";
$username = "";
$password = "";
$database = "";
 
 
error_reporting(E_ALL ^ E_DEPRECATED);
// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
?>