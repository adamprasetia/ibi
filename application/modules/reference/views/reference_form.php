<?php echo $this->session->flashdata('alert')?>
<form action="<?php echo $action; ?>" method="post" class="form-inline">
<div class="box box-default">
	<?php echo $owner; ?>
	<div class="box-body">
		<div class="form-group form-inline">
			<?php echo form_label('Nama','name',array('class'=>'control-label'))?>
			<?php echo form_input(array('name'=>'name','class'=>'form-control input-sm','maxlength'=>'100','size'=>'50','autocomplete'=>'off','value'=>set_value('name',(isset($row->name)?$row->name:'')),'required'=>'required'))?>
			<small><?php echo form_error('name')?></small>
		</div>
	</div>
</div>
<div class="box box-default">	
	<div class="box-body">
		<button class="btn btn-success btn-sm" type="submit" onclick="return confirm('<?php echo $this->lang->line('confirm') ?>')"><span class="glyphicon glyphicon-save"></span> <?php echo $this->lang->line('save') ?></button>
		<a href="<?php echo site_url($url.get_query_string()) ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-repeat"></span> <?php echo $this->lang->line('back') ?></a>
	</div>
</div>
</form>