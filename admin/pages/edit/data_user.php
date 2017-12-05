<?php require_once('config/main.php'); 
$query=mysql_query("select * from user_data where id=".$_GET['id']);
$data = mysql_fetch_array($query);
?>
<section>
	<div class="row">
		<div class="col-md-12">
	      <!-- general form elements disabled -->
	      <div class="box box-info">
	        <div class="box-header">
	          <h3 class="box-title">Edit User</h3>
	        </div><!-- /.box-header -->
	        <div class="box-body">
	          <form role="form" method="post" action="simpan.php">
	          <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
	           <input type="hidden" name="type" value="data_user">
	            <input type="hidden" name="cmd" value="edit">

	           <!--  <div class="form-group">
	              <label>Nama</label>
	              <input type="text" class="form-control" name="nama" placeholder="Nama" value="<?php echo $data['nama']; ?>"/>
	            </div>
	            <div class="form-group">
	              <label>Alamat</label>
	              <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat"><?php echo $data['alamat']; ?></textarea>
	            </div>
	            <div class="form-group">
	              <label>Telepon</label>
	              <input type="text" class="form-control" name="telepon" placeholder="Telepon" value="<?php echo $data['telp']; ?>"/>
	            </div>
	            <div class="form-group">
	              <label>Kontak</label>
	              <input type="text" class="form-control" name="kontak" placeholder="Kontak" value="<?php echo $data['kontak']; ?>"/>
	            </div> -->

	            <div class="form-group">
	              <label>Nama Depan</label>
	              <input type="text" class="form-control" name="nama" placeholder="Nama" value="<?php echo $data['nama_depan']; ?>" readonly />
	            </div>
	            <div class="form-group">
	              <label>Email</label>
	              <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $data['email']; ?>"/>
	            </div>
	            <div class="form-group">
	              	<label>Kelamin</label>
	              	<select  class="form-control" name="jk" >
					  	<option value="Laki - Laki">Laki - Laki</option>
					  	<option value="Perempuan">Perempuan</option>
					</select>
	            </div>
	            <div class="form-group">
	              <label>No Telepon</label>
	              <input type="text" class="form-control" name="hp" placeholder="hp" value="<?php echo $data['nomor_tlp']; ?>"/>
	            </div>
	            <div class="form-group">
	              <label>Alamat</label>
	              <input type="text" class="form-control" name="alamat" placeholder="Alamat" value="<?php echo $data['alamat']; ?>"/>
	            </div>
	            <!-- textarea -->

	            <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Simpan</button>
	            <button type="reset" class="btn btn-warning"> <i class="fa fa-backward"></i> Kembalikan Data</button>
	            <a href="index.php?page=data_user" class="btn btn-danger"> <i class="fa fa-times"></i>  Batal</a>
	          </form>
	        </div><!-- /.box-body -->
	      </div><!-- /.box -->
	    </div><!--/.col (right) -->
	</div>
</section>