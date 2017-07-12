<h2>Edit Ruangan</h2>
<hr>
<div class="col-sm-8">
	<form class="form-horizontal" method="post">
	<?php foreach ($ruanganbyid as $key) { ?>
	  <div class="form-group">
		<label for="inputEmail3" class="col-sm-3 control-label">Ruangan</label>
		<div class="col-sm-6">
		  <input class="form-control" name="ruangan" type="text" value="<?php echo $key->ruangan; ?>">
		  <i><?php echo form_error('npp');?></i>
		</div>
	  </div>
	  <div class="form-group">
		<div class="col-sm-offset-3 col-sm-10">
		  <button type="submit" class="btn btn-default">Edit</button>
		</div>
	  </div>
	  <?php } ?>
	</form>
</div>