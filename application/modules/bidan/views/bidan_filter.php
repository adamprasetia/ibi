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
					<?php echo form_input(array('name'=>'name','class'=>'form-control input-sm','maxlength'=>'100','size'=>'50','autocomplete'=>'off','value'=>$this->input->get('name')))?>
				</div>
				<div class="form-group form-inline">
					<?php echo form_label('Tempat Lahir','tempat_lahir',array('class'=>'control-label'))?>
					<?php echo form_input(array('name'=>'tempat_lahir','class'=>'form-control input-sm','maxlength'=>'100','size'=>'50','autocomplete'=>'off','value'=>$this->input->get('tempat_lahir')))?>
				</div>
				<div class="form-group form-inline">
					<?php echo form_label('Tanggal Lahir','tanggal_lahir_from',array('class'=>'control-label'))?>
					<?php echo form_input(array('name'=>'tanggal_lahir_from','class'=>'form-control input-sm input-tanggal','maxlength'=>'10','autocomplete'=>'off','value'=>$this->input->get('tanggal_lahir_from')))?>
					<?php echo form_input(array('name'=>'tanggal_lahir_to','class'=>'form-control input-sm input-tanggal','maxlength'=>'10','autocomplete'=>'off','value'=>$this->input->get('tanggal_lahir_to')))?>
				</div>
				<div class="form-group form-inline">
					<?php echo form_label('Alamat','alamat',array('class'=>'control-label'))?>
					<?php echo form_input(array('name'=>'alamat','class'=>'form-control input-sm','maxlength'=>'100','size'=>'50','autocomplete'=>'off','value'=>$this->input->get('alamat')))?>
				</div>
				<div class="form-group form-inline">
					<?php echo form_label('No Telp/HP','tlp',array('class'=>'control-label'))?>
					<?php echo form_input(array('name'=>'tlp','class'=>'form-control input-sm','maxlength'=>'100','size'=>'50','autocomplete'=>'off','value'=>$this->input->get('tlp')))?>
				</div>
				<div class="form-group form-inline">
					<?php echo form_label('Golongan Darah','golongan_darah',array('class'=>'control-label'))?>
					<?php echo form_dropdown('golongan_darah',$this->general_model->dropdown('golongan_darah','Golongan Darah'),$this->input->get('golongan_darah'),'id="golongan_darah" class="form-control input-sm"')?>
				</div>			
				<div class="form-group form-inline">
					<?php echo form_label('Wilayah','wilayah',array('class'=>'control-label'))?>
					<?php 
						$wilayah = $this->general_model->dropdown('wilayah','Wilayah'); 
						$wilayah['-1'] = 'Kosong';
					?>
					<?php echo form_dropdown('wilayah',$wilayah,$this->input->get('wilayah'),'id="wilayah" class="form-control input-sm"')?>
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
					<?php echo form_input(array('name'=>'kta_no','class'=>'form-control input-sm','maxlength'=>'100','size'=>'50','autocomplete'=>'off','value'=>$this->input->get('kta_no')))?>
				</div>
				<div class="form-group form-inline">
					<?php echo form_label('No Rekomendasi','nomor',array('class'=>'control-label'))?>
					<?php echo form_input(array('name'=>'nomor','class'=>'form-control input-sm','maxlength'=>'100','size'=>'50','autocomplete'=>'off','value'=>$this->input->get('nomor')))?>
				</div>
				<div class="form-group form-inline">
					<?php echo form_label('No Sertikom','sertikom',array('class'=>'control-label'))?>
					<?php echo form_input(array('name'=>'sertikom','class'=>'form-control input-sm','maxlength'=>'100','size'=>'50','autocomplete'=>'off','value'=>$this->input->get('sertikom')))?>
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
					<?php echo form_input(array('name'=>'praktik_nama','class'=>'form-control input-sm','maxlength'=>'100','size'=>'50','autocomplete'=>'off','value'=>$this->input->get('praktik_nama')))?>
				</div>
				<div class="form-group form-inline">
					<?php echo form_label('Alamat Praktik','praktik_alamat',array('class'=>'control-label'))?>
					<?php echo form_input(array('name'=>'praktik_alamat','class'=>'form-control input-sm','maxlength'=>'100','size'=>'50','autocomplete'=>'off','value'=>$this->input->get('praktik_alamat')))?>
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
					<?php echo form_dropdown('pendidikan',$this->general_model->dropdown('pendidikan','Pendidikan'),$this->input->get('pendidikan'),'id="pendidikan" class="form-control input-sm"')?>
				</div>
				<div class="form-group form-inline">
					<?php echo form_label('Institusi/Kampus','kampus',array('class'=>'control-label'))?>
					<?php echo form_input(array('name'=>'kampus','class'=>'form-control input-sm','maxlength'=>'100','size'=>'50','autocomplete'=>'off','value'=>$this->input->get('kampus')))?>
				</div>
				<div class="form-group form-inline">
					<?php echo form_label('No Ijazah','no_ijazah',array('class'=>'control-label'))?>
					<?php echo form_input(array('name'=>'no_ijazah','class'=>'form-control input-sm','maxlength'=>'100','size'=>'50','autocomplete'=>'off','value'=>$this->input->get('no_ijazah')))?>
				</div>
				<div class="form-group form-inline">
					<?php echo form_label('Tahun Lulusan','tahun_lulus',array('class'=>'control-label'))?>
					<?php echo form_input(array('name'=>'tahun_lulus','class'=>'form-control input-sm','maxlength'=>'100','size'=>'50','autocomplete'=>'off','value'=>$this->input->get('tahun_lulus')))?>
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
					<?php echo form_input(array('name'=>'tempat_kerja','class'=>'form-control input-sm','maxlength'=>'100','size'=>'50','autocomplete'=>'off','value'=>$this->input->get('tempat_kerja')))?>
				</div>
				<div class="form-group form-inline">
					<?php echo form_label('Status Kepegawaian','status_pegawai',array('class'=>'control-label'))?>
					<?php echo form_dropdown('status_pegawai',$this->general_model->dropdown('status_pegawai','Status Kepegawaian'),$this->input->get('status_pegawai'),'id="status_pegawai" class="form-control input-sm"')?>
				</div>
				<div class="form-group form-inline">
					<?php echo form_label('NIP/NR PTT','nip',array('class'=>'control-label'))?>
					<?php echo form_input(array('name'=>'nip','class'=>'form-control input-sm','maxlength'=>'100','size'=>'50','autocomplete'=>'off','value'=>$this->input->get('nip')))?>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				Kepemilikan Surat
			</div>
			<div class="panel-body">	
				<div class="form-group form-inline">
					<?php echo form_label('KTA','kta',array('class'=>'control-label'))?>
					<?php echo form_dropdown('kta',array(''=>'','1'=>'Ya','2'=>'Tidak'),$this->input->get('kta'),'id="kta" class="form-control input-sm"')?>
				</div>
				<div class="form-group form-inline">
					<?php echo form_label('STR','str',array('class'=>'control-label'))?>
					<?php echo form_dropdown('str',array(''=>'','1'=>'Ya','2'=>'Tidak'),$this->input->get('str'),'id="str" class="form-control input-sm"')?>
				</div>
				<div class="form-group form-inline">
					<?php echo form_label('SIPB P','sipb_p',array('class'=>'control-label'))?>
					<?php echo form_dropdown('sipb_p',array(''=>'','1'=>'Ya','2'=>'Tidak'),$this->input->get('sipb_p'),'id="sipb_p" class="form-control input-sm"')?>
				</div>
				<div class="form-group form-inline">
					<?php echo form_label('SIPB M','sipb_m',array('class'=>'control-label'))?>
					<?php echo form_dropdown('sipb_m',array(''=>'','1'=>'Ya','2'=>'Tidak'),$this->input->get('sipb_m'),'id="sipb_m" class="form-control input-sm"')?>
				</div>
			</div>
		</div>
	</div>
</div>		
<div class="box box-default">
	<div class="box-body">
		<button class="btn btn-primary btn-sm" type="submit"><span class="glyphicon glyphicon-filter"></span> Filter</button>
		<a href="<?php echo site_url($module.get_query_string()) ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-repeat"></span> Kembali</a>
	</div>
</div>
</form>