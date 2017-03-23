<?php echo $this->session->flashdata('alert')?>
<form action="<?php echo site_url($action) ?>" method="post">
<div class="box box-default">
	<?php echo $owner; ?>
	<div class="box-body">
		<div class="form-group form-inline">
			<?php echo form_label($this->lang->line('name'),'name',array('class'=>'control-label'))?>
			<?php echo form_input(array('name'=>'name','class'=>'form-control input-sm','maxlength'=>'100','size'=>'50','autocomplete'=>'off','value'=>set_value('name',(isset($row->name)?$row->name:'')),'required'=>'required'))?>
			<small><?php echo form_error('name')?></small>
		</div>
		<div class="form-group form-inline">
			<?php echo form_label('Module','module',array('class'=>'control-label'))?>
			<?php echo $this->general->get_module((isset($row->module)?$row->module:array())) ?>
			<small><?php echo form_error('module')?></small>
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