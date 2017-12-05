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
$query = "SELECT * FROM members ORDER BY memberID";
$sql = mysql_query ($query);
$data = array();
while ($row = mysql_fetch_assoc($sql)) {
	array_push($data, $row);
}
 
#setting judul laporan dan header tabel
$judul = "LAPORAN DATA USER PENGGUNA APLIKASI SI - MICE";
$header = array(
		array("label"=>"ID", "length"=>10, "align"=>"L"),
		array("label"=>"USERNAME", "length"=>25, "align"=>"L"),
		array("label"=>"PASSWORD", "length"=>25, "align"=>"L"),
		array("label"=>"EMAIL", "length"=>25, "align"=>"L"),
		array("label"=>"JENIS USER", "length"=>20, "align"=>"L"),
		array("label"=>"NIK", "length"=>35, "align"=>"L"),
		array("label"=>"NAMA", "length"=>35, "align"=>"L"),
		array("label"=>"ALAMAT", "length"=>50, "align"=>"L"),
		array("label"=>"KELURAHAN", "length"=>30, "align"=>"L"),
		array("label"=>"KECAMATAN", "length"=>30, "align"=>"L"),
		array("label"=>"KOTA", "length"=>30, "align"=>"L"),
		array("label"=>"TELEPON", "length"=>30, "align"=>"L")
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