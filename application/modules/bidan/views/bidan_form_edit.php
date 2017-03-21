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
			<div class="form-group form-inline">
				<?php echo form_label('No Rekomendasi','nomor',array('class'=>'control-label'))?>
				<?php echo form_input(array('name'=>'nomor','class'=>'form-control input-sm','maxlength'=>'50','size'=>'60','autocomplete'=>'off','value'=>set_value('nomor',(isset($row->nomor)?$row->nomor:''))))?>
				<small><?php echo form_error('nomor')?></small>
			</div>
			<div class="form-group form-inline">
				<?php echo form_label('Nama Lengkap','name',array('class'=>'control-label'))?>
				<?php echo form_input(array('name'=>'name','class'=>'form-control input-sm','maxlength'=>'100','size'=>'100','autocomplete'=>'off','value'=>set_value('name',(isset($row->name)?$row->name:''))))?>
				<small><?php echo form_error('name')?></small>
			</div>
			<div class="form-group form-inline">
				<?php echo form_label('Tempat Lahir','tempat_lahir',array('class'=>'control-label'))?>
				<?php echo form_input(array('name'=>'tempat_lahir','class'=>'form-control input-sm','maxlength'=>'100','size'=>'50','autocomplete'=>'off','value'=>set_value('tempat_lahir',(isset($row->tempat_lahir)?$row->tempat_lahir:''))))?>
				<small><?php echo form_error('tempat_lahir')?></small>
			</div>
			<div class="form-group form-inline">
				<?php echo form_label('Tanggal Lahir','tanggal_lahir',array('class'=>'control-label'))?>
				<?php echo form_input(array('name'=>'tanggal_lahir','class'=>'form-control input-sm input-dob','maxlength'=>'10','autocomplete'=>'off','value'=>set_value('tanggal_lahir',(isset($row->tanggal_lahir)?$row->tanggal_lahir:''))))?>
				<small><?php echo form_error('tanggal_lahir')?></small>
			</div>
			<div class="form-group form-inline">
				<?php echo form_label('Alamat Rumah','alamat_rumah',array('class'=>'control-label'))?>
				<?php echo form_textarea(array('name'=>'alamat_rumah','class'=>'form-control input-sm','cols'=>'70','rows'=>'3','autocomplete'=>'off','value'=>set_value('alamat_rumah',(isset($row->alamat_rumah)?$row->alamat_rumah:''))))?>
				<small><?php echo form_error('alamat_rumah')?></small>
			</div>
			<div class="form-group form-inline">
				<?php echo form_label('Alamat Praktik','alamat_praktik',array('class'=>'control-label'))?>
				<?php echo form_textarea(array('name'=>'alamat_praktik','class'=>'form-control input-sm','cols'=>'70','rows'=>'3','autocomplete'=>'off','value'=>set_value('alamat_praktik',(isset($row->alamat_praktik)?$row->alamat_praktik:''))))?>
				<small><?php echo form_error('alamat_praktik')?></small>
			</div>
			<div class="form-group form-inline">
				<?php echo form_label('No Telp/HP','tlp',array('class'=>'control-label'))?>
				<?php echo form_input(array('name'=>'tlp','class'=>'form-control input-sm','maxlength'=>'20','size'=>'25','autocomplete'=>'off','value'=>set_value('tlp',(isset($row->tlp)?$row->tlp:''))))?>
				<small><?php echo form_error('tlp')?></small>
			</div>
			<div class="form-group form-inline">
				<?php echo form_label('Golongan Darah','golongan_darah',array('class'=>'control-label'))?>
				<?php echo form_dropdown('golongan_darah',$this->general_model->dropdown('golongan_darah','Golongan Darah'),set_value('golongan_darah',(isset($row->golongan_darah)?$row->golongan_darah:'')),'id="golongan_darah" class="form-control input-sm"')?>
				<small><?php echo form_error('golongan_darah')?></small>
			</div>			
			<div class="form-group form-inline">
				<?php echo form_label('Pendidikan','pendidikan',array('class'=>'control-label'))?>
				<?php echo form_dropdown('pendidikan',$this->general_model->dropdown('pendidikan','Pendidikan'),set_value('pendidikan',(isset($row->pendidikan)?$row->pendidikan:'')),'id="pendidikan" class="form-control input-sm"')?>
				<small><?php echo form_error('pendidikan')?></small>
			</div>
			<div class="form-group form-inline">
				<?php echo form_label('Institusi/Kampus','kampus',array('class'=>'control-label'))?>
				<?php echo form_input(array('name'=>'kampus','class'=>'form-control input-sm','maxlength'=>'50','size'=>'70','autocomplete'=>'off','value'=>set_value('kampus',(isset($row->kampus)?$row->kampus:''))))?>
				<small><?php echo form_error('kampus')?></small>
			</div>
			<div class="form-group form-inline">
				<?php echo form_label('Tahun Lulusan','tahun_lulus',array('class'=>'control-label'))?>
				<?php echo form_input(array('name'=>'tahun_lulus','class'=>'form-control input-sm','maxlength'=>'4','size'=>'10','autocomplete'=>'off','value'=>set_value('tahun_lulus',(isset($row->tahun_lulus)?$row->tahun_lulus:''))))?>
				<small><?php echo form_error('tahun_lulus')?></small>
			</div>
			<div class="form-group form-inline">
				<?php echo form_label('Instansi/Tempat Kerja','tempat_kerja',array('class'=>'control-label'))?>
				<?php echo form_input(array('name'=>'tempat_kerja','class'=>'form-control input-sm','maxlength'=>'100','size'=>'70','autocomplete'=>'off','value'=>set_value('tempat_kerja',(isset($row->tempat_kerja)?$row->tempat_kerja:''))))?>
				<small><?php echo form_error('tempat_kerja')?></small>
			</div>
			<div class="form-group form-inline">
				<?php echo form_label('Status Kepegawaian','status_pegawai',array('class'=>'control-label'))?>
				<?php echo form_dropdown('status_pegawai',$this->general_model->dropdown('status_pegawai','Status Kepegawaian'),set_value('status_pegawai',(isset($row->status_pegawai)?$row->status_pegawai:'')),'id="status_pegawai" class="form-control input-sm"')?>
				<small><?php echo form_error('status_pegawai')?></small>
			</div>
			<div class="form-group form-inline">
				<?php echo form_label('NIP/NR PTT','nip',array('class'=>'control-label'))?>
				<?php echo form_input(array('name'=>'nip','class'=>'form-control input-sm','maxlength'=>'20','size'=>'25','autocomplete'=>'off','value'=>set_value('nip',(isset($row->nip)?$row->nip:''))))?>
				<small><?php echo form_error('nip')?></small>
			</div>
		</div>
		<div class="box-footer">
			<button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Are you sure')"><span class="glyphicon glyphicon-save"></span> Save</button>
			<?php echo anchor($breadcrumb,'<span class="glyphicon glyphicon-repeat"></span> Back',array('class'=>'btn btn-danger btn-sm'))?>
		</div>
	</div>
	<?php echo form_close()?>
</section>