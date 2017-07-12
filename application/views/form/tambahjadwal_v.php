<h2>Tambah Jadwal Perkuliahan</h2>
<hr>

<div class="col-sm-8">
<?php if ($this->session->flashdata('fail')){ ?>
		<div class="alert alert-danger"><?php echo $this->session->flashdata('fail'); ?></div>
	<?php } else if($this->session->flashdata('sukses')){ ?>
		<div class="alert alert-success"><?php echo $this->session->flashdata('sukses'); ?></div>
	<?php }?>
	<form class="form-horizontal" method="post">
	  <div class="form-group">
		<label for="inputEmail3" class="col-sm-3 control-label">Hari</label>
		<div class="col-sm-6">
		  <select class="form-control" name="hari">
			<option>--Hari--</option>
			<?php
				$datahari=array(
					'Senin',
					'Selasa',
					'Rabu',
					'Kamis',
					'Jumat',
					'Sabtu'
				);
				
				foreach($datahari as $hari){
			?>
			<option value="<?php echo $hari;?>"><?php echo $hari;?></option>
			<?php }?>
		  </select>
		  <i><?php echo form_error('hari');?></i>
		</div>
	  </div>
	  <div class="form-group">
		<label for="inputPassword3" class="col-sm-3 control-label">Jam</label>
		<div class="col-sm-2">
		  <input type="text" class="form-control" name="jam_masuk" id="inputPassword3" placeholder="07:00" value="<?php echo set_value('jam_masuk');?>">
		  <i><?php echo form_error('jam_masuk');?></i>
		</div>
		<div class="col-sm-2">
		  <input type="text" class="form-control" name="jam_selesai" id="inputPassword3" placeholder="09:00" value="<?php echo set_value('jam_selesai');?>">
		  <i><?php echo form_error('jam_selesai');?></i>
		</div>
	  </div>
	  <div class="form-group">
		<label for="inputPassword3" class="col-sm-3 control-label">Matakuliah</label>
		<div class="col-sm-5">
		  <select class="form-control" name="kodemakul">
			<option disabled selected style="display:none;">--Matakuliah--</option>
			<?php foreach($datamakul as $makul){?>
			<option value="<?php echo $makul->kodemakul;?>"><?php echo $makul->makul;?></option>
			<?php }?>
		  </select>
		  <i><?php echo form_error('kodemakul');?></i>
		</div>
	  </div>
	  <div class="form-group">
		<label for="inputPassword3" class="col-sm-3 control-label">Ruangan</label>
		<div class="col-sm-5">
		  <select class="form-control" name="ruangan">
			<option disabled selected style="display:none;">--Ruangan--</option>
			<?php foreach($dataruangan as $ruangan){?>
			<option value="<?php echo $ruangan->idruangan;?>"><?php echo $ruangan->ruangan;?></option>
			<?php }?>
		  </select>
		  <i><?php echo form_error('ruangan');?></i>
		</div>
	  </div>
	  <div class="form-group">
		<label for="inputPassword3" class="col-sm-3 control-label">Kelas</label>
		<div class="col-sm-5">
		  <select class="form-control" name="kelas">
			<option disabled selected style="display:none;">--Kelas--</option>
			<?php foreach($datakelas as $kelas){?>
			<option value="<?php echo $kelas->idkelas;?>"><?php echo $kelas->kelas;?></option>
			<?php }?>
		  </select>
		  <i><?php echo form_error('kelas');?></i>
		</div>
	  </div>
	  <div class="form-group">
		<label for="inputPassword3" class="col-sm-3 control-label">Dosen Pengajar</label>
		<div class="col-sm-5">
		  <select class="form-control" name="dosen">
			<option disabled selected style="display:none;">--Dosen Pengajar--</option>
			<?php foreach($datadosen as $dosen){?>
			<option value="<?php echo $dosen->npp;?>"><?php echo $dosen->namadosen;?></option>
			<?php }?>
		  </select>
		  <i><?php echo form_error('dosen');?></i>
		</div>
	  </div>
	  <div class="form-group">
		<div class="col-sm-offset-3 col-sm-10">
		  <button type="submit" class="btn btn-default">Simpan</button>
		</div>
	  </div>
	</form>
</div>