<?php echo $this->session->flashdata('alert')?>
<form action="<?php echo site_url($action) ?>" enctype="multipart/form-data" method="post">
<?php 
	if (isset($bidan_id)) {
		$this->load->view('bidan/tab');
	}
?>	
<div class="box box-default">
	<div class="box-body">
		<div class="panel panel-default">
			<div class="panel-heading">
				Identitas
			</div>
			<div class="panel-body">
				<?php if (isset($row->id) && file_exists('./files/bidan/'.$row->id.'.jpg')): ?>
				<div class="pull-right">
					<img class="img-thumbnail" src="<?php echo base_url('files/bidan/'.$row->id.'.jpg') ?>" width="200px">
				</div>
				<?php endif ?>
				<div class="form-group form-inline">
					<?php echo form_label('Nama Lengkap','name',array('class'=>'control-label'))?>
					<?php echo form_input(array('name'=>'name','class'=>'form-control input-sm','maxlength'=>'100','size'=>'50','autocomplete'=>'off','value'=>set_value('name',(isset($row->name)?$row->name:''))))?>
					<small><?php echo form_error('name')?></small>
				</div>
				<div class="form-group form-inline">
					<?php echo form_label('Tempat Lahir','tempat_lahir',array('class'=>'control-label'))?>
					<?php echo form_input(array('name'=>'tempat_lahir','class'=>'form-control input-sm','maxlength'=>'100','size'=>'30','autocomplete'=>'off','value'=>set_value('tempat_lahir',(isset($row->tempat_lahir)?$row->tempat_lahir:''))))?>
					<small><?php echo form_error('tempat_lahir')?></small>
				</div>
				<div class="form-group form-inline">
					<?php echo form_label('Tanggal Lahir','tanggal_lahir',array('class'=>'control-label'))?>
					<?php echo form_input(array('name'=>'tanggal_lahir','class'=>'form-control input-sm input-tanggal','maxlength'=>'10','autocomplete'=>'off','value'=>set_value('tanggal_lahir',(isset($row->tanggal_lahir)?$row->tanggal_lahir:''))))?>
					<small><?php echo form_error('tanggal_lahir')?></small>
				</div>
				<div class="form-group form-inline">
					<?php echo form_label('Alamat','alamat',array('class'=>'control-label'))?>
					<?php echo form_textarea(array('name'=>'alamat','class'=>'form-control input-sm','cols'=>'70','rows'=>'3','autocomplete'=>'off','value'=>set_value('alamat',(isset($row->alamat)?$row->alamat:''))))?>
					<small><?php echo form_error('alamat')?></small>
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
					<?php echo form_label('Wilayah','wilayah',array('class'=>'control-label'))?>
					<?php echo form_dropdown('wilayah',$this->general_model->dropdown('wilayah','Wilayah'),set_value('wilayah',(isset($row->wilayah)?$row->wilayah:'')),'id="wilayah" class="form-control input-sm"')?>
					<small><?php echo form_error('wilayah')?></small>
				</div>			
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-body">	
				<div class="form-group form-inline">
					<label for="userfile" class="control-label">Upload Foto</label>
					<input type="file" name="userfile" class="form-control">
				</div>
			</div>
		</div>			
		<div class="panel panel-default">
			<div class="panel-heading">
				Nomor
			</div>
			<div class="panel-body">	
				<div class="form-group form-inline">
					<?php echo form_label('Nomor KTA','kta_no',array('class'=>'control-label'))?>
					<?php echo form_input(array('name'=>'kta_no','class'=>'form-control input-sm','maxlength'=>'20','size'=>'20','autocomplete'=>'off','value'=>set_value('kta_no',(isset($row->kta_no)?$row->kta_no:''))))?>
					<small><?php echo form_error('kta_no')?></small>				
				</div>
				<div class="form-group form-inline">
					<?php echo form_label('No Rekomendasi','nomor',array('class'=>'control-label'))?>
					<?php echo form_input(array('name'=>'nomor','class'=>'form-control input-sm','maxlength'=>'30','size'=>'20','autocomplete'=>'off','value'=>set_value('nomor',(isset($row->nomor)?$row->nomor:''))))?>
					<small><?php echo form_error('nomor')?></small>
				</div>
				<div class="form-group form-inline">
					<?php echo form_label('No Sertikom','sertikom',array('class'=>'control-label'))?>
					<?php echo form_input(array('name'=>'sertikom','class'=>'form-control input-sm','maxlength'=>'20','size'=>'20','autocomplete'=>'off','value'=>set_value('sertikom',(isset($row->sertikom)?$row->sertikom:''))))?>
					<small><?php echo form_error('sertikom')?></small>
				</div>
			</div>
		</div>			
		<div class="panel panel-default">
			<div class="panel-heading">
				Praktik
			</div>
			<div class="panel-body">	
				<div class="form-group form-inline">
					<?php echo form_label('Nama Tempat','praktik_nama',array('class'=>'control-label'))?>
					<?php echo form_input(array('name'=>'praktik_nama','class'=>'form-control input-sm','maxlength'=>'50','size'=>'50','autocomplete'=>'off','value'=>set_value('praktik_nama',(isset($row->praktik_nama)?$row->praktik_nama:''))))?>
					<small><?php echo form_error('praktik_nama')?></small>
				</div>
				<div class="form-group form-inline">
					<?php echo form_label('Alamat Praktik','praktik_alamat',array('class'=>'control-label'))?>
					<?php echo form_textarea(array('name'=>'praktik_alamat','class'=>'form-control input-sm','cols'=>'70','rows'=>'3','autocomplete'=>'off','value'=>set_value('praktik_alamat',(isset($row->praktik_alamat)?$row->praktik_alamat:''))))?>
					<small><?php echo form_error('praktik_alamat')?></small>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				Pendidikan
			</div>
			<div class="panel-body">	
				<div class="form-group form-inline">
					<?php echo form_label('Pendidikan','pendidikan',array('class'=>'control-label'))?>
					<?php echo form_dropdown('pendidikan',$this->general_model->dropdown('pendidikan','Pendidikan'),set_value('pendidikan',(isset($row->pendidikan)?$row->pendidikan:'')),'id="pendidikan" class="form-control input-sm"')?>
					<small><?php echo form_error('pendidikan')?></small>
				</div>
				<div class="form-group form-inline">
					<?php echo form_label('Institusi/Kampus','kampus',array('class'=>'control-label'))?>
					<?php echo form_input(array('name'=>'kampus','class'=>'form-control input-sm','maxlength'=>'50','size'=>'50','autocomplete'=>'off','value'=>set_value('kampus',(isset($row->kampus)?$row->kampus:''))))?>
					<small><?php echo form_error('kampus')?></small>
				</div>
				<div class="form-group form-inline">
					<?php echo form_label('No Ijazah','no_ijazah',array('class'=>'control-label'))?>
					<?php echo form_input(array('name'=>'no_ijazah','class'=>'form-control input-sm','maxlength'=>'50','size'=>'50','autocomplete'=>'off','value'=>set_value('no_ijazah',(isset($row->no_ijazah)?$row->no_ijazah:''))))?>
					<small><?php echo form_error('no_ijazah')?></small>
				</div>
				<div class="form-group form-inline">
					<?php echo form_label('Tahun Lulusan','tahun_lulus',array('class'=>'control-label'))?>
					<?php echo form_input(array('name'=>'tahun_lulus','class'=>'form-control input-sm','maxlength'=>'4','size'=>'10','autocomplete'=>'off','value'=>set_value('tahun_lulus',(isset($row->tahun_lulus)?$row->tahun_lulus:''))))?>
					<small><?php echo form_error('tahun_lulus')?></small>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				Pekerjaan
			</div>
			<div class="panel-body">	
				<div class="form-group form-inline">
					<?php echo form_label('Instansi/Tempat Kerja','tempat_kerja',array('class'=>'control-label'))?>
					<?php echo form_input(array('name'=>'tempat_kerja','class'=>'form-control input-sm','maxlength'=>'100','size'=>'50','autocomplete'=>'off','value'=>set_value('tempat_kerja',(isset($row->tempat_kerja)?$row->tempat_kerja:''))))?>
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
		</div>
	</div>
</div>		
<div class="box box-default">
	<div class="box-body">
		<button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Apa anda yakin ?')"><span class="glyphicon glyphicon-save"></span> Simpan</button>
		<a href="<?php echo site_url($module.get_query_string()) ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-repeat"></span> Kembali</a>
	</div>
</div>
</form>