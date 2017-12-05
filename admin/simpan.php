<?php 
header('Access-Control-Allow-Origin: *');

error_reporting(E_ALL ^ E_DEPRECATED);
require "config/main.php";
$type = trim($_POST['type']);
$cmd = trim($_POST['cmd']);

switch ($type) {
	case 'data_user':
		if ($cmd=="tambah") {
			// echo "string";
			// $Destination = '../sapahaji/files/photo/profile';
			// if(!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name'])){
			//     $NewImageName= 'default.jpg';
			//     // move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
			// }
			// else{
			//     $RandomNum = rand(0, 9999999999);
			//     $ImageName = str_replace(' ','-',strtolower($_FILES['ImageFile']['name']));
			//     $ImageType = $_FILES['ImageFile']['type'];
			//     $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
			//     $ImageExt = str_replace('.','',$ImageExt);
			//     $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
			//     $NewImageName = substr($ImageName,0,10).'-'.$RandomNum.'.'.$ImageExt;
			//     move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
			// }
			$insertuser = mysql_query("INSERT INTO user_data (nama_depan,jenis_kel,nomor_tlp,alamat,email,password,profile_pic,is_create_at)
			VALUES('$_POST[nama]',
					'$_POST[jk]',
					'$_POST[hp]',
					'$_POST[alamat]',
					'$_POST[email]',
					'$_POST[password]','default.jpg', NOW())");
			// echo "$insertuser";
			header('Location:index.php?page=data_user');
		}
		elseif($cmd=="edit") {
			mysql_query("UPDATE user_data  SET nama_depan='$_POST[nama]',
				email='$_POST[email]',
				jenis_kel='$_POST[jk]',
				nomor_tlp='$_POST[hp]',
				alamat='$_POST[alamat]'
				WHERE id='$_POST[id]'");

			header('Location:index.php?page=data_user');
		}
		else {
			die(); //jika bukan tambah atau edit, lalu apa ? die aja lah :p
		}
		
		break;
	case 'data_pengaduan':
		if ($cmd=="tambah") {
			
		}
		elseif($cmd=="edit") {
			mysql_query("UPDATE pengaduan SET status='$_POST[status]',
				keterangan='$_POST[deskripsi]',
				update_by='$_POST[idad]'
				WHERE id_adu='$_POST[id]'");
			// echo "UPDATE pengaduan SET status='$_POST[status]',
			// 	keterangan='$_POST[deskripsi]',
			// 	update_by='$_POST[idad]'
			// 	WHERE id_adu='$_POST[id]'";
		}
		else {
			die(); //jika bukan tambah atau edit, lalu apa ? die aja lah :p
		}
		header('Location:index.php?page=data_pengaduan');
		break;
	case 'data_aduanbpjs':
		if ($cmd=="tambah") {
			
		}
		elseif($cmd=="edit") {
			mysql_query("UPDATE aduanbpjs SET status='$_POST[status]',
				keterangan='$_POST[deskripsi]',
				update_by='$_POST[idad]'
				WHERE id_aduan='$_POST[id]'");
			// echo "UPDATE pengaduan SET status='$_POST[status]',
			// 	keterangan='$_POST[deskripsi]',
			// 	update_by='$_POST[idad]'
			// 	WHERE id_adu='$_POST[id]'";
		}
		else {
			die(); //jika bukan tambah atau edit, lalu apa ? die aja lah :p
		}
		header('Location:index.php?page=data_aduanbpjs');
		break;
	case 'data_pendampingan':
		if ($cmd=="tambah") {
			
		}
		elseif($cmd=="edit") {
			mysql_query("UPDATE pendampingan SET status='$_POST[status]',
				keterangan='$_POST[deskripsi]',
				update_by='$_POST[idad]'
				WHERE id_damping='$_POST[id]'");
			// echo "UPDATE pengaduan SET status='$_POST[status]',
			// 	keterangan='$_POST[deskripsi]',
			// 	update_by='$_POST[idad]'
			// 	WHERE id_adu='$_POST[id]'";
		}
		else {
			die(); //jika bukan tambah atau edit, lalu apa ? die aja lah :p
		}
		header('Location:index.php?page=data_pendampingan');
		break;
	case 'data_danaspm':
		if ($cmd=="tambah") {
			
		}
		elseif($cmd=="edit") {
			mysql_query("UPDATE danaspm SET status='$_POST[status]',
				keterangan='$_POST[deskripsi]',
				update_by='$_POST[idad]'
				WHERE id_dspm='$_POST[id]'");
			// echo "UPDATE pengaduan SET status='$_POST[status]',
			// 	keterangan='$_POST[deskripsi]',
			// 	update_by='$_POST[idad]'
			// 	WHERE id_adu='$_POST[id]'";
		}
		else {
			die(); //jika bukan tambah atau edit, lalu apa ? die aja lah :p
		}
		header('Location:index.php?page=data_danaspm');
		break;
	case 'data_pengumuman':
		if ($cmd=="tambah") {
			$Destination = '../simice/files/pic/pengumuman';
			if(!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name'])){
			    $NewImageName= 'default.jpg';
			    move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
			}
			else{
			    $RandomNum = rand(0, 9999999999);
			    $ImageName = str_replace(' ','-',strtolower($_FILES['ImageFile']['name']));
			    $ImageType = $_FILES['ImageFile']['type'];
			    $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
			    $ImageExt = str_replace('.','',$ImageExt);
			    $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
			    $NewImageName = substr($ImageName,0,10).'-'.$RandomNum.'.'.$ImageExt;
			    move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
			}

			mysql_query("INSERT INTO pengumuman (tittle,detail_info,infopic,update_by,date_update) VALUES ('$_POST[judul]', '$_POST[deskripsi]', '$NewImageName', '$_POST[id]', NOW())");
		}
		elseif($cmd=="edit") {
			$Destination = '../simice/pic/pengumuman';
			if(!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name'])){
			    mysql_query("UPDATE pengumuman SET tittle='$_POST[judul]',
					detail_info='$_POST[deskripsi]',
					update_by='$_POST[idad]',
					date_update= NOW()
				WHERE idinfo ='$_POST[id]'");
			}
			else{
			    $RandomNum = rand(0, 9999999999);
			    $ImageName = str_replace(' ','-',strtolower($_FILES['ImageFile']['name']));
			    $ImageType = $_FILES['ImageFile']['type'];
			    $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
			    $ImageExt = str_replace('.','',$ImageExt);
			    $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
			    $NewImageName = substr($ImageName,0,10).'-'.$RandomNum.'.'.$ImageExt;
			    move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
			    mysql_query("UPDATE pengumuman SET tittle='$_POST[judul]',
					detail_info='$_POST[deskripsi]',
					infopic='$NewImageName',
					update_by='$_POST[idad]',
					date_update= NOW()
				WHERE idinfo ='$_POST[id]'");
			}

			// mysql_query("INSERT INTO pengumuman (tittle,detail_info,infopic,update_by,date_update) VALUES ('$_POST[judul]', '$_POST[deskripsi]', '$NewImageName', '$_POST[id]', NOW())");
			// mysql_query("UPDATE admin SET nama='$_POST[nama]',
			// 	username='$_POST[username]',
			// 	password='$_POST[password]'
			// WHERE id='$_POST[id]'");
		}
		else {
			die(); //jika bukan tambah atau edit, lalu apa ? die aja lah :p
		}
		header('Location:index.php?page=pengumuman');
		break;
	case 'spk':
			$buy = explode(", ",$_POST[citybuy]);
			$trans = explode(", ",$_POST[citytrans]);
			$cr = $buy[0];
			$cor = $buy[1];
			$cd = $trans[0];
			$cod = $trans[1];
		if ($cmd=="tambah") {
			mysql_query("INSERT INTO trip(memberID,travel_to_city,travel_to_country,back_to_city,back_to_country,expected_back_date)
			VALUES('$_POST[memberid]',
			'$cd',
			'$cod',
			'$cr',
			'$cor',
			'$_POST[tanggal]')");
		}
		elseif($cmd=="edit") {
			mysql_query("UPDATE trip SET travel_to_city='$cd',
				travel_to_country='$cod',
				back_to_city='$cr',
				back_to_country='$cor',
				expected_back_date='2016-01-01',
				WHERE tripID='$_POST[id]'");
		}
		else {
			die(); //jika bukan tambah atau edit, lalu apa ? die aja lah :p
		}
		header('Location:index.php?page=spk');
		break;
	case 'admin':
		if ($cmd=="tambah") {
			mysql_query("INSERT INTO admin(nama,username,password)
			VALUES('$_POST[nama]',
			'$_POST[username]',
			'$_POST[password]')");
		}
		elseif($cmd=="edit") {
			mysql_query("UPDATE admin SET nama='$_POST[nama]',
				username='$_POST[username]',
				password='$_POST[password]'
				WHERE id=".$_POST[id]);
			
		}
		else {
			die(); //jika bukan tambah atau edit, lalu apa ? die aja lah :p
		}
		header('Location:index.php?page=admin');
		break;
	
	default:
		require_once("pages/404.php");
		break;
}

 ?>