<?php require_once('config/main.php');
$data_post = mysql_query("select * from postingan");
$data_user=mysql_query("select * from user_data");

 ?>
<div class="row">
    <div class="col-lg-6 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?php echo mysql_num_rows($data_user); ?></h3>
          <p>Data User</p>
        </div>
        <div class="icon">
          <i class="fa fa-user"></i>
        </div>
        <a href="./?page=data_user" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->
    <div class="col-lg-6 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?php echo mysql_num_rows($data_post); ?></h3>
          <p>Data Post</p>
        </div>
        <div class="icon">
          <i class="fa fa-comment"></i>
        </div>
        <a href="./?page=data_pengaduan" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->
  </div><!-- /.row -->
  
  
  <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>