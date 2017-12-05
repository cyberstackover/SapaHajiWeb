<?php require_once('config/main.php');
$query=mysql_query("select * from pengumuman");
 ?>

 <div class="box">
    <div class="box-header">
      <h3 class="box-title">Forum Silaturahmi</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
    <div class="container">
    	<?php if (isset($_SESSION['username'])): ?>
    	<iframe src="http://si-mice.com/simice/chat/index.html?id=0" style="top:0px;left:0px;bottom:0px;right:0px;width: 92%;height: 100%;border:none; padding:0;overflow:hidden;z-index:999999; min-height: 650px;">
		  <p>Your browser does not support iframes.</p>
		</iframe>
	<?php endif; ?>
    </div>
    
		
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