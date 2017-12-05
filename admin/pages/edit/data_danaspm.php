<?php require_once('config/main.php'); 
$query=mysql_query("select * from admin where username = '".$_SESSION['username']."' and nama='".$_SESSION['nama']."'");
$data = mysql_fetch_array($query);
$query1=mysql_query("select * from danaspm where id_dspm = ".$_GET['id']);
$data1 = mysql_fetch_array($query1);
?>
<section>
	<div class="row">
		<div class="col-md-12">
	      <!-- general form elements disabled -->
	      <div class="box box-info">
	        <div class="box-header">
	          <h3 class="box-title">Edit Data Pengajuan Dana SPM</h3>
	        </div><!-- /.box-header -->
	        <div class="box-body">
	          <form role="form" method="post" action="simpan.php">
	          <input type="hidden" name="idad" value="<?php echo $data['id']; ?>">
	          <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
	           <input type="hidden" name="type" value="data_danaspm">
	            <input type="hidden" name="cmd" value="edit">

	            <div class="form-group">
	                <label>Status</label>
	                <select name="status" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
	                <?php if ($data1['status']=='New') {
	                	# code...
	                	echo "<option value='New' selected='selected'>New</option>
	                  <option value='Proses' >Proses</option>
	                  <option value='Finish' >Finish</option>";
	                } else if($data1['status']=='Proses') {
	                	# code...
	                	echo "<option value='New' >New</option>
	                  <option value='Proses' selected='selected'>Proses</option>
	                  <option value='Finish' >Finish</option>";
	                } else{
	                	echo "<option value='New'>New</option>
	                  <option value='Proses' >Proses</option>
	                  <option value='Finish' selected='selected'>Finish</option>";
	                }
	                ?>
	                </select>
              	</div>
	           	
	            <div class="form-group">
	              <label>Keterangan</label>
	              <textarea class="form-control" rows="3" name="deskripsi" placeholder="Keterangan Pengaduan" required="" ><?php echo $data1['keterangan']; ?></textarea>
	            </div>

	            <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Simpan</button>
	            <button type="reset" class="btn btn-warning"> <i class="fa fa-backward"></i> Kembalikan Data</button>
	            <a href="index.php?page=data_danaspm" class="btn btn-danger"> <i class="fa fa-times"></i>  Batal</a>
	          </form>
	        </div><!-- /.box-body -->
	      </div><!-- /.box -->
	    </div><!--/.col (right) -->
	</div>
</section>