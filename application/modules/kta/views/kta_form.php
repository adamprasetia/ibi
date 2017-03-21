<section class="content-header">
	<h1>
		<?php echo $title ?>
		<small><?php echo $subtitle ?></small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo site_url('home') ?>"><span class="glyphicon glyphicon-home"></span> Beranda</a></li>
	    <li><a href="<?php echo site_url($module.get_query_string()) ?>">Tabel</a></li>
	    <li class="active"><?php echo $title?></li>
	</ol>
</section>
<section class="content">
	<?php echo $this->session->flashdata('alert')?>
	<form action="<?php echo site_url($action) ?>" method="post">
	<div class="box box-default">
		<div class="box-header owner">
			<?php echo $owner?>
		</div>
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
			<hr>
			<div class="form-group form-inline">
				<?php echo form_label('Nama Pemohon','bidan',array('class'=>'control-label'))?>
				<?php echo form_dropdown('bidan',$this->general_model->dropdown_with_nomor('bidan','Bidan'),set_value('bidan',(isset($row->bidan)?$row->bidan:'')),'id="bidan" class="form-control input-sm select2"')?>
				<small><?php echo form_error('bidan')?></small>
			</div>
			<div class="form-group form-inline">
				<label for="ttl" class="control-label">TTL</label>
				<input type="text" id="ttl" class="form-control input-sm" size="35" disabled="true">
			</div>
			<div class="form-group form-inline">
				<label for="alamat" class="control-label">Alamat</label>
				<textarea id="alamat" class="form-control input-sm" disabled="true" cols="50"></textarea>
			</div>
			<div class="form-group form-inline">
				<label for="tlp" class="control-label">Telephone/HP</label>
				<input type="text" id="tlp" class="form-control input-sm" size="15" disabled="true">
			</div>
			<div class="form-group form-inline">
				<label for="golongan_darah" class="control-label">Golongan Darah</label>
				<input type="text" id="golongan_darah" class="form-control input-sm" size="15" disabled="true">
			</div>
			<hr>
			<div class="form-group form-inline">
				<label for="pendidikan" class="control-label">Pendidikan Terakhir</label>
				<input type="text" id="pendidikan" class="form-control input-sm" size="15" disabled="true">
			</div>
			<div class="form-group form-inline">
				<label for="kampus" class="control-label">Nama Institusi/Kampus</label>
				<input type="text" id="kampus" class="form-control input-sm" size="45" disabled="true">
			</div>
			<div class="form-group form-inline">
				<label for="tahun_lulus" class="control-label">Tahun Lulus</label>
				<input type="text" id="tahun_lulus" class="form-control input-sm" size="15" disabled="true">
			</div>
			<div class="form-group form-inline">
				<label for="tempat_kerja" class="control-label">Tempat Bekerja</label>
				<input type="text" id="tempat_kerja" class="form-control input-sm" size="45" disabled="true">
			</div>
			<hr>
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
		<div class="box-footer">
			<button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Are you sure')"><span class="glyphicon glyphicon-save"></span> Simpan</button>
			<a class="btn btn-danger btn-sm" href="<?php echo site_url($module) ?>"><span class="glyphicon glyphicon-repeat"></span> Batal</a>
		</div>
	</div>
	</form>
</section>
<script type="text/javascript">
	$(document).ready(function(){
		var app = {
			bidan:$('#bidan')
		};

		app.bidan.select2({
		    placeholder: "- Bidan -",
		    dropdownAutoWidth:'true',
		    width: 'auto',    
		    ajax: {
		    url: '<?php echo base_url() ?>index.php/api/bidan',
		    dataType: 'json',
		    processResults: function (data) {
		          return {
		              results: $.map(data, function (item) {
		                  return {
		                      text: item.name,
		                      id: item.id
		                  }
		              })
		          };
		      }
		  	}
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		gen_bidan();
		$('#bidan').change(function(){
			gen_bidan();
		});
	});
	function gen_bidan(){
		$.ajax({
			url:'<?php echo base_url() ?>index.php/api/bidan/get_by_id/'+$('#bidan').val(),
			dataType:'json',
			type:'post',
			success:function(str){
				$('#ttl').val(str.tempat_lahir+', '+str.tanggal_lahir);
				$('#alamat').val(str.alamat_rumah);
				$('#tlp').val(str.tlp);
				$('#golongan_darah').val(str.golongan_darah_name);
				$('#pendidikan').val(str.pendidikan_name);
				$('#kampus').val(str.kampus);
				$('#tahun_lulus').val(str.tahun_lulus);
				$('#tempat_kerja').val(str.tempat_kerja);
			}
		});
	}			
</script>