<?php echo $this->session->flashdata('alert')?>
<form action="<?php echo site_url($module) ?>" method="post">
<div class="box box-default">
	<div class="box-body">
		<div class="form-group form-inline">
			<?php echo form_label('Kata Kunci Lama','old_pass',array('class'=>'control-label'))?>
			<?php echo form_password(array('name'=>'old_pass','class'=>'form-control input-sm','maxlength'=>'50','autocomplete'=>'off','autofocus'=>'autofocus'))?>
			<small><?php echo form_error('old_pass')?></small>
		</div>
		<hr>
		<div class="form-group form-inline">
			<?php echo form_label('Kata Kunci Baru','new_pass',array('class'=>'control-label'))?>
			<?php echo form_password(array('name'=>'new_pass','class'=>'form-control input-sm','maxlength'=>'50','autocomplete'=>'off'))?>
			<small><?php echo form_error('new_pass')?></small>
		</div>
		<div class="form-group form-inline">
			<?php echo form_label('Kata Kunci Baru','con_pass',array('class'=>'control-label'))?>
			<?php echo form_password(array('name'=>'con_pass','class'=>'form-control input-sm','maxlength'=>'50','autocomplete'=>'off'))?>
			<small><?php echo form_error('con_pass')?></small>
		</div>
	</div>
	<div class="box-footer">
		<button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Are you sure')"><span class="glyphicon glyphicon-edit"></span> Rubah</button>
		<a href="<?php echo site_url('home') ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-repeat"></span> Kembali</a>
	</div>
</div>
</form>