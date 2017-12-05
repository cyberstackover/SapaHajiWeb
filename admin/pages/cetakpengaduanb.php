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
//akhir koneksi
// require_once('config/main.php');
#ambil data di tabel dan masukkan ke array
$query = "SELECT id_adu,create_by,tanggal,detail_adu,lokasi,jenis,category,status,keterangan,update_by FROM pengaduan ORDER BY id_adu";
$sql = mysql_query ($query);
$data = array();
while ($row = mysql_fetch_assoc($sql)) {
	array_push($data, $row);
}
 
#setting judul laporan dan header tabel
$judul = "LAPORAN DATA PENGADUAN";
$header = array(
		array("label"=>"ID", "length"=>10, "align"=>"L"),
		array("label"=>"MEMBER", "length"=>25, "align"=>"L"),
		array("label"=>"TANGGAL", "length"=>25, "align"=>"L"),
		array("label"=>"DETAIL", "length"=>85, "align"=>"L"),
		array("label"=>"LOKASI", "length"=>20, "align"=>"L"),
		array("label"=>"JENIS", "length"=>35, "align"=>"L"),
		array("label"=>"CATEGORY", "length"=>35, "align"=>"L"),
		array("label"=>"STATUS", "length"=>30, "align"=>"L"),
		array("label"=>"KETERANGAN", "length"=>30, "align"=>"L"),
		array("label"=>"ADMIN", "length"=>30, "align"=>"L")
	);
 
#sertakan library FPDF dan bentuk objek
require_once ("fpdf/fpdf.php");
$pdf = new FPDF();
$pdf->AddPage('L');
 
#tampilkan judul laporan
$pdf->SetFont('Arial','B','16');
$pdf->Cell(0,20, $judul, '0', 1, 'C');
 
#buat header tabel
$pdf->SetFont('Arial','','10');
$pdf->SetFillColor(255,0,0);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(128,0,0);
foreach ($header as $kolom) {
	$pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
}
$pdf->Ln();
 
#tampilkan data tabelnya
$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetFont('');
$fill=false;
foreach ($data as $baris) {
	$i = 0;
	foreach ($baris as $cell) {
		$pdf->Cell($header[$i]['length'], 5, $cell, 1, '0', $kolom['align'], $fill);
		$i++;
	}
	$fill = !$fill;
	$pdf->Ln();
}
 
#output file PDF
$pdf->Output();
?>