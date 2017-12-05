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

$iduser = $_POST['id'];

$items_1 = mysql_query("SELECT * FROM user_data where id like '".$iduser."'");

$records = array();
$log = array();
$tmp = array();

while( $row_1 = mysql_fetch_array( $items_1,MYSQLI_ASSOC ) ) {
	$records[] = $row_1;
	$idmember = $row_1['id'];
}

$total=count($records);

if ($total>0) {
	# code...
	$log['Status'] = 'Success';
	$log['Description'] = 'Data ditemukan';
	$log['Data'] = $records;
	$tmp[] = $log;
} else {
	# code...
	$log['Status'] = 'Fail';
	$log['Description'] = 'Data tidak ditemukan';
	$tmp[] = $log;
}


$data = "{\"Data_Status\" : ".json_encode($tmp)."}";
echo $data; 
?>