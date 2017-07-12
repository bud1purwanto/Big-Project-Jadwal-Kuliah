<div class="col-xs-6 col-lg-12">
    <h2>Data Matakuliah</h2>
	<p></p>
	<?php if ($status=="adm"): ?>
		<a href="<?php echo base_url();?>index.php/matakuliah/tmatakuliah" class="btn btn-primary btn-sm">
		<i class="glyphicon glyphicon-plus"></i> Tambah</a>
	<?php endif ?>
	<?php echo $this->session->flashdata('hapus') ?>
	<p></p>
    <table class="table table-bordered">
		<tr class="active">
			<td>NO</td>
			<td>KODE MATAKULIAH</td>
			<td>MATAKULIAH</td>
			<td>SEMESTER</td>
			<td>PRODI</td>
			<?php if ($status=="adm"): ?>
				<td width="20%">ACTION</td>
			<?php endif ?>
		</tr>
		<?php $no=1;foreach($datamakul as $makul){?>
		<tr>
			<td><?php echo $no++;?></td>
			<td><?php echo $makul->kodemakul;?></td>
			<td><?php echo $makul->makul;?></td>
			<td><?php echo $makul->semester;?></td>
			<td><?php echo $makul->prodi;?></td>
			<?php if ($status=="adm"): ?>
				<td>
					<a href="<?php echo base_url()?>index.php/matakuliah/editmakul/<?php echo $makul->kodemakul;?>" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
					<a href="<?php echo base_url()?>index.php/matakuliah/hapusmakul/<?php echo $makul->kodemakul;?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')"><i class="glyphicon glyphicon-trash"></i>Hapus</a>
				</td>
			<?php endif ?>
		</tr>
		<?php }?>
	</table>
</div><!--/.col-xs-6.col-lg-4-->