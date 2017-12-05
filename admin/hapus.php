<?php 
if (isset($_GET['hapus'])) {
	require "config/main.php";
	switch ($_GET['hapus']) {
		case 'data_user':
			mysql_query("DELETE FROM user_data WHERE id=".$_GET['id']);
			header('Location:index.php?page='.$_GET['hapus']);
			break;
		case 'data_pembelian':
			mysql_query("DELETE FROM request WHERE reqID=".$_GET['id']);
			header('Location:index.php?page='.$_GET['hapus']);
			break;
		case 'pengumuman':
			mysql_query("DELETE FROM pengumuman WHERE idinfo=".$_GET['id']);
			header('Location:index.php?page='.$_GET['hapus']);
			break;
		case 'data_pengaduan':
			mysql_query("DELETE FROM postingan WHERE id_post=".$_GET['id']);
			header('Location:index.php?page='.$_GET['hapus']);
		break;
		case 'data_pendampingan':
			mysql_query("DELETE FROM pendampingan WHERE id_damping=".$_GET['id']);
			header('Location:index.php?page='.$_GET['hapus']);
		break;
		case 'data_danaspm':
			mysql_query("DELETE FROM danaspm WHERE id_dspm=".$_GET['id']);
			header('Location:index.php?page='.$_GET['hapus']);
		break;
		case 'data_aduanbpjs':
			mysql_query("DELETE FROM aduanbpjs WHERE id_aduan=".$_GET['id']);
			header('Location:index.php?page='.$_GET['hapus']);
		break;
		case 'promosi':
			mysql_query("DELETE FROM promosi WHERE idpromosi=".$_GET['id']);
			header('Location:index.php?page='.$_GET['hapus']);
		break;
		case 'spk':
			mysql_query("DELETE FROM trip WHERE tripID=".$_GET[id]);
			header('Location:index.php?page='.$_GET['hapus']);
			break;
		case 'admin':
			mysql_query("DELETE FROM admin WHERE id=".$_GET[id]);
			header('Location:index.php?page='.$_GET['hapus']);
			break;
		
		default:
			require_once("pages/404.php");
			break;
	}
}
else {
	require_once("pages/home.php");
}

 ?>