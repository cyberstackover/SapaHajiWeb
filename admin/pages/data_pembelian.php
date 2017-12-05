<?php require_once('config/main.php');
$query=mysql_query("select * from pengaduan");
 ?>
<div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Pengaduans ( Terdapat <?php echo mysql_num_rows($query); ?> Data)</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
    <?php if (isset($_SESSION['username'])): ?>
    
	<?php endif; ?>
		<table width="100%" class="table table-bordered" id="tabel">
		<thead>
			
		  <tr>
		    <th>NO</th>
		    <th>ID MEMBER</th>
			<th>PESANAN</th>
			<th>KETERANGAN</th>
		    <th>KATEGORY</th>
			<th>LOKASI PESANAN</th>
			<th>LOKASI PENGAMBILAN</th>
			<th>HARGA</th>
			<th>STATUS</th>
			<?php if (isset($_SESSION['username'])): ?>
			<!-- <th></th> -->
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
		    <td><?php echo $q['create_by']?></td>
			<td><?php echo $q['tanggal']?></td>
			<td><?php echo $q['detail_adu']?></td>
		    <td><?php echo $q['lokasi']?></td>
			<td><?php echo $q['adupic'] ?>, <?php echo $q['adufile'] ?></td>
			<td><?php echo $q['jenis'] ?>, <?php echo $q['category'] ?></td>
			<td><?php echo $q['status']?></td>
			<td><?php echo $q['keterangan']?></td>
			
			
			<?php if (isset($_SESSION['username'])): ?>
			<!-- <td>
				<a class="btn btn-success" href="edit.php?edit=<?php echo $_GET['page']; ?>&id=<?php echo $q['reqID']; ?>">Edit</a>
				<a class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="hapus.php?hapus=<?php echo $_GET['page']; ?>&id=<?php echo $q['reqID']; ?>">Hapus</a>
			</td> -->
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