<?php
header('Access-Control-Allow-Origin: *');

error_reporting(E_ALL ^ E_DEPRECATED);
$servername = "herwintika.id";
$username = "herwinti";
$password = "hgyM00F5i6";
$dbname = "herwinti_sapahaji";
mysql_connect($servername, $username, $password) or
    die("Could not connect: " . mysql_error());
mysql_select_db($dbname);

$id = $_GET['id'];
$pass = $_GET['npass'];
// $items_1 = mysql_query("SELECT * FROM (SELECT * FROM request JOIN members on request.memberID = members.memberID and request.memberID =".$idmember.") A JOIN trip B ON  A.tripID =  B.tripID");
$items_1 = mysql_query("UPDATE members SET password='$pass' WHERE memberID=$id");

?>