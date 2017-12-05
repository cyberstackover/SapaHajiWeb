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
$query = "SELECT * FROM promosi ORDER BY idpromosi";
$sql = mysql_query ($query);
$i = 0;
// $data = array();
while ($row = mysql_fetch_assoc($sql)) {
	$i++;
	$query2 = "SELECT * FROM members where memberID = ".$row["update_by"]." ORDER BY memberID";
	$sql2 = mysql_query ($query2);
	while ($row2 = mysql_fetch_assoc($sql2)) {
		$namam = $row2["nama"];
		$emailm = $row2["email"];
	}
	$output .= '<tr>  
                  <td width="3%">'.$i.'</td>  
                  <td width="3%">'.$row["idpromosi"].'</td>  
                  <td width="15%">Nama : '.$namam.'<br>Id Member : '.$row["update_by"].'<br>Email : '.$emailm.'</td>  
                  <td width="12%">'.$row["tittle"].'</td>  
                  <td width="42%">'.$row["detail_promosi"].'</td> 
                  <td width="15%"><img src="http://si-mice.com/simice/files/pic/promosi/'.$row["promopic"].'" border="0" height="50" width="50" /></td>  
                  <td width="10%">'.$row["date_update"].'</td>    
             </tr>  
                  ';
}

require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Laporan Data Promosi Aplikasi SI - MICE");  
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
      <h1 align="center">Laporan Data Promosi Aplikasi SI - MICE</h1><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5"> 
      	<thead> 
           <tr style="border: 1px solid black; background-color: #EEE;">  
                <th width="3%"><strong>No</strong></th>  
                <th width="3%"><strong>Id</strong></th>  
                <th width="15%"><strong>Pemasang</strong></th>  
                <th width="12%"><strong>Judul</strong></th>  
                <th width="42%"><strong>Deskripsi</strong></th>
                <th width="15%"><strong>Foto / Poster</strong></th>  
                <th width="10%"><strong>Tanggal Pasang</strong></th>    
           </tr>
        </thead>  
        </tbody>
      ';  
      $content .= $output;  
      $content .= '</tbody></table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('datapromoSIMICE.pdf', 'I');

?>