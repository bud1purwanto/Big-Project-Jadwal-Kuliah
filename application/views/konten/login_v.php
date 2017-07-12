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
          <a class="navbar-brand" style="color: black; font-size: 23px; width: 350px" href="<?php echo base_url(); ?>">JURUSAN TI POLINEMA</a>
        </div>
      </div><!-- /.container -->
    </nav><!-- /.navbar -->

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
			
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
			<?php if (validation_errors()) {
                           	?><div class="alert alert-danger">
                            <strong><?php echo validation_errors(); ?></div></strong><?php
                      }else if ($this->session->flashdata('login_lagi')) {
                           	?><div class="alert alert-danger">
                            <strong><?php echo $this->session->flashdata('login_lagi'); ?></strong></div><?php
                    } ?>
        </div><!--/.sidebar-offcanvas-->
        <div class="col-xs-12 col-sm-9">
          
          <div class="row">
            <div class="col-sm-8">
				<?php echo form_open_multipart('login/cekLogin'); ?>
				  <div class="form-group">
					<div class="col-sm-6">
					  <input type="number" class="form-control" name="no_identitas" placeholder="NIP/NIM" value="<?php echo set_value('no_identitas') ?>">
					</div>
				  </div>
				  <div class="form-group">
					<div class="col-sm-6">
					  <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo set_value('password') ?>">
					</div>
				  </div>
				  <br><br>
				  <div class="form-group">
					<div class="col-sm col-sm-10">
					  <button type="submit" class="btn btn-lg btn-default">Login</button>
					</div>
				  </div>
				<?php echo form_close(); ?>
			</div>
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