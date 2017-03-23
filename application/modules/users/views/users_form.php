<?php echo $this->session->flashdata('alert')?>
<form action="<?php echo site_url($action) ?>" method="post">
<div class="box box-default">
	<?php echo $owner; ?>
	<div class="box-body">
		<div class="form-group form-inline">
			<?php echo form_label($this->lang->line('fullname'),'name',array('class'=>'control-label'))?>
			<?php echo form_input(array('name'=>'name','class'=>'form-control input-sm','maxlength'=>'50','size'=>'60','autocomplete'=>'off','value'=>set_value('name',(isset($row->name)?$row->name:'')),'autofocus'=>'autofocus'))?>
			<small><?php echo form_error('name')?></small>
		</div>
		<div class="form-group form-inline">
			<?php echo form_label($this->lang->line('username'),'username',array('class'=>'control-label'))?>
			<?php echo form_input(array('name'=>'username','class'=>'form-control input-sm','maxlength'=>'50','size'=>'60','autocomplete'=>'off','value'=>set_value('username',(isset($row->username)?$row->username:''))))?>
			<small><?php echo form_error('username')?></small>
		</div>
		<hr>
		<div class="form-group form-inline">
			<?php echo form_label($this->lang->line('password'),'password',array('class'=>'control-label'))?>
			<?php echo form_password(array('name'=>'password','class'=>'form-control input-sm','maxlength'=>'50','size'=>'60','autocomplete'=>'off','value'=>set_value('password','')))?>
			<small><?php echo form_error('password')?></small>
		</div>
		<div class="form-group form-inline">
			<?php echo form_label($this->lang->line('confirm_password'),'password2',array('class'=>'control-label'))?>
			<?php echo form_password(array('name'=>'password2','class'=>'form-control input-sm','maxlength'=>'50','size'=>'60','autocomplete'=>'off','value'=>set_value('password2','')))?>
			<small><?php echo form_error('password2')?></small>
		</div>
		<hr>
		<div class="form-group form-inline">
			<?php echo form_label('Level','level',array('class'=>'control-label'))?>
			<?php echo form_dropdown('level',$this->general_model->dropdown('users_level','Level'),set_value('level',(isset($row->level)?$row->level:'')),'class="form-control input-sm"')?>
			<small><?php echo form_error('level')?></small>
		</div>
		<div class="form-group form-inline">
			<?php echo form_label('Status','status',array('class'=>'control-label'))?>
			<?php echo form_dropdown('status',$this->general_model->dropdown('users_status','Status'),set_value('status',(isset($row->status)?$row->status:'')),'class="form-control input-sm"')?>
			<small><?php echo form_error('status')?></small>
		</div>
	</div>
</div>
<div class="box box-default">	
	<div class="box-body">
		<button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Are you sure')"><span class="glyphicon glyphicon-save"></span> Simpan</button>
		<a class="btn btn-danger btn-sm" href="<?php echo site_url($module.get_query_string()) ?>"><span class="glyphicon glyphicon-repeat"></span> Batal</a>
	</div>
</div>
</form>