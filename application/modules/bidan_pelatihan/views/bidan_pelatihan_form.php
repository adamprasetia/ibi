<?php $this->load->view('bidan/tab') ?>
<?php echo $this->session->flashdata('alert')?>
<form action="<?php echo site_url($action) ?>" method="post">
<div class="box box-default">
	<div class="box-body">
		<?php $this->load->view('bidan/header') ?>
	</div>
</div>
<div class="box box-default">
	<?php echo $owner; ?>
	<div class="box-body">
		<div class="form-group form-inline">
			<?php echo form_label('Nama Pelatihan','pelatihan',array('class'=>'control-label'))?>
			<?php echo form_dropdown('pelatihan',$this->general_model->dropdown('pelatihan','Nama Pelatihan'),set_value('pelatihan',(isset($row->pelatihan)?$row->pelatihan:'')),'id="pelatihan" class="form-control input-sm"')?>
			<small><?php echo form_error('pelatihan')?></small>
		</div>
		<div class="form-group form-inline">
			<?php echo form_label('Tanggal Pelatihan','tanggal',array('class'=>'control-label'))?>
			<?php echo form_input(array('name'=>'tanggal','class'=>'form-control input-sm input-tanggal','maxlength'=>'10','autocomplete'=>'off','value'=>set_value('tanggal',(isset($row->tanggal)?$row->tanggal:''))))?>
			<small><?php echo form_error('tanggal')?></small>
		</div>
		<div class="form-group form-inline">
			<?php echo form_label('Alamat','alamat',array('class'=>'control-label'))?>
			<?php echo form_textarea(array('name'=>'alamat','class'=>'form-control input-sm','cols'=>'70','rows'=>'3','maxlength'=>'200','autocomplete'=>'off','value'=>set_value('alamat',(isset($row->alamat)?$row->alamat:''))))?>
			<small><?php echo form_error('alamat')?></small>
		</div>		
		<div class="form-group form-inline">
			<?php echo form_label('Nomor Sertifikat','nomor',array('class'=>'control-label'))?>
			<?php echo form_input(array('name'=>'nomor','class'=>'form-control input-sm','maxlength'=>'30','autocomplete'=>'off','value'=>set_value('nomor',(isset($row->nomor)?$row->nomor:''))))?>
			<small><?php echo form_error('nomor')?></small>
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