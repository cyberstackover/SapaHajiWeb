<?php require_once('config/main.php');
$data_pengaduan = mysql_query("select * from pengaduan");
$data_teknisi=mysql_query("select * from admin");
$data_user=mysql_query("select * from members");
$data_promosi=mysql_query("select * from promosi");

$data_aduanbpjs = mysql_query("select * from aduanbpjs");
$data_danaspm = mysql_query("select * from danaspm");
$data_pendampingan = mysql_query("select * from pendampingan");
$data_pengumuman = mysql_query("select * from pengumuman");
 ?>
<!-- <div class="row">
	<div class="col-md-6">
	  Bar chart
	  <div class="box box-primary">
	    <div class="box-header">
	      <i class="fa fa-bar-chart-o"></i>
	      <h3 class="box-title">Grafik Batang</h3>
	    </div>
	    <div class="box-body">
	      <div id="bar-chart" style="height: 300px;"></div>
	    </div>
	  </div>
	</div>
	<div class="col-md-6">
		<div class="box box-primary">
            <div class="box-header">
              <i class="fa fa-bar-chart-o"></i>
              <h3 class="box-title">Grafik Donut</h3>
            </div>
            <div class="box-body">
              <div id="donut-chart" style="height: 300px;"></div>
            </div>
          </div>
        </div>
	</div> -->
</div>

<script src="plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="plugins/flot/jquery.flot.pie.min.js" type="text/javascript"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>

<script type="text/javascript">
	$(document).ready(function() {
		/*
         * BAR CHART
         * ---------
         */

        var bar_data = {
          data: [
          ["Data User", <?php echo mysql_num_rows($data_user); ?>], 
          ["Data Pengaduan", <?php echo mysql_num_rows($data_pengaduan); ?>], 
          ["Data Admin", <?php echo mysql_num_rows($data_teknisi); ?>], 
          ["Data Promosi", <?php echo mysql_num_rows($data_promosi); ?>],
          
          ["Data Aduan BPJS", <?php echo mysql_num_rows($data_aduanbpjs); ?>], 
          ["Data Dana SPM", <?php echo mysql_num_rows($data_danaspm); ?>], 
          ["Data Pendampingan", <?php echo mysql_num_rows($data_pendampingan); ?>], 
          ["Data Pengumuman", <?php echo mysql_num_rows($data_pengumuman); ?>],
          ],
          color: "#00A3CB"
        };
        $.plot("#bar-chart", [bar_data], {
          grid: {
            borderWidth: 1,
            borderColor: "#f3f3f3",
            tickColor: "#F39C12"
          },
          series: {
            bars: {
              show: true,
              barWidth: 0.5,
              align: "center"
            }
          },
          xaxis: {
            mode: "categories",
            tickLength: 0
          }
        });
        /* END BAR CHART */

        /*
         * DONUT CHART
         * -----------
         */

        var donutData = [
          {label: "Data User", data: <?php echo mysql_num_rows($data_user); ?>, color: "#00C0EF"},
          {label: "Data Pengaduan", data: <?php echo mysql_num_rows($data_pengaduan); ?>, color: "#00A65A"},
          {label: "Data Admin", data: <?php echo mysql_num_rows($data_teknisi); ?>, color: "#F39C12"},
          {label: "Data Promosi", data: <?php echo mysql_num_rows($data_promosi); ?>, color: "#DD4B39"},
          
          {label: "Data Aduan BPJS", data: <?php echo mysql_num_rows($data_aduanbpjs); ?>, color: "#00C0EF"},
          {label: "Data Dana SPM", data: <?php echo mysql_num_rows($data_danaspm); ?>, color: "#00A65A"},
          {label: "Data Pendampingan", data: <?php echo mysql_num_rows($data_pendampingan); ?>, color: "#F39C12"},
          {label: "Data Pengumuman", data: <?php echo mysql_num_rows($data_pengumuman); ?>, color: "#DD4B39"}
        ];
        $.plot("#donut-chart", donutData, {
          series: {
            pie: {
              show: true,
              radius: 1,
              innerRadius: 0.5,
              label: {
                show: true,
                radius: 2 / 3,
                formatter: labelFormatter,
                threshold: 0.1
              }

            }
          },
          legend: {
            show: false
          }
        });
        /*
         * END DONUT CHART
         */
         function labelFormatter(label, series) {
        	return "<div style='font-size:11px; text-align:center; padding:2px; color: #fff; font-weight: 600;'>"
                + label
                + "<br/>"
                + Math.round(series.percent) + "%</div>";
      }
	});	
</script>