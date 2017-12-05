<?php require_once('config/main.php'); 
$query=mysql_query("select * from user_data");
?>
<div class="box">
    <div class="box-header">
      <h3 class="box-title">Data User ( Terdapat <?php echo mysql_num_rows($query); ?> Data)</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
    <?php if (isset($_SESSION['username'])): ?>
    <a href="tambah.php?tambah=data_user" style="margin-bottom: 10px;" class="btn btn-md btn-primary"> <i class="fa fa-plus"></i> Tambah Data User</a>
    <!-- <a href="pages/cetakuser.php" style="margin-bottom: 10px;" class="btn btn-md btn-danger"> <i class="fa fa-print"></i> Cetak PDF</a> -->
    <?php endif; ?>
    <br>
		<table class="table table-bordered" id="tabel" width="100%">
		<thead>
			 <tr>
		    <th>NO</th>
		    <th>NAMA</th>
		    <th>JENIS KELAMIN</th>
		    <th>NOMOR TELP</th>
		    <th>ALAMAT</th>
			<th>EMAIL</th>
			<th>FOTO PROFILE</th>
			<th>LAST LOGIN</th>
			<th>CREATE AT</th>
		    <th>REGISTERBY</th>
		    <?php if (isset($_SESSION['username'])): ?>
		    <th>ACTION</th>
			<?php endif; ?>
		  </tr>
		</thead>
		<tbody>
			<?php
		  $no=1;
		  while($q=mysql_fetch_array($query)){
		  ?>
		  <tr>
		    <td><?php echo $no++; ?></td>          
		    <td><?php echo $q['nama_depan']?></td>
		    <td><?php echo $q['jenis_kel']?></td>
		    <td><?php echo $q['nomor_tlp']?></td>
		    <td><?php echo $q['alamat']?></td>
		    <td><?php echo $q['email']?></td>
			<td><?php echo "<img src='http://herwintika.id/sapahaji/files/photo/profile/$q[profile_pic]' style='width: 100px; height: 100px;'>"?></td>
			<td><?php echo $q['last_login']?></td>
			<td><?php echo $q['is_create_at']?></td>
		    <td><?php echo $q['register_by']?></td>
		   
		   
		    <?php if (isset($_SESSION['username'])): ?>
		    <td>
		    	<a class="btn btn-success" href="edit.php?edit=<?php echo $_GET['page']; ?>&id=<?php echo $q['id']; ?>">Edit</a>
		    	<a class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="hapus.php?hapus=<?php echo $_GET['page']; ?>&id=<?php echo $q['id']; ?>">Hapus</a>
		    </td>
			<?php endif; ?>
		  </tr>
		  <?php
		  }
		  ?>
		</tbody>
		</table>
	</div>
</div>

<script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>

<script src="plugins/jQuery/jquery-1.12.4.js"></script>
<!-- <script src="plugins/buttons.flash.min.js"></script>
<script src="plugins/buttons.html5.min.js"></script>
<script src="plugins/buttons.print.min.js"></script> -->
<script src="plugins/jszip.min.js"></script>
<script src="plugins/pdfmake.min.js"></script>
<script src="plugins/vfs_fonts.js"></script>

<script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
 <script type="text/javascript">
	 $(document).ready(function() {
	 // 	$.extend($.fn.dataTable.defaults, {
		//   dom: 'Bfrtip',
		//   buttons: ['copy', 'csv', 'excel']
		// });
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