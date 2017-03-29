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
					<?php echo form_input(array('name'=>'tanggal','class'=>'form-control input-sm input-tanggal','maxlength'=>'10','autocomplete'=>'off','value'=>set_value('tanggal',(isset($row->tanggal)?$row->tanggal:date('d/m/Y')))))?>
					<small><?php echo form_error('tanggal')?></small>
				</div>
				<div class="form-group form-inline">
					<?php echo form_label('Jenis Pengajuan','tipe',array('class'=>'control-label'))?>
					<?php echo form_dropdown('tipe',$this->general_model->dropdown('bidan_'.$modulesub.'_tipe','Jenis Pengajuan'),set_value('tipe',(isset($row->tipe)?$row->tipe:'')),'id="tipe" class="form-control input-sm"')?>
					<small><?php echo form_error('tipe')?></small>
				</div>
				<div id="kta_no_div" class="form-group form-inline">
					<label for="kta_no" class="control-label">No ID KTA</label>
					: <span id="kta_no"></span>
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
		<hr>						
		<div class="form-group form-inline">
			<?php echo form_label('Status','status',array('class'=>'control-label'))?>
			<?php echo form_dropdown('status',$this->general_model->dropdown('bidan_'.$modulesub.'_status','Status'),set_value('status',(isset($row->status)?$row->status:'2')),'id="status" class="form-control input-sm"')?>
			<small><?php echo form_error('status')?></small>
		</div>
		<div id="masa_berlaku" class="form-group form-inline">
			<?php echo form_label('Masa Berlaku','masa_berlaku',array('class'=>'control-label'))?>
			<?php echo form_input(array('name'=>'masa_berlaku','class'=>'form-control input-sm','maxlength'=>'4','size'=>'10','autocomplete'=>'off','value'=>set_value('masa_berlaku',(isset($row->masa_berlaku)?$row->masa_berlaku:''))))?>
			<small><?php echo form_error('masa_berlaku')?></small>
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
		$.ajax({
			url:'<?php echo base_url() ?>index.php/api/bidan/get_by_id/<?php echo $bidan_id; ?>',
			dataType:'json',
			type:'post',
			success:function(str){
				$('#kta_no').html(str.kta_no);
			}
		});
	}

	function check_perpanjangan(){
		bidan();
		if ($('#tipe').val()=='2') {			
			$('#kta_no_div').show();
			$('#syarat_4').show();
		}else{
			$('#kta_no_div').hide();
			$('#syarat_4').hide();
		}
	}
	check_perpanjangan();
	$('#tipe').change(function(){
		check_perpanjangan();
	});

	function check_status()
	{
		if ($('#status').val()=='1') {
			$('#masa_berlaku').show();
		}else{
			$('#masa_berlaku').hide();
		}	
	}
	check_status();
	$('#status').change(function(){
		check_status();
	});		
</script>