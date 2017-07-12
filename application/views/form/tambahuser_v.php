<h2>Tambah Data User</h2>
<hr>
<div class="col-sm-8">
	<form class="form-horizontal" method="post">
	  <div class="form-group">
		<label for="inputEmail3" class="col-sm-3 control-label">Nomor Identitas</label>
		<div class="col-sm-6">
		  <input type="text" class="form-control" name="no_identitas" value="<?php echo set_value('no_identitas');?>">
		  <i><?php echo form_error('no_identitas');?></i>
		</div>
	  </div>
	  <div class="form-group">
		<label for="inputPassword3" class="col-sm-3 control-label">Password</label>
		<div class="col-sm-6">
		  <input type="Password" class="form-control" name="password" value="<?php echo set_value('password');?>">
		  <i><?php echo form_error('password');?></i>
		</div>
	  </div>
	  <div class="form-group">
		<label for="inputPassword3" class="col-sm-3 control-label">Status</label>
		<div class="col-sm-6">
		  <select name="status" class="form-control">
		  	<option disabled selected style="display: none;">Pilih Status</option>
		  	<option value="adm">Administrator</option>
		  	<option value="dsn">Dosen</option>
		  	<option value="mhs">Mahasiswa</option>
		  </select>
		  <i><?php echo form_error('status');?></i>
		</div>
	  </div>
	  <div class="form-group">
		<div class="col-sm-offset-3 col-sm-10">
		  <button type="submit" class="btn btn-default">Simpan</button>
		</div>
	  </div>
	</form>
</div>