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

$email = $_POST['email'];
$pass = $_POST['password'];

$items_1 = mysql_query("SELECT * FROM user_data where email like '".$email."' and password like '".$pass."'");

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
	$log['Id_Member'] = $idmember;
	$tmp[] = $log;
	$userlogin="UPDATE user_data SET is_login = 1 ,last_login = NOW() WHERE id like '$idmember'";
	// echo $userlogin;
	$querye=mysql_query($userlogin);

	// print_r($querye);

} else {
	# code...
	$log['Status'] = 'Fail';
	$tmp[] = $log;
}


// echo $text;
$data = "{\"Login_Status\" : ".json_encode($tmp)."}";
echo $data; 
?>