<div class="col-xs-6 col-lg-12">
    <h2>Jadwal Matakuliah</h2>
	<p></p>
	<?php if ($status=="adm"): ?>
		<a href="<?php echo base_url();?>index.php/jadwal/tjadwal" class="btn btn-primary btn-sm">
		<i class="glyphicon glyphicon-plus"></i> Tambah</a>
	<?php endif ?>
	<p></p>
	<?php if ($this->session->flashdata('fail')){ ?>
		<div class="alert alert-danger"><?php echo $this->session->flashdata('fail'); ?></div>
	<?php } else if($this->session->flashdata('sukses')){ ?>
		<div class="alert alert-success"><?php echo $this->session->flashdata('sukses'); ?></div>
	<?php }?>
    <table class="table table-bordered" id="example">
		<tr>
			<td>NO</td>
			<td>HARI</td>
			<td>JAM</td>
			<td>MATAKULIAH</td>
			<td>RUANGAN</td>
			<td>KELAS</td>
			<td>DOSEN PENGAJAR</td>
			<?php if ($status=="adm"): ?>
				<td width="10%">ACTION</td>
			<?php endif ?>
		</tr>
		<?php $no=1; foreach($datajadwal as $jadwal){?>
		<tr>
			<td><?php echo $no++;?></td>
			<td><?php echo $jadwal->hari;?></td>
			<td><?php echo $jadwal->jam_mulai;?> - <?php echo $jadwal->jam_akhir;?></td>
			<td><?php echo $jadwal->makul;?></td>
			<td><?php echo $jadwal->ruangan;?></td>
			<td><?php echo $jadwal->kelas;?></td>
			<td><?php echo $jadwal->namadosen;?></td>
			<?php if ($status=="adm"): ?>
				<td>
					<!-- <a href="#" class="btn btn-success btn-sm">
					<i class="glyphicon glyphicon-pencil"></i> Edit</a> -->
					<a href="<?php echo base_url()?>index.php/jadwal/hapusjadwal/<?php echo $jadwal->idjadwal;?>" onclick="return confirm('Hapus data ini?')" class="btn btn-danger btn-sm">
					<i class="glyphicon glyphicon-trash"></i> Hapus</a>
				</td>
			<?php endif ?>
		</tr>
		<?php }?>
	</table>

</div><!--/.col-xs-6.col-lg-4-->
