<h2>Data User <?php echo $name ?></h2> 
<a href="<?php echo base_url()?>index.php/user/adduser" class="btn btn-primary btn-sm">
<i class="glyphicon glyphicon-plus"></i> Tambah</a>
<hr>
<select class="form-control" name="hari" onChange="window.location.href=this.value">
	<option disabled selected style="display: none;">Pilih Jenis User</option>
	<option value="<?php echo base_url();?>index.php/user/adm/">Administrator</option>
	<option value="<?php echo base_url();?>index.php/user/dsn/">Dosen</option>
	<option value="<?php echo base_url();?>index.php/user/mhs/">Mahasiswa</option>
</select>
	<p></p>
	<table class="table table-bordered">
		<tr class="active">			
			<td width="20%"><b>ID User</b></td>
			<td><b><?php echo $id ?></b></td>
			<td width="10%"><b>Action</b></td>
		</tr>
	<?php
		foreach($datauser as $key){
	?>
		<tr>
			<td><?php echo $key->id_user ?></td>
			<td><?php echo $key->no_identitas?></td>
			<td>
				<a href="<?php echo base_url()?>index.php/user/hapususer/<?php echo $key->id_user;?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
			</td>
		</tr>
	<?php 
		}
	?>
	</table>