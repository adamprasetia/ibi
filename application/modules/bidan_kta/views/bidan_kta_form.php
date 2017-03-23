<?php $this->load->view('bidan/tab') ?>
<?php echo $this->session->flashdata('alert')?>
<form action="<?php echo site_url($action) ?>" method="post">
<div class="box box-default">
	<div class="box-body">
		<?php $this->load->view('bidan/header') ?>
	</div>
</div>
<div class="box box-default">
	<?php echo $owner?>
	<div class="box-body">
		<div class="form-group form-inline">
			<?php echo form_label('Status','status',array('class'=>'control-label'))?>
			<?php echo form_dropdown('status',$this->general_model->dropdown('bidan_kta_status','Status'),set_value('status',(isset($row->status)?$row->status:'')),'id="status" class="form-control input-sm"')?>
			<small><?php echo form_error('status')?></small>
		</div>
		<hr>						
		<div class="form-group form-inline">
			<?php echo form_label('Tanggal Permohonan','date',array('class'=>'control-label'))?>
			<?php echo form_input(array('name'=>'date','class'=>'form-control input-sm input-tanggal','maxlength'=>'10','autocomplete'=>'off','value'=>set_value('date',(isset($row->date)?$row->date:''))))?>
			<small><?php echo form_error('date')?></small>
		</div>
		<div class="form-group form-inline">
			<?php echo form_label('Jenis Pengajuan','type',array('class'=>'control-label'))?>
			<?php echo form_dropdown('type',$this->general_model->dropdown('bidan_kta_type','Jenis Pengajuan'),set_value('type',(isset($row->type)?$row->type:'')),'id="type" class="form-control input-sm"')?>
			<small><?php echo form_error('type')?></small>
		</div>
		<div class="form-group form-inline">
			<?php echo form_label('No ID KTA','nomor',array('class'=>'control-label'))?>
			<?php echo form_input(array('name'=>'nomor','class'=>'form-control input-sm','maxlength'=>'20','size'=>'30','autocomplete'=>'off','value'=>set_value('nomor',(isset($row->nomor)?$row->nomor:''))))?>
			<small><?php echo form_error('nomor')?></small>
		</div>
		<div class="form-group form-inline">
			<?php echo form_label('Masa Berlaku','masa_berlaku',array('class'=>'control-label'))?>
			<?php echo form_input(array('name'=>'masa_berlaku','class'=>'form-control input-sm input-tanggal','maxlength'=>'10','autocomplete'=>'off','value'=>set_value('masa_berlaku',(isset($row->masa_berlaku)?$row->masa_berlaku:''))))?>
			<small><?php echo form_error('masa_berlaku')?></small>
		</div>
		<div class="form-group">
			<?php echo form_label('Persyaratan','attachment',array('class'=>'control-label'))?>								
			<?php foreach ($attachment as $att): ?>
				<div class="checkbox">
					<label><input type="checkbox" name="attachment[]" value="<?php echo $att->id ?>" <?php echo (isset($row->attachment) && in_array($att->id, $row->attachment)?'checked':''); ?>><?php echo $att->name ?></label>
				</div>									
			<?php endforeach ?>	
		</div>											
	</div>
</div>
<div class="box box-default">
	<div class="box-body">
		<button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Apa anda yakin ?')"><span class="glyphicon glyphicon-save"></span> Simpan</button>
		<a href="<?php echo site_url($index.'/index/'.$bidan_id.get_query_string()) ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-repeat"></span> Kembali</a>
	</div>
</div>
</form>