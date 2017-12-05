<?php require_once('config/main.php'); 
$query=mysql_query("select * from admin where username = '".$_SESSION['username']."' and nama='".$_SESSION['nama']."'");
$data = mysql_fetch_array($query);
$query1=mysql_query("select * from pengumuman where idinfo = ".$_GET['id']);
$data1 = mysql_fetch_array($query1);
?>
<section>
	<div class="row">
		<div class="col-md-12">
	      <!-- general form elements disabled -->
	      <div class="box box-info">
	        <div class="box-header">
	          <h3 class="box-title">Edit Pengumuman</h3>
	        </div><!-- /.box-header -->
	        <div class="box-body">
	          <form role="form" method="post" action="simpan.php">
	          <input type="hidden" name="idad" value="<?php echo $data['id']; ?>">
	          <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
	           <input type="hidden" name="type" value="data_pengumuman">
	            <input type="hidden" name="cmd" value="edit">

	            <div class="form-group">
	              <label>Judul Pengumuman</label>
	              <input type="text" class="form-control" name="judul" placeholder="Judul Pengumuman" value="<?php echo $data1['tittle']; ?>" required="" />
	            </div>
	           	<div class="form-group">
	              <label>Foto / Banner</label>
	              <input type="file" class="form-control" name="ImageFile" placeholder="foto" value="<?php echo $data1['infopic']; ?>" />
	            </div>
	            <!-- textarea -->
	            <div class="form-group">
	              <label>Deskripsi Pengumuman</label>
	              <textarea class="form-control" rows="3" name="deskripsi" placeholder="Deskripsi Pengumuman" required="" ><?php echo $data1['detail_info']; ?></textarea>
	            </div>

	            <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Simpan</button>
	            <button type="reset" class="btn btn-warning"> <i class="fa fa-backward"></i> Kembalikan Data</button>
	            <a href="index.php?page=pengumuman" class="btn btn-danger"> <i class="fa fa-times"></i>  Batal</a>
	          </form>
	        </div><!-- /.box-body -->
	      </div><!-- /.box -->
	    </div><!--/.col (right) -->
	</div>
</section>