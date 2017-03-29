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
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group form-inline">
					<?php echo form_label('Tanggal Permohonan','tanggal',array('class'=>'control-label'))?>
					<?php echo form_input(array('id'=>'tanggal','name'=>'tanggal','class'=>'form-control input-sm input-tanggal','maxlength'=>'10','autocomplete'=>'off','value'=>set_value('tanggal',(isset($row->tanggal)?$row->tanggal:date('d/m/Y')))))?>
					<small><?php echo form_error('tanggal')?></small>
				</div>
				<div class="form-group form-inline">
					<?php echo form_label('Jenis Pengajuan','tipe',array('class'=>'control-label'))?>
					<?php echo form_dropdown('tipe',$this->general_model->dropdown('bidan_'.$modulesub.'_tipe','Jenis Pengajuan'),set_value('tipe',(isset($row->tipe)?$row->tipe:'')),'id="tipe" class="form-control input-sm"')?>
					<small><?php echo form_error('tipe')?></small>
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
			<div class="panel-body">
				<div class="form-group">
					<?php echo form_label('Persyaratan','syarat',array('class'=>'control-label'))?>								
					<?php foreach ($syarat as $s): ?>
						<div class="checkbox" id="syarat_<?php echo $s->id ?>">
							<label><input type="checkbox" name="syarat[]" value="<?php echo $s->id ?>" <?php echo (isset($row->syarat) && in_array($s->id, $row->syarat)?'checked':''); ?>><?php echo $s->name ?></label>
						</div>									
					<?php endforeach ?>	
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group form-inline">
					<?php echo form_label('Status','status',array('class'=>'control-label'))?>
					<?php echo form_dropdown('status',$this->general_model->dropdown('bidan_'.$modulesub.'_status','Status'),set_value('status',(isset($row->status)?$row->status:'2')),'id="status" class="form-control input-sm"')?>
					<small><?php echo form_error('status')?></small>
				</div>
				<div id="nomor" class="form-group form-inline">
					<?php echo form_label('Nomor','nomor',array('class'=>'control-label'))?>
					<?php echo form_input(array('name'=>'nomor','class'=>'form-control input-sm','maxlength'=>'20','size'=>'20','autocomplete'=>'off','value'=>set_value('nomor',(isset($row->nomor)?$row->nomor:''))))?>
					<small><?php echo form_error('nomor')?></small>
				</div>										
				<div id="masa_berlaku" class="form-group form-inline">
					<?php echo form_label('Masa Berlaku','masa_berlaku',array('class'=>'control-label'))?>
					<?php echo form_input(array('name'=>'masa_berlaku','class'=>'form-control input-sm','maxlength'=>'4','size'=>'10','autocomplete'=>'off','value'=>set_value('masa_berlaku',(isset($row->masa_berlaku)?$row->masa_berlaku:''))))?>
					<small><?php echo form_error('masa_berlaku')?></small>
				</div>
			</div>
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
<script type="text/javascript">
	function bidan(){
		$('#nomor_sebelum').html('');
		$.ajax({
			url:'<?php echo base_url() ?>index.php/api/bidan/get_by_id/<?php echo $bidan_id; ?>',
			dataType:'json',
			type:'post',
			success:function(str){
				$('#nomor_sebelum').html(str.sertikom);
			}
		});
	}
	function str_last()
	{
		$('#nomor_sebelum').html('');
		$('#masa_berlaku_sebelum').html('');
		$.ajax({
			url:'<?php echo base_url() ?>index.php/api/str/last',
			dataType:'json',
			type:'post',
			data:{bidan:<?php echo $bidan_id; ?>,tanggal:$('#tanggal').val()},
			success:function(str){
				if (str) {
					$('#nomor_sebelum').html(str.nomor);
					$('#masa_berlaku_sebelum').html(str.masa_berlaku);
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
		if ($('#tipe').val()=='1') {
			bidan();
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
	$('#tipe').change(function(){
		general();
	});
	$('#status').change(function(){
		check_status();
	});		
</script>