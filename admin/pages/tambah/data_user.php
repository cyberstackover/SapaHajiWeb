<section>
	<div class="row">
		<div class="col-md-12">
	      <!-- general form elements disabled -->
	      <div class="box box-info">
	        <div class="box-header">
	          <h3 class="box-title">Tambah User</h3>
	        </div><!-- /.box-header -->
	        <div class="box-body">
	          <form role="form" method="post" action="simpan.php" enctype="multipart/form-data">
	            <!-- text input -->
	            <input type="hidden" name="type" value="data_user">
	            <input type="hidden" name="cmd" value="tambah">
	            <div class="form-group">
	              <label>Nama</label>
	              <input type="text" class="form-control" name="nama" placeholder="Nama" value=""/>
	            </div>
	            <div class="form-group">
	              <label>Email</label>
	              <input type="text" class="form-control" name="email" placeholder="Email" value=""/>
	            </div>
	            <div class="form-group">
	              <label>Jenis Kelamin</label>
	              	<select  class="form-control" name="jk" >
					  	<option value="Laki - Laki">Laki - Laki</option>
					  	<option value="Perempuan">Perempuan</option>
					</select>
	            </div>
	            <div class="form-group">
	              <label>No. Telepon</label>
	              <input type="number" class="form-control" name="hp" placeholder="HP" value=""/>
	            </div>
	            <div class="form-group">
	              <label>Alamat</label>
	              <input type="text" class="form-control" name="alamat" placeholder="Alamat" value=""/>
	            </div>
	            <!-- textarea -->
	            <div class="form-group">
	              <label>Password</label>
	              <input type="text" class="form-control" name="password" placeholder="Password" value=""/>
	            </div>
	            <!-- <div class="form-group">
	              <label>Foto</label>
	              <input type="file" class="form-control" name="ImageFile" placeholder="ImageFile" value=""/>
	            </div> -->

	            <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Simpan</button>
	            <button type="reset" class="btn btn-warning"> <i class="fa fa-trash"></i> Reset</button>
	            <a href="index.php?page=data_user" class="btn btn-danger"> <i class="fa fa-times"></i> Batal</a>
	          </form>
	        </div><!-- /.box-body -->
	      </div><!-- /.box -->
	    </div><!--/.col (right) -->
	</div>
</section>