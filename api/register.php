<?php
header('Access-Control-Allow-Origin: *');

error_reporting(E_ALL ^ E_DEPRECATED);
$servername = "herwintika.id";
$username = "herwinti";
$password = "hgyM00F5i6";
$dbname = "herwinti_sapahaji";
// Koneksi dan memilih database di server
mysql_connect($servername,$username,$password) or die("Koneksi gagal");
mysql_select_db($dbname) or die("Database tidak bisa dibuka");

$firstname = $_POST['firstname'];
// $lastname = $_POST['lastname'];
$address = $_POST['address'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$sexs = $_POST['sexs'];
$password = $_POST['password'];

$items_1 = mysql_query("SELECT * FROM user_data where email like '".$email."' and password like '".$password."'");
$records = array();
$log = array();
$tmp = array();

while( $row_1 = mysql_fetch_array( $items_1,MYSQLI_ASSOC ) ) {
	$records[] = $row_1;
	$idmember = $row_1['id'];
}
$total=count($records);

if ($total==0) {
	# code...
	$data="INSERT INTO user_data (nama_depan,alamat,nomor_tlp,email,jenis_kel,password,profile_pic,home_pic,is_create_at) VALUES ('$firstname', '$address', '$contact', '$email', '$sexs', '$password', 'default.jpg', 'default.jpg', NOW())";
	$query=mysql_query($data);

	// echo "$data";

	if ($query == 1) {
		# code...
		$log['Status'] = 'Success';
		$tmp[] = $log;
		
	} else {
		# code...
		$log['Status'] = 'Fail';
		$log['Description'] = 'Something wrong. Please, try again later ...';
		$tmp[] = $log;
	}

} else {
	# code...
	$log['Status'] = 'Fail';
	$log['Description'] = 'Email telah terdaftar';
	$tmp[] = $log;
}

$data = "{\"Register_Status\" : ".json_encode($tmp)."}";
echo $data; 

?>