<?php echo $this->session->flashdata('alert')?>
<form action="<?php echo site_url($action) ?>" method="post">
<div class="box box-default">
	<?php echo $owner; ?>
	<div class="box-body">
		<div class="form-group form-inline">
			<?php echo form_label('Jenis','jenis',array('class'=>'control-label'))?>
			<?php echo form_dropdown('jenis',$this->general_model->dropdown('keuangan_jenis','Jenis'),set_value('jenis',(isset($row->jenis)?$row->jenis:'')),'id="jenis" class="form-control input-sm"')?>
			<small><?php echo form_error('jenis')?></small>
		</div>	
		<div class="form-group form-inline">
			<?php echo form_label('Wilayah','wilayah',array('class'=>'control-label'))?>
			<?php echo form_dropdown('wilayah',$this->general_model->dropdown('wilayah','Wilayah'),set_value('wilayah',(isset($row->wilayah)?$row->wilayah:'')),'id="wilayah" class="form-control input-sm"')?>
			<small><?php echo form_error('wilayah')?></small>
		</div>	
		<div class="form-group form-inline">
			<?php echo form_label('Harga','harga',array('class'=>'control-label'))?>
			<?php echo form_input(array('id'=>'harga','name'=>'harga','class'=>'form-control input-sm input-uang','maxlength'=>'20','autocomplete'=>'off','value'=>set_value('harga',(isset($row->harga)?$row->harga:''))))?>
			<small><?php echo form_error('harga')?></small>
		</div>		
	</div>
</div>
<div class="box box-default">	
	<div class="box-body">
		<button class="btn btn-success btn-sm" type="submit" onclick="return confirm('<?php echo $this->lang->line('confirm') ?>')"><span class="glyphicon glyphicon-save"></span> <?php echo $this->lang->line('save') ?></button>
		<a class="btn btn-danger btn-sm" href="<?php echo site_url($module.get_query_string()) ?>"><span class="glyphicon glyphicon-repeat"></span> <?php echo $this->lang->line('back') ?></a>
	</div>
</div>
</form>