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
					<?php echo form_input(array('id'=>'tanggal','name'=>'tanggal','class'=>'form-control input-sm input-tanggal','maxlength'=>'10','size'=>'10','autocomplete'=>'off','value'=>set_value('tanggal',(isset($row->tanggal)?$row->tanggal:date('d/m/Y')))))?>
					<small><?php echo form_error('tanggal')?></small>
				</div>
				<div class="form-group form-inline">
					<?php echo form_label('Jenis Pengajuan','tipe',array('class'=>'control-label'))?>
					<?php echo form_dropdown('tipe',$this->general_model->dropdown($module.'_tipe','Jenis Pengajuan'),set_value('tipe',(isset($row->tipe)?$row->tipe:'')),'id="tipe" class="form-control input-sm"')?>
					<small><?php echo form_error('tipe')?></small>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group form-inline">
					<?php echo form_label('Bidan Lain','bidan_lain',array('class'=>'control-label'))?>
					: <?php echo form_dropdown('bidan_lain',$this->general_model->dropdown('bidan','Bidan'),set_value('bidan_lain',(isset($row->bidan_lain)?$row->bidan_lain:'')),'id="bidan_lain" class="form-control input-sm select2"')?>
					<small><?php echo form_error('bidan_lain')?></small>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-body">			
				<div id="nomor_str_div" class="form-group form-inline">
					<label id="nomor_str_label" for="nomor_str" class="control-label">Nomor STR/SIB</label>
					: <span id="nomor_str"></span>
				</div>						
				<div id="nama_tempat_div" class="form-group form-inline">
					<label id="nama_tempat_label" for="nama_tempat" class="control-label">Nama Tempat</label>
					: <span id="nama_tempat"></span>
				</div>						
				<div id="alamat_div" class="form-group form-inline">
					<label id="alamat_label" for="alamat" class="control-label">Alamat</label>
					: <span id="alamat"></span>
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
					<?php echo form_dropdown('status',$this->general_model->dropdown($module.'_status','Status'),set_value('status',(isset($row->status)?$row->status:'2')),'id="status" class="form-control input-sm"')?>
					<small><?php echo form_error('status')?></small>
				</div>
				<div id="nomor" class="form-group form-inline">
					<?php echo form_label('Nomor','nomor',array('class'=>'control-label'))?>
					<?php echo form_input(array('name'=>'nomor','class'=>'form-control input-sm','maxlength'=>'20','size'=>'20','autocomplete'=>'off','value'=>set_value('nomor',(isset($row->nomor)?$row->nomor:''))))?>
					<small><?php echo form_error('nomor')?></small>
				</div>										
				<div id="masa_berlaku" class="form-group form-inline">
					<?php echo form_label('Masa Berlaku','masa_berlaku',array('class'=>'control-label'))?>
					<?php echo form_input(array('name'=>'masa_berlaku','class'=>'form-control input-sm input-tanggal','maxlength'=>'4','size'=>'10','autocomplete'=>'off','value'=>set_value('masa_berlaku',(isset($row->masa_berlaku)?$row->masa_berlaku:''))))?>
					<small><?php echo form_error('masa_berlaku')?></small>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="box box-default">
	<div class="box-body">
		<button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Apa anda yakin ?')"><span class="glyphicon glyphicon-save"></span> Simpan</button>
		<a href="<?php echo site_url($url.'/index/'.$bidan_id.get_query_string()) ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-repeat"></span> Kembali</a>
	</div>
</div>
</form>
<script type="text/javascript">
	$(document).ready(function(){
		var app = {
			bidan:$('#bidan_lain')
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
	function bidan(){
		$('#nama_tempat').html('');
		$('#alamat').html('');
		$.ajax({
			url:'<?php echo base_url() ?>index.php/api/bidan/get_by_id/<?php echo $bidan_id; ?>',
			dataType:'json',
			type:'post',
			success:function(str){
				$('#nama_tempat').html(str.praktik_nama);
				$('#alamat').html(str.praktik_alamat);
			}
		});
	}
	bidan();

	function str_last()
	{
		$('#nomor_str').html('');
		$.ajax({
			url:'<?php echo base_url() ?>index.php/api/str/last',
			dataType:'json',
			type:'post',
			data:{bidan:<?php echo $bidan_id; ?>,tanggal:$('#tanggal').val()},
			success:function(str){
				if (str) {
					$('#nomor_str').html(str.nomor);
				}
			}
		});
	}
	str_last();

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
	
	$('#status').change(function(){
		check_status();
	});		
</script>