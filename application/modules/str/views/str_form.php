<?php echo $this->session->flashdata('alert')?>
<form action="<?php echo site_url($action) ?>" method="post">
<div class="box box-default">	
	<?php echo $owner; ?>	
	<div class="box-body">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group form-inline">
					<?php echo form_label('Tanggal Permohonan','tanggal',array('class'=>'control-label'))?>
					<?php echo form_input(array('id'=>'tanggal','name'=>'tanggal','class'=>'form-control input-sm input-tanggal','maxlength'=>'10','size'=>'10','autocomplete'=>'off','value'=>set_value('tanggal',(isset($row->tanggal)?$row->tanggal:date('d/m/Y')))))?>
					<small><?php echo form_error('tanggal')?></small>
				</div>			
				<div class="form-group form-inline">
					<?php echo form_label('Jenis Pengajuan','tipe',array('class'=>'control-label'))?>
					<?php echo form_dropdown('tipe',$this->general_model->dropdown('bidan_'.$module.'_tipe','Jenis Pengajuan'),set_value('tipe',(isset($row->tipe)?$row->tipe:'')),'id="tipe" class="form-control input-sm"')?>
					<small><?php echo form_error('tipe')?></small>
				</div>	
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				IDENTITAS PENGUSUL
			</div>
			<div class="panel-body">
				<div class="form-group form-inline">
					<?php echo form_label('1. Nama','bidan',array('class'=>'control-label'))?>
					: <?php echo form_dropdown('bidan',$this->general_model->dropdown('bidan','Bidan'),set_value('bidan',(isset($row->bidan)?$row->bidan:'')),'id="bidan" class="form-control input-sm select2"')?>
					<small><?php echo form_error('bidan')?></small>
				</div>
				<div class="form-group form-inline">
					<label for="ttl" class="control-label">2. TTL</label>
					: <span id="ttl"></span>
				</div>
				<div class="form-group form-inline">
					<label for="alamat" class="control-label">3. Alamat</label>
					: <span id="alamat"></span>
				</div>
				<div class="form-group form-inline">
					<label for="tlp" class="control-label">4. No HP</label>
					: <span id="tlp"></span>
				</div>
				<div class="form-group form-inline">
					<label for="golongan_darah" class="control-label">5. Golongan Darah</label>
					: <span id="golongan_darah"></span>
				</div>
				<div class="form-group">
					<label for="golongan_darah" class="control-label">6. Riwayat Pendidikan</label>
					<div style="margin-left:20px">
						<div class="form-group form-inline">
							<label for="pendidikan" class="control-label" style="font-weight: 500;">a. Pendidikan Terakhir</label>
							: <span id="pendidikan"></span>
						</div>
						<div class="form-group form-inline">
							<label for="kampus" class="control-label" style="font-weight: 500;">b. Institusi/Kampus</label>
							: <span id="kampus"></span>
						</div>
						<div class="form-group form-inline">
							<label for="tahun_lulus" class="control-label" style="font-weight: 500;">c. Tahun Lulus</label>
							: <span id="tahun_lulus"></span>
						</div>						
					</div>
				</div>
				<div class="form-group">
					<label for="tempat_kerja" class="control-label">7. Riwayat Pekerjaan</label>
					<div style="margin-left:20px">
						<div class="form-group form-inline">
							<label for="sudah_bekerja" class="control-label" style="font-weight: 500;">a. Sudah Bekerja</label>
							: <span id="sudah_bekerja"></span>
						</div>
						<div class="form-group form-inline">
							<label for="tempat_kerja" class="control-label" style="font-weight: 500;">b. Tempat Bekerja</label>
							: <span id="tempat_kerja"></span>
						</div>
					</div>		
				</div>
			</div>
		</div>
		<div id="data_sebelum" class="panel panel-default">
			<div class="panel-body">			
				<div class="form-group form-inline">
					<label id="nomor_sebelum_label" for="nomor_sebelum" class="control-label">Nomor</label>
					: <span id="nomor_sebelum"></span>
				</div>						
				<div id="masa_berlaku_sebelum_div" class="form-group form-inline">
					<label id="masa_berlaku_sebelum_label" for="masa_berlaku_sebelum" class="control-label">Masa Berlaku</label>
					: <span id="masa_berlaku_sebelum"></span>
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
						<?php foreach ($syarat as $s): ?>
							<div id="syarat_<?php echo $s->id; ?>" class="checkbox">
								<label><input type="checkbox" name="syarat[]" value="<?php echo $s->id ?>" <?php echo (isset($row->syarat) && in_array($s->id, $row->syarat)?'checked':''); ?>><?php echo $s->name ?></label>
							</div>									
						<?php endforeach ?>								
					</div>			
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group form-inline">
					<?php echo form_label('Status','status',array('class'=>'control-label'))?>
					<?php echo form_dropdown('status',$this->general_model->dropdown('bidan_'.$module.'_status','Status'),set_value('status',(isset($row->status)?$row->status:'2')),'id="status" class="form-control input-sm"')?>
					<small><?php echo form_error('status')?></small>
				</div>				
				<div id="nomor" class="form-group form-inline">
					<?php echo form_label('Nomor','nomor',array('class'=>'control-label'))?>
					<?php echo form_input(array('name'=>'nomor','class'=>'form-control input-sm','maxlength'=>'20','size'=>'20','autocomplete'=>'off','value'=>set_value('nomor',(isset($row->nomor)?$row->nomor:''))))?>
					<small><?php echo form_error('nomor')?></small>
				</div>						
				<div id="masa_berlaku" class="form-group form-inline">
					<?php echo form_label('Masa Berlaku','masa_berlaku',array('class'=>'control-label'))?>
					<?php echo form_input(array('name'=>'masa_berlaku','class'=>'form-control input-sm input-tanggal','maxlength'=>'10','size'=>'10','autocomplete'=>'off','value'=>set_value('masa_berlaku',(isset($row->masa_berlaku)?$row->masa_berlaku:''))))?>
					<small><?php echo form_error('masa_berlaku')?></small>
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
		function str_last()
		{
			$('#nomor_sebelum').html('');
			$('#masa_berlaku_sebelum').html('');
			$.ajax({
				url:'<?php echo base_url() ?>index.php/api/str/last',
				dataType:'json',
				type:'post',
				data:{bidan:$('#bidan').val(),tanggal:$('#tanggal').val()},
				success:function(str){
					if (str) {
						$('#nomor_sebelum').html(str.nomor);
						$('#masa_berlaku_sebelum').html(str.masa_berlaku);
					}
				}
			});
		}

		function bidan(){
			$.ajax({
				url:'<?php echo base_url() ?>index.php/api/bidan/get_by_id/'+$('#bidan').val(),
				dataType:'json',
				type:'post',
				success:function(str){
					$('#ttl').html(str.tempat_lahir+', '+str.tanggal_lahir);
					$('#alamat').html(str.alamat);
					$('#tlp').html(str.tlp);
					$('#golongan_darah').html(str.golongan_darah_name);
					$('#pendidikan').html(str.pendidikan_name);
					$('#kampus').html(str.kampus);
					$('#tahun_lulus').html(str.tahun_lulus);
					if ($('#tipe').val()=='1') {
						$('#nomor_sebelum').html(str.sertikom);
					}
					if (str.tempat_kerja) {
						$('#sudah_bekerja').html('Ya');
						$('#tempat_kerja').html(str.tempat_kerja);					
					}else{
						$('#sudah_bekerja').html('Tidak');
						$('#tempat_kerja').html('');
					}
				}
			});
		}		
		function check_status()
		{
			if ($('#status').val()=='1') {
				$('#nomor').show();
				$('#masa_berlaku').show();
			}else{
				$('#nomor').hide();
				$('#masa_berlaku').hide();
			}	
		}
		check_status();
		
		function general(){
			bidan();
			if ($('#tipe').val()=='1') {
				$('#nomor_sebelum_label').html('Nomor Sertikom');
				$('#masa_berlaku_sebelum_div').hide();
				$('#data_sebelum').show();			
			}else if ($('#tipe').val()=='2') {
				str_last();
				$('#nomor_sebelum_label').html('Nomor STR');
				$('#masa_berlaku_sebelum_label').html('Masa Berlaku STR');
				$('#masa_berlaku_sebelum_div').show();
				$('#data_sebelum').show();
			}else if ($('#tipe').val()=='3') {
				str_last();
				$('#nomor_sebelum_label').html('Nomor SIB');
				$('#masa_berlaku_sebelum_label').html('Masa Berlaku SIB');
				$('#masa_berlaku_sebelum_div').show();
				$('#data_sebelum').show();
			}else{
				$('#masa_berlaku_sebelum_div').hide();
				$('#data_sebelum').hide();
			}
		}
		general();

		$('#bidan').change(function(){
			general();
		});
		$('#tipe').change(function(){
			general();
		});
		$('#status').change(function(){
			check_status();
		});
	});		
</script>