<?php require_once('config/main.php');
$query=mysql_query("select * from postingan");
 ?>
<div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Post ( Terdapat <?php echo mysql_num_rows($query); ?> Data)</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
    <?php if (isset($_SESSION['username'])): ?>
     <!-- <a href="tambah.php?tambah=data_pengaduan" style="margin-bottom: 10px;" class="btn btn-md btn-primary"> <i class="fa fa-plus"></i> Tambah Data Pengaduan</a> -->
     <!-- <a href="pages/cetakpengaduan.php" style="margin-bottom: 10px;" class="btn btn-md btn-danger"> <i class="fa fa-print"></i> Cetak PDF</a> -->
	<?php endif; ?>
		<table width="100%" class="table table-bordered" id="tabel">
		<thead>
			
		  <tr>
		    <th>NO</th>
		    <th>TYPE</th>
			<th>STATUS TEXT</th>
			<th>FILE</th>
		    <th>LOKASI </th>
		    <th>TGL POST </th>
			<th>POST BY</th>
			<?php if (isset($_SESSION['username'])): ?>
			<th>ACTION</th>
		    <?php endif; ?>
		  </tr>
		</thead>
		<tbody>
			<?php
		  $no=1;
		  while($q=mysql_fetch_array($query)){
		  // $test = "select * from members where memberID = $q[create_by]";
		  // // echo "$test";
		  // $queryt=mysql_query($test);
		  // while($e=mysql_fetch_array($queryt)){
		  // $text = "<img src='http://si-mice.com/simice/files/pic/pengaduan/$q[adupic]' style='width: 100px; height: 100px;'>";
		  	if ($q['type'] == 'text') {
		  		# code...
		  		$text = "$q[file_path_text]'";
		  	} else if ($q['type'] == 'photo') {
		  		# code...
		  		$text = "<img src='http://herwintika.id/sapahaji/files/photo/timeline/$q[file_path_text]' style='width: 100px; height: 100px;'>";
		  	} else if ($q['type'] == 'video') {
		  		# code...
		  		// $text = "<img src='http://si-mice.com/simice/files/pic/pengaduan/$q[adupic]' style='width: 100px; height: 100px;'>";
		  		$text = "<video width='100' height='100' controls><source src='http://herwintika.id/sapahaji/files/video/$q[file_path_text]' type='video/mp4'></video>";
		  	}
		  	
		  ?> 
		  <tr>
		    <td><?php echo $no++; ?></td>           
		    <td><?php echo $q['type']?></td>
			<td><?php echo $q['note']?></td>
			<td><?php echo $text?></td>
		    <td><?php echo $q['location']?></td>
		    <td><?php echo $q['create_at']?></td>
			<td><?php echo $q['post_by']?></td>
			
			
			<?php if (isset($_SESSION['username'])): ?>
			<td>
				<!-- <a class="btn btn-success" href="edit.php?edit=<?php echo $_GET['page']; ?>&id=<?php echo $q['id_adu']; ?>">Edit</a> -->
				<a class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="hapus.php?hapus=<?php echo $_GET['page']; ?>&id=<?php echo $q['id_post']; ?>">Hapus</a>
			</td>
			<?php endif; ?>
		  </tr>
		  <?php
		  // }
		}
		  ?>
		</tbody>
		</table>
	</div>
</div>
<script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
 <script type="text/javascript">
	 $(document).ready(function() {
	 	$('#tabel').dataTable({
	          "bPaginate": true,
	          "bLengthChange": true,
	          "bFilter": true,
	          "bSort": true,
	          "bInfo": true,
	          "bAutoWidth": true
	    });
	 });
</script>