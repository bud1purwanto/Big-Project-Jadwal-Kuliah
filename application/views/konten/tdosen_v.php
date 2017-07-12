<div class="col-xs-6 col-lg-12">
    <h2>Data Dosen</h2>
	<p></p>
	<?php if ($status=="adm"): ?>
		<a href="<?php echo base_url()?>index.php/dosen/tdosen" class="btn btn-primary btn-sm">
		<i class="glyphicon glyphicon-plus"></i> Tambah</a>
	<?php endif ?>
	<?php echo $this->session->flashdata('hapus') ?>
	<p></p>
    <table class="table table-bordered">
		<tr class="active">
			<td>NO</td>
			<td>NPP</td>
			<td>NAMA DOSEN</td>
			<td>NO. HP/TELP</td>
			<?php if ($status=="adm"): ?>
				<td width="20%">ACTION</td>
			<?php endif ?>
		</tr>
		<?php $no=1;foreach($datadosen as $dosen){?>
		<tr>
			<td><?php echo $no++;?></td>
			<td><?php echo $dosen->npp;?></td>
			<td><?php echo $dosen->namadosen;?></td>
			<td><?php echo $dosen->nohp;?></td>
			<?php if ($status=="adm"): ?>
				<td>
					<a href="<?php echo base_url()?>index.php/dosen/editdosen/<?php echo $dosen->npp;?>"" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
					<a href="<?php echo base_url()?>index.php/dosen/hapusdosen/<?php echo $dosen->npp;?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
				</td>
			<?php endif ?>
		</tr>
		<?php }?>
	</table>
</div><!--/.col-xs-6.col-lg-4-->
