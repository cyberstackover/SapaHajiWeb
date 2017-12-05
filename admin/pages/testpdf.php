<?php  
 error_reporting(E_ALL ^ E_DEPRECATED);
 function fetch_data()  
 {  
      $output = '';  

      $host = "herwintika.id";
      $user = "herwinti_simice";
      $pass = "simice2017";
      $dbnm = "herwinti_simice";
       
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
      $query = "SELECT * FROM members ORDER BY memberID ASC";
      $sql = mysql_query ($query);
      // $data = array();
      while ($row = mysql_fetch_assoc($sql)) {
        $output .= '<tr>  
                          <td>'.$row["memberID"].'</td>  
                          <td>'.$row["nama"].'</td>  
                          <td>'.$row["username"].'</td>  
                          <td>'.$row["email"].'</td>  
                          <td>'.$row["alamat"].'</td>  
                     </tr>  
                          ';
      }

      // $connect = mysqli_connect("localhost", "root", "", "testing");  
      // $sql = "SELECT * FROM tbl_employee ORDER BY id ASC";  
      // $result = mysqli_query($connect, $sql);  
      // while($row = mysqli_fetch_array($result))  
      // {       
      // $output .= '<tr>  
      //                     <td>'.$row["id"].'</td>  
      //                     <td>'.$row["name"].'</td>  
      //                     <td>'.$row["gender"].'</td>  
      //                     <td>'.$row["designation"].'</td>  
      //                     <td>'.$row["age"].'</td>  
      //                </tr>  
      //                     ';  
      // }  
      return $output;  
 }  
 if(isset($_POST["create_pdf"]))  
 {  
      require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
      <h3 align="center">Export HTML Table data to PDF using TCPDF in PHP</h3><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5">  
           <tr>  
                <th width="5%">ID</th>  
                <th width="10%">Name</th>  
                <th width="10%">Username</th>  
                <th width="10%">Email</th>  
                <th width="65%">Alamat</th>  
           </tr>  
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('sample.pdf', 'I');  
 }  
?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Export HTML Table data to PDF using TCPDF in PHP</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />            
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:700px;">  
                <h3 align="center">Export HTML Table data to PDF using TCPDF in PHP</h3><br />  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="5%">ID</th>  
                               <th width="10%">Name</th>  
                               <th width="10%">Username</th>  
                               <th width="10%">Email</th>  
                               <th width="65%">Alamat</th>  
                          </tr>  
                     <?php  
                     echo fetch_data();  
                     ?>  
                     </table>  
                     <br />  
                     <form method="post">  
                          <input type="submit" name="create_pdf" class="btn btn-danger" value="Create PDF" />  
                     </form>  
                </div>  
           </div>  
      </body>  
 </html> 