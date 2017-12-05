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

$items_1 = mysql_query("SELECT * FROM user_data ");

$text = "";
$i = 0;

while( $row_1 = mysql_fetch_array( $items_1,MYSQLI_ASSOC ) ) {

	$text .= "<div class='properties-bottom'>";
	$text .= "<div class='properties-img'>";
	$text .= "<img src='http://si-mice.com/simice/files/pic/promosi/$row_1[promopic]' alt=''>";
	$text .= "<div class='view-caption rent-caption'>";
	$text .= "<h4><span class='glyphicon glyphicon-info-sign'></span> $row_1[tittle] </h4>";  
	$text .= "</div>";
	$text .= "</div>";
	$text .= "<div class='w3ls-text'>";
	$text .= "<h5><a >Detail Promosi :</a></h5>";
	$text .= "<h6 align='justify'>$row_1[detail_promosi]. </h6>";
	$text .= "</div>";
	$text .= "</div>";
	$i++;
}

if ($text == "") {
	$text = "<h4>Tidak Ada Promosi</h4>";
	# code...
}

echo $text;
return $text;
?>