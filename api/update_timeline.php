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

$idtimeline = $_POST['id'];

$note = $_POST['note'];

// $addtimeline="INSERT INTO postingan (type,note,file_path_text,create_at,post_by) VALUES ('$typetimeline', '$note', '$NewImageName', NOW(), '$iduser')";

$updtimeline="UPDATE postingan SET note = '$note' , update_at = NOW() WHERE id_post like '$idtimeline'";

$query=mysql_query($updtimeline);

// echo $data;
// print_r($query);
// return $query;

if ($query == 1) {
	# code...
	$log['Status'] = 'Success';
	$log['Id_Post'] = $idtimeline;
	$tmp[] = $log;
	
} else {
	# code...
	$log['Status'] = 'Fail';
	$tmp[] = $log;

}


// echo $text;
$data = "{\"Update_Status\" : ".json_encode($tmp)."}";
echo $data; 
?>