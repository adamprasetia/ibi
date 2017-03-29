<?php echo $this->session->flashdata('alert')?>
<form action="<?php echo site_url($action) ?>" method="post">
<div class="box box-default">	
	<?php echo $owner; ?>	
	<div class="box-body">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group form-inline">
					<?php echo form_label('Tanggal Permohonan','date',array('class'=>'control-label'))?>
					<?php echo form_input(array('name'=>'date','class'=>'form-control input-sm input-tanggal','maxlength'=>'10','size'=>'10','autocomplete'=>'off','value'=>set_value('date',(isset($row->date)?$row->date:''))))?>
					<small><?php echo form_error('date')?></small>
				</div>			
				<div class="form-group form-inline">
					<?php echo form_label('Jenis Pengajuan','type',array('class'=>'control-label'))?>
					<?php echo form_dropdown('type',$this->general_model->dropdown('bidan_'.$module.'_type','Jenis Pengajuan'),set_value('type',(isset($row->type)?$row->type:'')),'id="type" class="form-control input-sm"')?>
					<small><?php echo form_error('type')?></small>
				</div>	
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				IDENTITAS PENGUSUL
			</div>
			<div class="panel-body">
				<div class="form-group form-inline">
					<?php echo form_label('Nama Lengkap','bidan',array('class'=>'control-label'))?>
					: <?php echo form_dropdown('bidan',$this->general_model->dropdown_with_nomor('bidan','Bidan'),set_value('bidan',(isset($row->bidan)?$row->bidan:'')),'id="bidan" class="form-control input-sm select2"')?>
					<small><?php echo form_error('bidan')?></small>
				</div>
				<div class="form-group form-inline">
					<label for="ttl" class="control-label">Tempat, tanggal lahir</label>
					: <span id="ttl"></span>
				</div>
				<div class="form-group form-inline">
					<label for="alamat" class="control-label">Alamat</label>
					: <span id="alamat"></span>
				</div>
				<div class="form-group form-inline">
					<label for="tlp" class="control-label">No Telp</label>
					: <span id="tlp"></span>
				</div>
				<div class="form-group form-inline">
					<label for="kampus" class="control-label">Perguruan Tinggi</label>
					: <span id="kampus"></span>
				</div>
				<div class="form-group form-inline">
					<label for="tahun_lulus" class="control-label">Tahun Lulus</label>
					: <span id="tahun_lulus"></span>
				</div>
				<div class="form-group form-inline">
					<label for="no_ijazah" class="control-label">No Ijazah</label>
					: <span id="no_ijazah"></span>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group form-inline">
					<?php echo form_label('Nomor '.strtoupper($module),'nomor',array('class'=>'control-label'))?>
					<?php echo form_input(array('name'=>'nomor','class'=>'form-control input-sm','maxlength'=>'20','size'=>'20','autocomplete'=>'off','value'=>set_value('nomor',(isset($row->nomor)?$row->nomor:''))))?>
					<small><?php echo form_error('nomor')?></small>
				</div>	
				<div class="form-group form-inline">
					<?php echo form_label('Masa Berlaku '.strtoupper($module),'masa_berlaku',array('class'=>'control-label'))?>
					<?php echo form_input(array('name'=>'masa_berlaku','class'=>'form-control input-sm input-tanggal','maxlength'=>'10','autocomplete'=>'off','value'=>set_value('masa_berlaku',(isset($row->masa_berlaku)?$row->masa_berlaku:''))))?>
					<small><?php echo form_error('masa_berlaku')?></small>
				</div>							
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				PERSYARATAN PENGAJUAN KTA :			
			</div>
			<div class="panel-body">
				<div class="panel-default">
					<div class="form-group">
						<?php foreach ($attachment as $att): ?>
							<div id="attachment_<?php echo $att->id; ?>" class="checkbox">
								<label><input type="checkbox" name="attachment[]" value="<?php echo $att->id ?>" <?php echo (isset($row->attachment) && in_array($att->id, $row->attachment)?'checked':''); ?>><?php echo $att->name ?></label>
							</div>									
						<?php endforeach ?>								
					</div>			
				</div>
			</div>
		</div>
		<div id="kta-panel" class="panel panel-default">
			<div class="panel-body">
				<div class="form-group form-inline">
					<?php echo form_label('Status','status',array('class'=>'control-label'))?>
					<?php echo form_dropdown('status',$this->general_model->dropdown('bidan_'.$module.'_status','Status'),set_value('status',(isset($row->status)?$row->status:'')),'id="status" class="form-control input-sm"')?>
					<small><?php echo form_error('status')?></small>
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
				$('#kta_no').html(str.kta_no);
				$('#ttl').html(str.tempat_lahir+', '+str.tanggal_lahir);
				$('#alamat').html(str.alamat);
				$('#tlp').html(str.tlp);
				$('#pendidikan').html(str.pendidikan_name);
				$('#kampus').html(str.kampus);
				$('#tahun_lulus').html(str.tahun_lulus);
				$('#no_ijazah').html(str.no_ijazah);
			}
		});
	}
</script>