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

$firstname = $_POST['firstname'];
// $lastname = $_POST['lastname'];
$address = $_POST['address'];
$contact = $_POST['contact'];
$sexs = $_POST['sexs'];
// $about = $_POST['about'];


$Destinationprofile = '../files/photo/profile';
// $Destinationhome = '../files/photo/home';

if(!isset($_FILES['ImageFileprofile']) || !is_uploaded_file($_FILES['ImageFileprofile']['tmp_name'])){
    $NewImageNameprofile= '';
    // move_uploaded_file($_FILES['ImageFileprofile']['tmp_name'], "$Destinationprofile/$NewImageNameprofile");
} else {
    $RandomNumprofile = rand(0, 9999999999);
    $ImageNameprofile = str_replace(' ','-',strtolower($_FILES['ImageFileprofile']['name']));
    $ImageTypeprofile = $_FILES['ImageFileprofile']['type'];
    $ImageExtprofile = substr($ImageNameprofile, strrpos($ImageNameprofile, '.'));
    $ImageExtprofile = str_replace('.','',$ImageExtprofile);
    $ImageNameprofile = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageNameprofile);
    $NewImageNameprofile = substr($ImageNameprofile,0,10).'-'.$RandomNumprofile.'.'.$ImageExtprofile;
    move_uploaded_file($_FILES['ImageFileprofile']['tmp_name'], "$Destinationprofile/$NewImageNameprofile");
}

// if(!isset($_FILES['ImageFilehome']) || !is_uploaded_file($_FILES['ImageFilehome']['tmp_name'])){
//     $NewImageNamehome= '';
//     // move_uploaded_file($_FILES['ImageFilehome']['tmp_name'], "$Destinationhome/$NewImageNamehome");
// } else {
//     $RandomNumhome = rand(0, 9999999999);
//     $ImageNamehome = str_replace(' ','-',strtolower($_FILES['ImageFilehome']['name']));
//     $ImageTypehome = $_FILES['ImageFilehome']['type'];
//     $ImageExthome = substr($ImageNamehome, strrpos($ImageNamehome, '.'));
//     $ImageExthome = str_replace('.','',$ImageExthome);
//     $ImageNamehome = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageNamehome);
//     $NewImageNamehome = substr($ImageNamehome,0,10).'-'.$RandomNumhome.'.'.$ImageExthome;
//     move_uploaded_file($_FILES['ImageFilehome']['tmp_name'], "$Destinationhome/$NewImageNamehome");
// }

// $data="INSERT INTO user_data (nama_depan,nama_belakang,alamat,nomor_tlp,email,jenis_kel,password,is_login,last_login,create_at) VALUES ('$firstname', '$lastname', '$address', '$contact', '$email', '$sexs', '$password', 1, NOW(), NOW())";

if ($NewImageNameprofile != '') {
    # code...
    $userupdate="UPDATE user_data SET nama_depan = '$firstname' , alamat = '$address' ,nomor_tlp = '$contact', jenis_kel = '$sexs', profile_pic = '$NewImageNameprofile' WHERE id like '$iduser'";
} else {
    # code...
    $userupdate="UPDATE user_data SET nama_depan = '$firstname' , alamat = '$address' ,nomor_tlp = '$contact', jenis_kel = '$sexs' WHERE id like '$iduser'";
}



$query=mysql_query($userupdate);

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
$data = "{\"Update_Status\" : ".json_encode($tmp)."}";
echo $data; 
?>