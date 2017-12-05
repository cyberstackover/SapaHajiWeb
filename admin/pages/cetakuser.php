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
$query = "SELECT * FROM members ORDER BY memberID";
$sql = mysql_query ($query);
// $data = array();
while ($row = mysql_fetch_assoc($sql)) {
	
	$output .= '<tr>  
                  <td width="3%">'.$row["memberID"].'</td>  
                  <td width="10%">'.$row["nama"].'</td>  
                  <td width="10%">'.$row["username"].'</td>  
                  <td width="14%">'.$row["email"].'</td>  
                  <td width="6%">'.$row["jenis_user"].'</td> 
                  <td width="10%">'.$row["nik"].'</td>  
                  <td width="15%">'.$row["alamat"].'</td>  
                  <td width="8%">'.$row["kelurahan"].'</td>  
                  <td width="10%">'.$row["kecamatan"].'</td>
                  <td width="8%">'.$row["kota"].'</td>  
                  <td width="8%">'.$row["nohp"].'</td>  
             </tr>  
                  ';
}
 
require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Laporan Data User Aplikasi SI - MICE");  
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
      <h1 align="center">Laporan Data User Aplikasi SI - MICE</h1><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5"> 
      	<thead> 
           <tr style="border: 1px solid black; background-color: #EEE;">  
                <th width="3%"><strong>ID</strong></th>  
                <th width="10%"><strong>Name</strong></th>  
                <th width="10%"><strong>Username</strong></th>  
                <th width="14%"><strong>Email</strong></th>  
                <th width="6%"><strong>Jenis</strong></th>
                <th width="10%"><strong>NIK</strong></th>  
                <th width="15%"><strong>Alamat</strong></th>  
                <th width="8%"><strong>Kelurahan</strong></th>  
                <th width="10%"><strong>Kecamatan</strong></th>  
                <th width="8%"><strong>Kota</strong></th>
                <th width="8%"><strong>No HP</strong></th>  
           </tr>
        </thead>  
        </tbody>
      ';  
      $content .= $output;  
      $content .= '</tbody></table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('datauserSIMICE.pdf', 'I');

?>