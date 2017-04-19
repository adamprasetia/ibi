<?php echo $this->session->flashdata('alert')?>
<form action="<?php echo site_url($action) ?>" method="post">
<div class="box box-default">	
	<?php echo $owner; ?>	
	<div class="box-body">
		<div class="form-group form-inline">
			<?php echo form_label('Tipe Surat','tipe',array('class'=>'control-label'))?>
			<?php echo form_dropdown('tipe',$this->general_model->dropdown('surat_tipe','Tipe Surat'),set_value('tipe',(isset($row->tipe)?$row->tipe:'')),'id="tipe" class="form-control input-sm"')?>
			<small><?php echo form_error('tipe')?></small>
		</div>						
		<div class="form-group form-inline">
			<?php echo form_label('Periode Tanggal','date_from',array('class'=>'control-label'))?>
			<?php echo form_input(array('name'=>'date_from','class'=>'form-control input-sm input-tanggal','maxlength'=>'10','size'=>'10','autocomplete'=>'off','value'=>set_value('date_from',(isset($row->date_from)?$row->date_from:date('d/m/Y')))))?>
			<?php echo form_input(array('name'=>'date_to','class'=>'form-control input-sm input-tanggal','maxlength'=>'10','size'=>'10','autocomplete'=>'off','value'=>set_value('date_to',(isset($row->date_to)?$row->date_to:date('d/m/Y')))))?>
			<small><?php echo form_error('date_from')?></small>
			<small><?php echo form_error('date_to')?></small>
		</div>
		<div class="form-group form-inline">
			<?php echo form_label('Nomor','nomor',array('class'=>'control-label'))?>
			<?php echo form_input(array('name'=>'nomor','class'=>'form-control input-sm input-nomor','maxlength'=>'30','size'=>'30','autocomplete'=>'off','value'=>set_value('nomor',(isset($row->nomor)?$row->nomor:''))))?>
			<small><?php echo form_error('nomor')?></small>
		</div>
	</div>
</div>
<div class="box box-default">	
	<div class="box-body">
		<button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Are you sure')"><span class="glyphicon glyphicon-save"></span> <?php echo $this->lang->line('save') ?></button>
		<a class="btn btn-danger btn-sm" href="<?php echo site_url($module) ?>"><span class="glyphicon glyphicon-repeat"></span> <?php echo $this->lang->line('back') ?></a>
	</div>
</div>
</form>