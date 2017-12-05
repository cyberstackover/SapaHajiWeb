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

$note = $_POST['note'];
$location = $_POST['location'];

$typetimeline = '';
$NewImageName = '';

if(!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name'])){
    $typetimeline= 'text';
    
    
    // move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
} else {
    $RandomNum = rand(0, 9999999999);
    $ImageName = str_replace(' ','-',strtolower($_FILES['ImageFile']['name']));
    $ImageType = $_FILES['ImageFile']['type'];
    $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
    $ImageExt = str_replace('.','',$ImageExt);
    if ($ImageExt == 'jpg' || $ImageExt == 'JPG' || $ImageExt == 'jpeg' || $ImageExt == 'JPEG' || $ImageExt == 'png' || $ImageExt == 'PNG' || $ImageExt == 'gif' || $ImageExt == 'GIF') {
        # code...
        $Destination = '../files/photo/timeline';
        $typetimeline= 'photo';
    } else {
        # code...
        $Destination = '../files/video';
        $typetimeline= 'video';
    }
    
    $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
    $NewImageName = substr($ImageName,0,10).'-'.$RandomNum.'.'.$ImageExt;
    move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
}

$addtimeline="INSERT INTO postingan (type,location,note,file_path_text,create_at,post_by) VALUES ('$typetimeline','$location', '$note', '$NewImageName', NOW(), '$iduser')";

// $addtimeline="UPDATE user_data SET nama_depan = '$firstname' ,nama_belakang = '$lastname', alamat = '$address' ,nomor_tlp = '$contact', email = '$email' ,jenis_kel = '$sexs', password = '$password' , profile_pic = '$NewImageNameprofile', home_pic = '$NewImageNamehome' , about = '$about' WHERE id like '$iduser'";

$query=mysql_query($addtimeline);

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
$data = "{\"Create_Status\" : ".json_encode($tmp)."}";
echo $data; 
?>