<section class="content-header">
	<h1>
		<?php echo $title ?>
		<small><?php echo $subtitle ?></small>
	</h1>
	<ol class="breadcrumb">
		<li><?php echo anchor('home','<span class="glyphicon glyphicon-home"></span> '.$this->lang->line('home'))?></li>
	    <li><?php echo anchor($breadcrumb,$this->lang->line('list'))?></li>
	    <li class="active"><?php echo $title?></li>
	</ol>
</section>
<section class="content">
	<?php $this->load->view('bidan/tab') ?>
	<?php echo $this->session->flashdata('alert')?>
	<?php echo form_open($action)?>
	<div class="box box-default">
		<div class="box-header owner">
			<?php echo $owner?>
		</div>
		<div class="box-body">
			<div class="panel panel-default">
				<div class="panel-heading">
					<?php $this->load->view('bidan/header') ?>
				</div>
				<div class="panel-body">
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><?php echo $add_btn ?></li>
						<li role="presentation"><?php echo $list_btn ?></li>
					</ul>
					<div class="panel panel-default">
						<div class="panel-heading">
							Detail
						</div>
						<div class="panel-body">
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
							<div class="form-group">
								<?php echo form_label('Persyaratan','attachment',array('class'=>'control-label'))?>								
								<?php foreach ($attachment as $att): ?>
									<div class="checkbox">
										<label><input type="checkbox" name="attachment[]" value="<?php echo $att->id ?>" <?php echo (isset($row->attachment) && in_array($att->id, $row->attachment)?'checked':''); ?>><?php echo $att->name ?></label>
									</div>									
								<?php endforeach ?>								
							</div>			
							<div class="form-group form-inline">
								<?php echo form_label('Tanggal Permohonan','date',array('class'=>'control-label'))?>
								<?php echo form_input(array('name'=>'date','class'=>'form-control input-sm input-tanggal','maxlength'=>'10','autocomplete'=>'off','value'=>set_value('date',(isset($row->date)?$row->date:''))))?>
								<small><?php echo form_error('date')?></small>
							</div>
							<div class="form-group form-inline">
								<?php echo form_label('Status','status',array('class'=>'control-label'))?>
								<?php echo form_dropdown('status',$this->general_model->dropdown('bidan_kta_status','Status'),set_value('status',(isset($row->status)?$row->status:'')),'id="status" class="form-control input-sm"')?>
								<small><?php echo form_error('status')?></small>
							</div>
							<div class="form-group form-inline">
								<?php echo form_label('Masa Berlaku','masa_berlaku',array('class'=>'control-label'))?>
								<?php echo form_input(array('name'=>'masa_berlaku','class'=>'form-control input-sm input-tanggal','maxlength'=>'10','autocomplete'=>'off','value'=>set_value('masa_berlaku',(isset($row->masa_berlaku)?$row->masa_berlaku:''))))?>
								<small><?php echo form_error('masa_berlaku')?></small>
							</div>
						</div>
					</div>					
				</div>
			</div>
		</div>
		<div class="box-footer">
			<button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Are you sure')"><span class="glyphicon glyphicon-save"></span> Save</button>
			<?php echo anchor($breadcrumb,'<span class="glyphicon glyphicon-repeat"></span> Back',array('class'=>'btn btn-danger btn-sm'))?>
		</div>
	</div>
	<?php echo form_close()?>
</section>