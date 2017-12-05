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
$typepost = $_POST['typepost'];



if ($iduser != 0) {
	# code...
	if ($typepost == 'all' || $typepost == 'ALL') {
		# code...
		$items_1 = mysql_query("SELECT * FROM postingan JOIN user_data ON postingan.post_by = user_data.id AND postingan.post_by like '$iduser' ORDER BY postingan.create_at DESC");
	} else {
		# code...
		$items_1 = mysql_query("SELECT * FROM postingan JOIN user_data ON postingan.post_by = user_data.id AND postingan.type like '$typepost' AND postingan.post_by like '$iduser' ORDER BY postingan.create_at DESC");
	}
} else {
	# code...
	if ($typepost == 'all' || $typepost == 'ALL') {
		# code...
		$items_1 = mysql_query("SELECT * FROM postingan JOIN user_data ON postingan.post_by = user_data.id ORDER BY postingan.create_at DESC");
	} else {
		# code...
		$items_1 = mysql_query("SELECT * FROM postingan JOIN user_data ON postingan.post_by = user_data.id AND postingan.type like '$typepost' ORDER BY postingan.create_at DESC");
	}
}

// print_r($items_1);
// echo $items_1;

$records = array();
$countlike = array();
$countcomm = array();
$log = array();
$tmp = array();

while( $row_1 = mysql_fetch_array( $items_1,MYSQLI_ASSOC ) ) {

	// $comments = mysql_query("SELECT COUNT(comment.id_comment) as JUMLAH_COMMENT,COUNT(likepost.id_like) as JUMLAH_LIKE FROM comment, likepost WHERE comment.id_post like $row_1[id_post] AND likepost.id_post like $row_1[id_post]");
	// while( $row_2 = mysql_fetch_array( $comments,MYSQLI_ASSOC ) ) {
	// 	array_push($records,array_merge($row_1,$row_2));
	// }
	$listcomm = array();
	$comments = mysql_query("SELECT COUNT(id_comment) as JUMLAH_COMMENT FROM comment WHERE id_post like $row_1[id_post] AND comment.com_type like 'comment'");
	while( $row_2 = mysql_fetch_array( $comments,MYSQLI_ASSOC ) ) {
		// // array_push($records,array_merge($row_1,$row_2));
		// // $row_2 =
		// print_r( $row_1);
		// array_merge($row_1,$row_2);
		// print_r( $row_2);
		// print_r( $row_1);
		if ($row_2['JUMLAH_COMMENT'] > 0) {
			# code...
			$listcomment = mysql_query("SELECT * FROM comment JOIN user_data ON comment.comment_by = user_data.id AND comment.id_post like $row_1[id_post] AND comment.com_type like 'comment'");
			while( $row_4 = mysql_fetch_array( $listcomment,MYSQLI_ASSOC ) ) {
				array_push($listcomm,$row_4);
			}
			$countcomm = array(
		        'JUMLAH_COMMENT' => $row_2['JUMLAH_COMMENT'],
		        'LIST_COMMENT' => $listcomm
	        );
		} else{
			$countcomm = array(
		        'JUMLAH_COMMENT' => 0,
		        'LIST_COMMENT' => $listcomm
	        );
		}
		
	}
	$likes = mysql_query("SELECT COUNT(id_like) as JUMLAH_LIKE FROM likepost WHERE id_post like $row_1[id_post]");
	while( $row_3 = mysql_fetch_array( $likes,MYSQLI_ASSOC ) ) {
		// // array_push($records,array_merge($row_1,$row_3));
		// print_r( $row_1);
		// array_merge($row_1,$row_3);
		// print_r( $row_3);
		$countlike = array(
	        'JUMLAH_LIKE' => $row_3['JUMLAH_LIKE']
        );
		// print_r( $row_1);
	}

	array_push($records,array_merge($row_1,$countlike,$countcomm));
	// print_r( $records);
	
}
$total=count($records);


if ($total > 0) {
	# code...
	$log['Status'] = 'Success';
	$log['Data'] = $records;
	$tmp[] = $log;
	
} else {
	# code...
	$log['Status'] = 'Fail';
	$tmp[] = $log;

}


// echo $text;
$data = "{\"List_Status\" : ".json_encode($tmp)."}";
echo $data; 
?>