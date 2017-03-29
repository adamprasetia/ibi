<?php echo $this->session->flashdata('alert')?>
<form action="<?php echo site_url($action) ?>" method="post">
<div class="box box-default">	
	<?php echo $owner; ?>	
	<div class="box-body">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group form-inline">
					<?php echo form_label('Tipe Surat','tipe',array('class'=>'control-label'))?>
					<?php echo form_dropdown('tipe',$this->general_model->dropdown('surat_tipe','Tipe Surat'),set_value('tipe',(isset($row->tipe)?$row->tipe:'')),'id="tipe" class="form-control input-sm"')?>
					<small><?php echo form_error('tipe')?></small>
				</div>						
				<div class="form-group form-inline">
					<?php echo form_label('Bulan','bulan',array('class'=>'control-label'))?>
					<?php echo form_dropdown('bulan',get_mm(),set_value('bulan',(isset($row->bulan)?$row->bulan:'')),'id="bulan" class="form-control input-sm"')?>
					<small><?php echo form_error('bulan')?></small>
				</div>			
				<div class="form-group form-inline">
					<?php echo form_label('Tahun','tahun',array('class'=>'control-label'))?>
					<?php echo form_input(array('name'=>'tahun','class'=>'form-control input-sm input-tahun','maxlength'=>'4','size'=>'4','autocomplete'=>'off','value'=>set_value('tahun',(isset($row->tahun)?$row->tahun:date('Y')))))?>
					<small><?php echo form_error('tahun')?></small>
				</div>
				<div class="form-group form-inline">
					<?php echo form_label('Nomor','nomor',array('class'=>'control-label'))?>
					<?php echo form_input(array('name'=>'nomor','class'=>'form-control input-sm input-nomor','maxlength'=>'30','size'=>'30','autocomplete'=>'off','value'=>set_value('nomor',(isset($row->nomor)?$row->nomor:''))))?>
					<small><?php echo form_error('nomor')?></small>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="box box-default">	
	<div class="box-body">
		<button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Are you sure')"><span class="glyphicon glyphicon-save"></span> Simpan</button>
		<a class="btn btn-danger btn-sm" href="<?php echo site_url($module) ?>"><span class="glyphicon glyphicon-repeat"></span> Batal</a>
	</div>
</div>
</form>