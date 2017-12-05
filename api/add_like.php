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

$idpost = $_POST['idpost'];
$iduser = $_POST['iduser'];
// $note = $_POST['comment_text'];

$addtimeline="INSERT INTO comment (id_post,com_type,create_at,comment_by) VALUES ('$idpost', 'like',  NOW(), '$iduser')";
$addlike="INSERT INTO likepost (id_post,create_at,like_by) VALUES ('$idpost',  NOW(), '$iduser')";

// $addtimeline="UPDATE user_data SET nama_depan = '$firstname' ,nama_belakang = '$lastname', alamat = '$address' ,nomor_tlp = '$contact', email = '$email' ,jenis_kel = '$sexs', password = '$password' , profile_pic = '$NewImageNameprofile', home_pic = '$NewImageNamehome' , about = '$about' WHERE id like '$iduser'";

$query=mysql_query($addtimeline);
$query1=mysql_query($addlike);

// echo $data;
// print_r($query);
// return $query;

if ($query == 1) {
	# code...
	$log['Status'] = 'Success';
	$log['Id_Member'] = $iduser;
	$tmp[] = $log;
	
} else {
	# code...
	$log['Status'] = 'Fail';
	$tmp[] = $log;

}


// echo $text;
$data = "{\"Create_Comment\" : ".json_encode($tmp)."}";
echo $data; 
?>