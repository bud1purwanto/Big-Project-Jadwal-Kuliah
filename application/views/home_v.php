<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
	
    <title>Jadwal Perkuliahan</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url()?>asset/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url()?>asset/css/offcanvas.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-fixed-top navbar">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" style="color: black; font-size: 23px; width: 350px" href="<?php echo site_url('beranda'); ?>">JURUSAN TI POLINEMA</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a style="font-size: 20px; float: right; margin-left: 660px" href="<?php echo base_url();?>index.php/jadwal/lihat_jadwal" target="_blank" class="btn btn-default btn-sm">Lihat Jadwal</a></li>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
			<div class="list-group">
				<a href="#" class="list-group-item"><b><i class="glyphicon glyphicon-dashboard"></i> Selamat Datang </b></a>
				
				<?php if ($status=="adm"): ?>
					<a href="<?php echo base_url()?>index.php/user/adm" class="list-group-item">
					<i class="glyphicon glyphicon-map-marker"></i> User</a>
				<?php endif ?>

				<?php if ($status=="adm" || $status=="dsn"): ?>
					<a href="<?php echo base_url()?>index.php/dosen/dosen" class="list-group-item"> 
					<i class="glyphicon glyphicon-user"></i> Dosen Pengajar</a>
					<a href="<?php echo base_url()?>index.php/matakuliah/matakuliah" class="list-group-item">
					<i class="glyphicon glyphicon-map-marker"></i> Matakuliah</a>
					<a href="<?php echo base_url()?>index.php/ruangan/ruangan" class="list-group-item">
					<i class="glyphicon glyphicon-home"></i> Ruangan</a>
					<a href="<?php echo base_url()?>index.php/kelas/kelas" class="list-group-item"> 
					<i class="glyphicon glyphicon-exclamation-sign"></i> Kelas</a>
				<?php endif ?>

				<a href="<?php echo base_url()?>index.php/jadwal/jadwal_makul" class="list-group-item">
				<i class="glyphicon glyphicon-tasks"></i> Jadwal Matakuliah</a>
				<a href="<?php echo base_url()?>index.php/login/logout" class="list-group-item">
				<i class="glyphicon glyphicon-log-out"></i> Logout</a>

			</div>
			<div class="panel panel-default">
			  <div class="panel-heading">
				<h3 class="panel-title">JAM</h3>
			  </div>
			  <div class="panel-body">
				<!--Conten-->
				<center>
				<script>
					var bln=['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
					var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
					var tgl= new Date();
					var hari=tgl.getDate();
					var bulan=tgl.getMonth();
					var hariini=tgl.getDay();
					hariini=myDays[hariini];
					var yy=tgl.getYear();
					var tahun=(yy<1000)?yy+1900:yy;
					document.write(hariini+', '+hari+" "+bln[bulan]+" "+tahun)
				</script>
				</center>
				<h3><center><div id="clock"></div></center></h3>
				<script>
					function showTime() {
						var a_p = "";
						var today = new Date();
						var curr_hour = today.getHours();
						var curr_minute = today.getMinutes();
						var curr_second = today.getSeconds();
						if (curr_hour < 12) {
							a_p = "AM";
						} else {
							a_p = "PM";
						}
						if (curr_hour == 0) {
							curr_hour = 12;
						}
						if (curr_hour > 12) {
							curr_hour = curr_hour - 12;
						}
						curr_hour = checkTime(curr_hour);
						curr_minute = checkTime(curr_minute);
						curr_second = checkTime(curr_second);
					 document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
						}

					function checkTime(i) {
						if (i < 10) {
							i = "0" + i;
						}
						return i;
					}
					setInterval(showTime, 500);
				</script>
			  </div>
			</div>
        </div><!--/.sidebar-offcanvas-->
        <div class="col-xs-12 col-sm-9">
          
          <div class="row">
            <?php $this->load->view($konten)?>
          </div><!--/row-->
        </div><!--/.col-xs-12.col-sm-9-->

        
      </div><!--/row-->
	  

    </div><!--/.container-->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url()?>asset/js/datatables.min.js"></script>
    <script src="<?php echo base_url()?>asset/js/jquery.js"></script>
    <script src="<?php echo base_url()?>asset/js/bootstrap.min.js"></script>
	<script type="text/javascript">
            $(document).ready(function(){
            $('#example').DataTable();
            });
	</script>
  </body>
</html>