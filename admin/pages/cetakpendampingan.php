<?php
header('Access-Control-Allow-Origin: *');

error_reporting(E_ALL ^ E_DEPRECATED);
//koneksi ke database
$host = "localhost";
$user = "u6980135_simice";
$pass = "simice2017";
$dbnm = "u6980135_simice";
 
$conn = mysql_connect($host, $user, $pass);
if ($conn) {
	$open = mysql_select_db($dbnm);
	if (!$open) {
		die ("Database tidak dapat dibuka karena ".mysql_error());
	}
} else {
	die ("Server MySQL tidak terhubung karena ".mysql_error());
}
$output = '';
//akhir koneksi
// require_once('config/main.php');
#ambil data di tabel dan masukkan ke array

$query = "SELECT * FROM pendampingan";
$sql = mysql_query ($query);
$i = 0;
// $data = array();
while ($row = mysql_fetch_assoc($sql)) {
	$i++;
	$query2 = "SELECT * FROM members where memberID = ".$row["create_by"]." ORDER BY memberID";
	$sql2 = mysql_query ($query2);
	while ($row2 = mysql_fetch_assoc($sql2)) {
		$namam = $row2["nama"];
		$emailm = $row2["email"];
	} 
	if ($row["update_by"]>0) {
		# code...
		$query3 = "SELECT * FROM admin where id = ".$row["update_by"]." ORDER BY id";
		$sql3 = mysql_query ($query3);
		while ($row3 = mysql_fetch_assoc($sql3)) {
			$namaa = $row3["nama"];
			$emaila = $row3["email"];
		}
	} else {
		# code...
		$namaa = ' - ';
		$emaila = ' - ';
	}
	$imgsrc = 'http://si-mice.com/simice/files/pic/pendampingan/default.jpg';

	$output .= '<tr>  
                  <td width="3%">'.$i.'</td>  
                  <td width="3%">'.$row["id_damping"].'</td>  
                  <td width="15%">Nama : '.$namam.'<br>Id Member : '.$row["create_by"].'<br>Email : '.$emailm.'</td>
                  <td width="7%">'.$row["tanggal"].'</td>  
                  <td width="30%">'.$row["detail_damping"].'</td> 
                   
                  <td width="5%">'.$row["status"].'</td>  
                  <td width="30%">'.$row["keterangan"].'</td>  
                  <td width="5%">'.$namaa.'</td>  
             </tr>';
    // $output .= '<tr>  
    //               <td width="3%">'.$i.'</td>  
    //               <td width="3%">'.$row["id_damping"].'</td>  
    //               <td width="15%">Nama : '.$namam.'<br>Id Member : '.$row["create_by"].'<br>Email : '.$emailm.'</td>
    //               <td width="7%">'.$row["tanggal"].'</td>  
    //               <td width="30%">'.$row["detail_damping"].'</td>  
    //               <td width="7%"><img src="https://herwintika.id/simice/files/pic/pendampingan/'.$row["dspmpic"].'" border="0" height="50" width="50" /></td>   
    //               <td width="5%">'.$row["status"].'</td>  
    //               <td width="10%">'.$row["keterangan"].'</td>  
    //               <td width="5%">'.$namaa.'</td>  
    //          </tr>  
    //               ';
	
	// $output .= '<tr>  
 //                  <td width="3%">'.$i.'</td>  
 //                  <td width="3%">'.$row["id_damping"].'</td>  
 //                  <td width="15%">Nama : '.$namam.'<br>Id Member : '.$row["create_by"].'<br>Email : '.$emailm.'</td>
 //                  <td width="7%">'.$row["tanggal"].'</td>  
 //                  <td width="30%">'.$row["detail_damping"].'</td>  
 //                  <td width="7%"><img src="https://herwintika.id/simice/files/pic/pendampingan/default.jpg" border="0" height="50" width="50" /></td>   
 //                  <td width="5%">'.$row["status"].'</td>  
 //                  <td width="10%">'.$row["keterangan"].'</td>  
 //                  <td width="5%">'.$namaa.'</td>  
 //             </tr>  
 //                  ';
}

require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Laporan Data Permintaan Pendampingan Aplikasi SI - MICE");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 7);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
      <h1 align="center">Laporan Data Permintaan Pendampingan Aplikasi SI - MICE</h1><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5"> 
      	<thead> 
           <tr style="border: 1px solid black; background-color: #EEE;">  
                <th width="3%"><strong>No</strong></th>  
                <th width="3%"><strong>Id</strong></th>  
                <th width="15%"><strong>User Peminta</strong></th> 
                <th width="7%"><strong>Tanggal Permintaan</strong></th> 
                <th width="30%"><strong>Deskripsi</strong></th>
                  
                <th width="5%"><strong>Status</strong></th>  
                <th width="30%"><strong>Keterangan</strong></th>  
                <th width="5%"><strong>Admin</strong></th>  
           </tr>
        </thead>  
        </tbody>
      ';  
      $content .= $output;  
      $content .= '</tbody></table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('datapendampinganSIMICE.pdf', 'I');
?>